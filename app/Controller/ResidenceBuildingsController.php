<?php
App::uses('AdminController', 'Controller');
/**
 * ResidenceBuildings Controller
 *
 * @property ResidenceBuilding $ResidenceBuilding
 */
class ResidenceBuildingsController extends AdminController {



    public $uses = array(
        'ResidenceBuilding',
        'ResidenceCategory',
        'ResidencePhoto',
        'ResidenceProperty',
        'Area',
        'Station',
        'AddInformation',
    );
    public $paginate = array(
        'order' => 'ResidenceBuilding.modified DESC'
    );

/**
 * beforeFilter
 *
 * @return void
 */
    public function beforeFilter() {
        parent::beforeFilter();
        if (empty($this->roleStaff)) {
            $this->Session->setFlash(Configure::read('Admin.Message.AuthFailed'), 'alert', array('class' => 'alert-error'),'auth-alert');
            $this->redirect('/admin/');
        }

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '住居物件管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {

        $unbinds = array(
            'belongsTo' => array(
                'ResidenceCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'ResidencePhoto',
                'ResidenceProperty',
            ),
        );
        $this->ResidenceBuilding->unbindModel($unbinds, false);

        $this->set('residenceBuildings', $this->paginate());

        $params = array(
            'conditions' => array(
                0 => 'ResidenceBuilding.next_update is not null',
                1 => 'ResidenceBuilding.next_update < now()',
            ),
            'recursive' => 0,
        );
        $findRes = $this->ResidenceBuilding->find('count', $params);

        if ($findRes > 0) {
            $this->Session->setFlash(Configure::read('Admin.Message.UpdateAlertExists'),'alert',array('class' => 'alert-error'),'update-alert');
        }

        $residenceCategories = $this->ResidenceCategory->find('list');
        $areas               = $this->Area->find('list', array('order'=>'modified'));
        $stations            = $this->Station->find('list', array('order'=>'name'));
        $addInformations     = $this->AddInformation->find('list');

        $this->set(compact('residenceCategories', 'areas', 'stations', 'addInformations'));
    }

    public function admin_search() {

        $unbinds = array(
            'belongsTo' => array(
                'ResidenceCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'ResidencePhoto',
                'ResidenceProperty',
            ),
        );
        $this->ResidenceBuilding->unbindModel($unbinds, false);

        if (isset($this->params['named']['page']) || isset($this->params['named']['sort'])) {
            /* ページング時 or ソート時 */
            // セッションから検索条件を取得
            $listSearchValue = $this->Session->read('ResidenceBuildingsController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $this->Session->write('ResidenceBuildingsController.ListSearchValue', $this->request->data);
            $listSearchValue = $this->request->data;
        }

        // 検索条件の取得
        $params = $this->ResidenceBuilding->listSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('residenceBuildings', $this->paginate());

        $residenceCategories = $this->ResidenceCategory->find('list');
        $areas               = $this->Area->find('list', array('order'=>'modified'));
        $stations            = $this->Station->find('list', array('order'=>'name'));
        $addInformations     = $this->AddInformation->find('list');

        $this->set(compact('residenceCategories', 'areas', 'stations', 'addInformations'));

        return $this->render('admin_index');
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->ResidenceBuilding->begin();
            $this->ResidenceBuilding->create();

            // 位置情報
            $lat = $this->request->data['ResidenceBuilding']['lat'];
            $lng = $this->request->data['ResidenceBuilding']['lng'];
//            $location = $this->geoLocationFromText($lat, $lng);
//            $this->request->data['ResidenceBuilding']['geolocation'] = $location;
            $this->request->data['ResidenceBuilding']['lat_disabled'] = $lat;
            $this->request->data['ResidenceBuilding']['lng_disabled'] = $lng;

            $next_update = $this->nextUpdate($this->request->data['ResidenceBuilding']['alert_id']);
            $this->request->data['ResidenceBuilding']['next_update'] = $next_update;

            try {
                $save_data = $this->ResidenceBuilding->save($this->request->data);
            } catch (PDOException $e) {
                $save_data = false;
                if ($e->getCode() == Configure::read('MySql.ErrorCode.RowLarge')) {
                    $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailedRowLarge'), 'alert', array('class' => 'alert-error'), 'db-alert');
                }
            }
            if (!empty($save_data)) {
                $photos = $this->photos_normalize(
                    $this->request->data['ResidencePhoto'],
                    $this->ResidenceBuilding->id
                );
                $save_data = true;
                $savePhotos = array();
                $validErrors = array();
                foreach ($photos as $key => $photo) {
                    $saveData = array('ResidencePhoto'=>$photo);
                    $this->ResidenceBuilding->ResidencePhoto->create();
                    $saveRes  = $this->ResidenceBuilding->ResidencePhoto->save($saveData);
                    if ($saveRes === false) {
                        $validErrors['ResidencePhoto'][$key] = $this->ResidenceBuilding->ResidencePhoto->validationErrors;
                        $save_data = false;
                    } else {
                        array_push($savePhotos, $saveRes);
                    }
                }
                if ($save_data) {
                    // リサイズする
                    $path_suffix = $this->name . '/';
                    $local_dir   = Configure::read('UploadSavePath') . $path_suffix;
                    foreach ($savePhotos as $key => $photo) {
                        $from = $photo['ResidencePhoto']['path'];
                        $use_point = $photo['ResidencePhoto']['use_point'];
                        $resizes = Configure::read('Admin.Image.Size.'.$this->name.'.'.$use_point);
                        if (!is_null($resizes)) {
                            foreach ($resizes as $tmbKey => $tmbSize) {
                                $to = 'tmb_'.$tmbKey.'_'.$photo['ResidencePhoto']['path'];
                                $width  = $tmbSize[0];
                                $height = $tmbSize[1];
                                $this->ImageResizer->frame($local_dir, $from, $to, $width, $height, false);
                            }
                        }
                    }
                    $this->ResidenceBuilding->commit();
                    $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    // 画像側にエラーがあったので、アップした分を消す
                    foreach ($photos as $key => $photo) {
                        $this->fileDelete($photo['path']);
                        $validErrors['ResidencePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                    $this->set('validErrors', $validErrors);
                    $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                }
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors = array(
                    'ResidencePhoto'    => array(),
                    'ResidenceBuilding' => array(),
                );
                foreach ($this->request->data['ResidencePhoto'] as $key => $residencePhoto) {
                    // アップがあったか
                    if ($residencePhoto['path']['error'] != UPLOAD_ERR_NO_FILE) {
                        $validErrors['ResidencePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                }
                $validErrors['ResidenceBuilding'] = $this->ResidenceBuilding->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
            }
        } else {
            $this->request->data['ResidenceBuilding']['alert_id'] = '1';
        }

        $residenceCategories = $this->ResidenceCategory->find('list');
        $areas               = $this->Area->find('list', array('order'=>'modified'));

        $station1s = $station2s = $station3s = $this->Station->find('list', array('order'=>'name'));

        $addInformations = $this->AddInformation->find('list');

        $this->set(compact('residenceCategories', 'areas', 'station1s', 'station2s', 'station3s', 'addInformations'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->ResidenceBuilding->id = $id;
        if (!$this->ResidenceBuilding->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->ResidenceBuilding->begin();
            $this->ResidenceBuilding->create();

            // 位置情報
            $lat = $this->request->data['ResidenceBuilding']['lat'];
            $lng = $this->request->data['ResidenceBuilding']['lng'];
//            $location = $this->geoLocationFromText($lat, $lng);
//            $this->request->data['ResidenceBuilding']['geolocation'] = $location;
            $this->request->data['ResidenceBuilding']['lat_disabled'] = $lat;
            $this->request->data['ResidenceBuilding']['lng_disabled'] = $lng;

            $next_update = $this->nextUpdate($this->request->data['ResidenceBuilding']['alert_id']);
            $this->request->data['ResidenceBuilding']['next_update'] = $next_update;

            try {
                $save_data = $this->ResidenceBuilding->save($this->request->data);
            } catch (PDOException $e) {
                $save_data = false;
                if ($e->getCode() == Configure::read('MySql.ErrorCode.RowLarge')) {
                    $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailedRowLarge'), 'alert', array('class' => 'alert-error'), 'db-alert');
                }
            }
            if (!empty($save_data)) {
                // 変更前の画像リストを取っておく
                $oldPhotos = $this->ResidenceBuilding->ResidencePhoto->find('list', array('conditions'=>array('residence_building_id'=>$id)));
                // 画像テーブルはDELETE INSERT
                $this->ResidenceBuilding->ResidencePhoto->deleteAll(array('residence_building_id'=>$id));
                $photos = $this->photos_normalize(
                    $this->request->data['ResidencePhoto'],
                    $this->ResidenceBuilding->id
                );
                $save_data = true;
                $savePhotos = array();
                $validErrors = array();
                foreach ($photos as $key => $photo) {
                    $saveData = array('ResidencePhoto'=>$photo);
                    $this->ResidenceBuilding->ResidencePhoto->create();
                    $saveRes  = $this->ResidenceBuilding->ResidencePhoto->save($saveData);
                    if ($saveRes === false) {
                        $validErrors['ResidencePhoto'][$key] = $this->ResidenceBuilding->ResidencePhoto->validationErrors;
                        $save_data = false;
                    } else {
                        array_push($savePhotos, $saveData);
                    }
                }
                if ($save_data) {
                    // リサイズする
                    $path_suffix = $this->name . '/';
                    $local_dir   = Configure::read('UploadSavePath') . $path_suffix;
                    foreach ($savePhotos as $key => $photo) {
                        $from = $photo['ResidencePhoto']['path'];
                        $use_point = $photo['ResidencePhoto']['use_point'];
                        $resizes = Configure::read('Admin.Image.Size.'.$this->name.'.'.$use_point);
                        if (!is_null($resizes) && $photo['ResidencePhoto']['resize'] == 1) {
                            foreach ($resizes as $tmbKey => $tmbSize) {
                                $to = 'tmb_'.$tmbKey.'_'.$photo['ResidencePhoto']['path'];
                                $width  = $tmbSize[0];
                                $height = $tmbSize[1];
                                $this->ImageResizer->frame($local_dir, $from, $to, $width, $height, false);
                            }
                        }
                    }
                    // 画像のキーリスト取得
                    $keyList = array();
                    foreach (Configure::read('Admin.Image.Size.'.$this->name) as $point => $resizeList) {
                        foreach ($resizeList as $resizeKey => $sizeData) {
                            array_push($keyList, $resizeKey);
                        }
                    }
                    // 古い画像は削除
                    $newPhotos = $this->ResidenceBuilding->ResidencePhoto->find('list', array('conditions'=>array('residence_building_id'=>$id)));
                    foreach ($oldPhotos as $oldPath) {
                        if (!in_array($oldPath, $newPhotos)) {
                            $filepath = $local_dir . $oldPath;
                            if (file_exists($filepath)) {
                                unlink($filepath);
                            }
                            foreach ($keyList as $keyName) {
                                $filepath = $local_dir . 'tmb_' . $keyName . '_' . $oldPath;
                                if (file_exists($filepath)) {
                                    unlink($filepath);
                                }
                            }
                        }
                    }
                    $this->ResidenceBuilding->commit();
                    $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->ResidenceBuilding->rollback();
                    // 画像側にエラーがあったので、アップした分を消す
                    foreach ($photos as $key => $photo) {
                        if ($photo['resize'] == 1) {
                            $this->fileDelete($photo['path']);
                            $validErrors['ResidencePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                        }
                    }
                    $this->set('validErrors', $validErrors);
                    $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                    // アップロードを取りやめる
                    $residencePhotos = $this->ResidencePhoto->adminEditPhotoList($id);
                    foreach ($residencePhotos['ResidencePhoto'] as $key => $residencePhoto) {
                        $residencePhotos['ResidencePhoto'][$key]['caption'] = $this->request->data['ResidencePhoto'][$key]['caption'];
                        if (isset($this->request->data['ResidencePhoto'][$key]['path_delete'])) {
                            $residencePhotos['ResidencePhoto'][$key]['path_delete'] = $this->request->data['ResidencePhoto'][$key]['path_delete'];
                        }
                    }
                    $this->request->data['ResidencePhoto'] = $residencePhotos['ResidencePhoto'];
                }
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors = array(
                    'ResidencePhoto'    => array(),
                    'ResidenceBuilding' => array(),
                );
                foreach ($this->request->data['ResidencePhoto'] as $key => $residencePhoto) {
                    // アップがあったか
                    if ($residencePhoto['path']['error'] != UPLOAD_ERR_NO_FILE) {
                        $validErrors['ResidencePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                }
                $validErrors['ResidenceBuilding'] = $this->ResidenceBuilding->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                // アップロードを取りやめる
                $residencePhotos = $this->ResidencePhoto->adminEditPhotoList($id);
                foreach ($residencePhotos['ResidencePhoto'] as $key => $residencePhoto) {
                    $residencePhotos['ResidencePhoto'][$key]['caption'] = $this->request->data['ResidencePhoto'][$key]['caption'];
                    if (isset($this->request->data['ResidencePhoto'][$key]['path_delete'])) {
                        $residencePhotos['ResidencePhoto'][$key]['path_delete'] = $this->request->data['ResidencePhoto'][$key]['path_delete'];
                    }
                }
                $this->request->data['ResidencePhoto'] = $residencePhotos['ResidencePhoto'];
            }
        } else {
            // 不要な関連を解除
            $unbinds = array(
                'belongsTo' => array(
                    'ResidenceCategory',
                    'Area',
                    'Station1',
                    'Station2',
                    'Station3',
                ),
                'hasMany' => array(
                    'ResidencePhoto',
                    'ResidenceProperty',
                ),
            );
            $this->ResidenceBuilding->unbindModel($unbinds, false);
            $unbinds = array(
                'belongsTo' => array(
                    'ResidenceBuilding',
                ),
            );
            $this->ResidencePhoto->unbindModel($unbinds, false);
            // 住居物件情報を取得
            $residenceBuilding = $this->ResidenceBuilding->findById($id);
            $residenceBuilding = $this->ResidenceBuilding->setLatLngDisabled($residenceBuilding);
            // 住居物件画像を取得(ちょっと微妙になっちゃった。。。)
            $params = array(
                'conditions' => array(
                    'ResidencePhoto.residence_building_id' => $id
                ),
            );
            $residencePhotos = $this->ResidencePhoto->adminEditPhotoList($id);
            $this->request->data = Set::merge($residenceBuilding, $residencePhotos);
        }
        $residenceCategories = $this->ResidenceCategory->find('list');
        $areas               = $this->Area->find('list', array('order'=>'modified'));

        $station1s = $station2s = $station3s = $this->Station->find('list', array('order'=>'name'));

        $addInformations = $this->AddInformation->find('list');

        $residenceData       = $this->request->data;
        $this->set(compact(
            'residenceCategories',
            'areas',
            'station1s',
            'station2s',
            'station3s',
            'residenceData',
            'addInformations'
        ));
    }

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        $this->ResidenceBuilding->id = $id;
        if (!$this->ResidenceBuilding->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        $unbinds = array(
            'belongsTo' => array(
                'ResidenceCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'ResidencePhoto',
                'ResidenceProperty',
            ),
        );
        $this->ResidenceBuilding->unbindModel($unbinds);
        $findData   = $this->ResidenceBuilding->findById($id);
        $photos     = $this->ResidencePhoto->find('all', array('conditions'=>array('ResidencePhoto.residence_building_id'=>$findData['ResidenceBuilding']['id']),'recursive'=>-1));
        $properties = $this->ResidenceProperty->find('all', array('conditions'=>array('ResidenceProperty.residence_building_id'=>$findData['ResidenceBuilding']['id']),'recursive'=>-1));
        if ($this->ResidenceBuilding->delete()) {
            // 画像のキーリスト取得
            $keyList = array();
            foreach (Configure::read('Admin.Image.Size.'.$this->name) as $point => $resizeList) {
                foreach ($resizeList as $resizeKey => $sizeData) {
                    array_push($keyList, $resizeKey);
                }
            }
            // 画像を削除する
            foreach ($photos as $photo) {
                $this->fileDelete($photo['ResidencePhoto']['path']);
                foreach ($keyList as $keyName) {
                    $this->fileDelete('tmb_' . $keyName . '_' . $photo['ResidencePhoto']['path']);
                }
            }
            foreach ($properties as $property) {
                $this->fileDelete($property['ResidenceProperty']['drowing'], 'ResidenceProperties');
            }
            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'alert', array('class' => 'alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert-error'));
        $this->redirect(array('action' => 'index'));
    }





/**
 * photos_normalize method
 *
 * @return string
 */
    private function photos_normalize($photos, $building_id) {
        $normalized = array();
        $count      = sizeof($photos);
        for ($i=0; $i < $count; $i++) {
            $use_point = $photos[$i]['use_point'];
            $tmp_path  = $photos[$i]['path'];
            $caption   = $photos[$i]['caption'];
            $path      = $this->fileUpload($tmp_path['tmp_name'], $tmp_path['name'], $building_id);
            $photo     = array(
                'path'                  => $path,
                'caption'               => $caption,
                'use_point'             => $use_point,
                'residence_building_id' => $building_id,
            );
            $path_hidden = isset($photos[$i]['path_hidden']) ? $photos[$i]['path_hidden'] : '';
            $path_delete = isset($photos[$i]['path_delete']) ? $photos[$i]['path_delete'] : 0;
            if (!empty($photo['path']) && !empty($photo['residence_building_id'])) {
                $photo['resize'] = 1;
                $normalized[$i]  = $photo;
            } elseif (!empty($path_hidden) && !empty($photo['residence_building_id']) && $path_delete != 1) {
                $photo['path']   = $path_hidden;
                $photo['resize'] = 0;
                $normalized[$i]  = $photo;
            }
        }
        return $normalized;
    }

}
