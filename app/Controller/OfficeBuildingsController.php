<?php
App::uses('AdminController', 'Controller');
/**
 * OfficeBuildings Controller
 *
 * @property OfficeBuilding $OfficeBuilding
 */
class OfficeBuildingsController extends AdminController {

    public $uses = array(
        'OfficeBuilding',
        'OfficeCategory',
        'OfficePhoto',
        'OfficeProperty',
        'Area',
        'Station',
        'AddInformation',
    );
    public $paginate = array(
        'order' => 'OfficeBuilding.modified DESC'
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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '事務所物件管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {

        $unbinds = array(
            'belongsTo' => array(
                'OfficeCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'OfficePhoto',
                'OfficeProperty',
            ),
        );
        $this->OfficeBuilding->unbindModel($unbinds, false);

        $this->set('officeBuildings', $this->paginate());

        $params = array(
            'conditions' => array(
                0 => 'OfficeBuilding.next_update is not null',
                1 => 'OfficeBuilding.next_update < now()',
            ),
        );
        $findRes = $this->OfficeBuilding->find('count', $params);

        if ($findRes > 0) {
            $this->Session->setFlash(Configure::read('Admin.Message.UpdateAlertExists'), 'alert', array('class' => 'alert-error'),'update-alert');
        }

        $officeCategories = $this->OfficeCategory->find('list');
        $areas            = $this->Area->find('list', array('order'=>'modified'));
        $stations         = $this->Station->find('list', array('order'=>'name'));
        $addInformations  = $this->AddInformation->find('list');

        $this->set(compact('officeCategories', 'areas', 'stations', 'addInformations'));
    }

    public function admin_search() {

        $unbinds = array(
            'belongsTo' => array(
                'OfficeCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'OfficePhoto',
                'OfficeProperty',
            ),
        );
        $this->OfficeBuilding->unbindModel($unbinds, false);

        //ページング時
        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            // セッションから検索条件を取得
            $listSearchValue = $this->Session->read('OfficeBuildingsController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $this->Session->write('OfficeBuildingsController.ListSearchValue', $this->request->data);
            $listSearchValue = $this->request->data;
        }

        // 検索条件の取得
        $params = $this->OfficeBuilding->listSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('officeBuildings', $this->paginate());

        $officeCategories = $this->OfficeCategory->find('list');
        $areas            = $this->Area->find('list', array('order'=>'modified'));
        $stations         = $this->Station->find('list', array('order'=>'name'));
        $addInformations  = $this->AddInformation->find('list');

        $this->set(compact('officeCategories', 'areas', 'stations', 'addInformations'));

        return $this->render('admin_index');
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {
            $this->OfficeBuilding->begin();
            $this->OfficeBuilding->create();

            // 位置情報
            $lat = $this->request->data['OfficeBuilding']['lat'];
            $lng = $this->request->data['OfficeBuilding']['lng'];
            $this->request->data['OfficeBuilding']['lat_disabled'] = $lat;
            $this->request->data['OfficeBuilding']['lng_disabled'] = $lng;

            $next_update = $this->nextUpdate($this->request->data['OfficeBuilding']['alert_id']);
            $this->request->data['OfficeBuilding']['next_update'] = $next_update;

            try {
                $save_data = $this->OfficeBuilding->save($this->request->data);
            } catch (PDOException $e) {
                $save_data = false;
                if ($e->getCode() == Configure::read('MySql.ErrorCode.RowLarge')) {
                    $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailedRowLarge'), 'alert', array('class' => 'alert-error'), 'db-alert');
                }
            }
            if (!empty($save_data)) {
                $photos = $this->photos_normalize(
                    $this->request->data['OfficePhoto'],
                    $this->OfficeBuilding->id
                );
                $save_data = true;
                $savePhotos = array();
                $validErrors = array();
                foreach ($photos as $key => $photo) {
                    $saveData = array('OfficePhoto'=>$photo);
                    $this->OfficeBuilding->OfficePhoto->create();
                    $saveRes  = $this->OfficeBuilding->OfficePhoto->save($saveData);
                    if ($saveRes === false) {
                        $validErrors['OfficePhoto'][$key] = $this->OfficeBuilding->OfficePhoto->validationErrors;
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
                        $from = $photo['OfficePhoto']['path'];
                        $use_point = $photo['OfficePhoto']['use_point'];
                        $resizes = Configure::read('Admin.Image.Size.'.$this->name.'.'.$use_point);
                        if (!is_null($resizes)) {
                            foreach ($resizes as $tmbKey => $tmbSize) {
                                $to = 'tmb_'.$tmbKey.'_'.$photo['OfficePhoto']['path'];
                                $width  = $tmbSize[0];
                                $height = $tmbSize[1];
                                $this->ImageResizer->frame($local_dir, $from, $to, $width, $height, false);
                            }
                        }
                    }
                    $this->OfficeBuilding->commit();
                    $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    // 画像側にエラーがあったので、アップした分を消す
                    foreach ($photos as $key => $photo) {
                        $this->fileDelete($photo['path']);
                        $validErrors['OfficePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                    $this->set('validErrors', $validErrors);
                    $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                }
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors = array(
                    'OfficePhoto'    => array(),
                    'OfficeBuilding' => array(),
                );
                foreach ($this->request->data['OfficePhoto'] as $key => $officePhoto) {
                    // アップがあったか
                    if ($officePhoto['path']['error'] != UPLOAD_ERR_NO_FILE) {
                        $validErrors['OfficePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                }
                $validErrors['OfficeBuilding'] = $this->OfficeBuilding->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
            }
        } else {
            $this->request->data['OfficeBuilding']['alert_id'] = '1';
        }
        $officeCategories = $this->OfficeCategory->find('list');
        $areas            = $this->Area->find('list', array('order'=>'modified'));

        $station1s = $station2s = $station3s = $this->Station->find('list', array('order'=>'name'));

        $addInformations = $this->AddInformation->find('list');

        $this->set(compact('officeCategories', 'areas', 'station1s', 'station2s', 'station3s', 'addInformations'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {

        $this->OfficeBuilding->id = $id;
        if (!$this->OfficeBuilding->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->OfficeBuilding->begin();
            $this->OfficeBuilding->create();

            // 位置情報
            $lat = $this->request->data['OfficeBuilding']['lat'];
            $lng = $this->request->data['OfficeBuilding']['lng'];
//            $location = $this->geoLocationFromText($lat, $lng);
//            $this->request->data['OfficeBuilding']['geolocation'] = $location;
            $this->request->data['OfficeBuilding']['lat_disabled'] = $lat;
            $this->request->data['OfficeBuilding']['lng_disabled'] = $lng;

            $next_update = $this->nextUpdate($this->request->data['OfficeBuilding']['alert_id']);
            $this->request->data['OfficeBuilding']['next_update'] = $next_update;

            try {
                $save_data = $this->OfficeBuilding->save($this->request->data);
            } catch (PDOException $e) {
                $save_data = false;
                if ($e->getCode() == Configure::read('MySql.ErrorCode.RowLarge')) {
                    $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailedRowLarge'), 'alert', array('class' => 'alert-error'), 'db-alert');
                }
            }
            if (!empty($save_data)) {
                // 変更前の画像リストを取っておく
                $oldPhotos = $this->OfficeBuilding->OfficePhoto->find('list', array('conditions'=>array('office_building_id'=>$id)));
                // 画像テーブルはDELETE INSERT
                $this->OfficeBuilding->OfficePhoto->deleteAll(array('office_building_id'=>$id));
                $photos = $this->photos_normalize(
                    $this->request->data['OfficePhoto'],
                    $this->OfficeBuilding->id
                );
                $save_data = true;
                $savePhotos = array();
                $validErrors = array();
                foreach ($photos as $key => $photo) {
                    $saveData = array('OfficePhoto'=>$photo);
                    $this->OfficeBuilding->OfficePhoto->create();
                    $saveRes  = $this->OfficeBuilding->OfficePhoto->save($saveData);
                    if ($saveRes === false) {
                        $validErrors['OfficePhoto'][$key] = $this->OfficeBuilding->OfficePhoto->validationErrors;
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
                        $from = $photo['OfficePhoto']['path'];
                        $use_point = $photo['OfficePhoto']['use_point'];
                        $resizes = Configure::read('Admin.Image.Size.'.$this->name.'.'.$use_point);
                        if (!is_null($resizes) && $photo['OfficePhoto']['resize'] == 1) {
                            foreach ($resizes as $tmbKey => $tmbSize) {
                                $to = 'tmb_'.$tmbKey.'_'.$photo['OfficePhoto']['path'];
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
                    $newPhotos = $this->OfficeBuilding->OfficePhoto->find('list', array('conditions'=>array('office_building_id'=>$id)));
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
                    $this->OfficeBuilding->commit();
                    $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->OfficeBuilding->rollback();
                    // 画像側にエラーがあったので、アップした分を消す
                    foreach ($photos as $key => $photo) {
                        if ($photo['resize'] == 1) {
                            $this->fileDelete($photo['path']);
                            $validErrors['OfficePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                        }
                    }
                    $this->set('validErrors', $validErrors);
                    $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                    // アップロードを取りやめる
                    $officePhotos = $this->OfficePhoto->adminEditPhotoList($id);
                    foreach ($officePhotos['OfficePhoto'] as $key => $officePhoto) {
                        $officePhotos['OfficePhoto'][$key]['caption'] = $this->request->data['OfficePhoto'][$key]['caption'];
                        if (isset($this->request->data['OfficePhoto'][$key]['path_delete'])) {
                            $officePhotos['OfficePhoto'][$key]['path_delete'] = $this->request->data['OfficePhoto'][$key]['path_delete'];
                        }
                    }
                    $this->request->data['OfficePhoto'] = $officePhotos['OfficePhoto'];
                }
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors = array(
                    'OfficePhoto'    => array(),
                    'OfficeBuilding' => array(),
                );
                foreach ($this->request->data['OfficePhoto'] as $key => $officePhoto) {
                    // アップがあったか
                    if ($officePhoto['path']['error'] != UPLOAD_ERR_NO_FILE) {
                        $validErrors['OfficePhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                }
                $validErrors['OfficeBuilding'] = $this->OfficeBuilding->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                // アップロードを取りやめる
                $officePhotos = $this->OfficePhoto->adminEditPhotoList($id);
                foreach ($officePhotos['OfficePhoto'] as $key => $officePhoto) {
                    $officePhotos['OfficePhoto'][$key]['caption'] = $this->request->data['OfficePhoto'][$key]['caption'];
                    if (isset($this->request->data['OfficePhoto'][$key]['path_delete'])) {
                        $officePhotos['OfficePhoto'][$key]['path_delete'] = $this->request->data['OfficePhoto'][$key]['path_delete'];
                    }
                }
                $this->request->data['OfficePhoto'] = $officePhotos['OfficePhoto'];
            }
        } else {

            // 不要な関連を解除
            $unbinds = array(
                'belongsTo' => array(
                    'OfficeCategory',
                    'Area',
                    'Station1',
                    'Station2',
                    'Station3',
                ),
                'hasMany' => array(
                    'OfficePhoto',
                    'OfficeProperty',
                ),
            );

            $this->OfficeBuilding->unbindModel($unbinds, false);
            $unbinds = array(
                'belongsTo' => array(
                    'OfficeBuilding',
                ),
            );
            $this->OfficePhoto->unbindModel($unbinds, false);

            // 住居物件情報を取得
            $officeBuilding = $this->OfficeBuilding->findById($id);
            $officeBuilding = $this->OfficeBuilding->setLatLngDisabled($officeBuilding);

            // 住居物件画像を取得(ちょっと微妙になっちゃった。。。)
            $params = array(
                'conditions' => array(
                    'OfficePhoto.office_building_id' => $id
                ),
            );

            $officePhotos = $this->OfficePhoto->adminEditPhotoList($id);
            $this->request->data = Set::merge($officeBuilding, $officePhotos);


        }

        $officeCategories = $this->OfficeCategory->find('list');
        $areas            = $this->Area->find('list', array('order'=>'modified'));

        $station1s = $station2s = $station3s = $this->Station->find('list', array('order'=>'name'));

        $addInformations = $this->AddInformation->find('list');

        $officeData       = $this->request->data;
        $this->set(compact(
            'officeCategories',
            'areas',
            'station1s',
            'station2s',
            'station3s',
            'officeData',
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
        $this->OfficeBuilding->id = $id;
        if (!$this->OfficeBuilding->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        $unbinds = array(
            'belongsTo' => array(
                'OfficeCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'OfficePhoto',
                'OfficeProperty',
            ),
        );
        $this->OfficeBuilding->unbindModel($unbinds);
        $findData   = $this->OfficeBuilding->findById($id);
        $photos     = $this->OfficePhoto->find('all', array('conditions'=>array('OfficePhoto.office_building_id'=>$findData['OfficeBuilding']['id']),'recursive'=>-1));
        $properties = $this->OfficeProperty->find('all', array('conditions'=>array('OfficeProperty.office_building_id'=>$findData['OfficeBuilding']['id']),'recursive'=>-1));
        if ($this->OfficeBuilding->delete()) {
            // 画像のキーリスト取得
            $keyList = array();
            foreach (Configure::read('Admin.Image.Size.'.$this->name) as $point => $resizeList) {
                foreach ($resizeList as $resizeKey => $sizeData) {
                    array_push($keyList, $resizeKey);
                }
            }
            // 画像を削除する
            foreach ($photos as $photo) {
                $this->fileDelete($photo['OfficePhoto']['path']);
                foreach ($keyList as $keyName) {
                    $this->fileDelete('tmb_' . $keyName . '_' . $photo['OfficePhoto']['path']);
                }
            }
            foreach ($properties as $property) {
                $this->fileDelete($property['OfficeProperty']['drowing'], 'OfficeProperties');
            }
            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'alert', array('class' => 'alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert-success'));
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
                'office_building_id' => $building_id,
            );
            $path_hidden = isset($photos[$i]['path_hidden']) ? $photos[$i]['path_hidden'] : '';
            $path_delete = isset($photos[$i]['path_delete']) ? $photos[$i]['path_delete'] : 0;
            if (!empty($photo['path']) && !empty($photo['office_building_id'])) {
                $photo['resize'] = 1;
                $normalized[$i]  = $photo;
            } elseif (!empty($path_hidden) && !empty($photo['office_building_id']) && $path_delete != 1) {
                $photo['path']   = $path_hidden;
                $photo['resize'] = 0;
                $normalized[$i]  = $photo;
            }
        }
        return $normalized;
    }
}
