<?php
App::uses('AdminController', 'Controller');
/**
 * FactoryBuildings Controller
 *
 * @property FactoryBuilding $FactoryBuilding
 */
class FactoryBuildingsController extends AdminController {

    public $uses = array(
        'FactoryBuilding',
        'FactoryCategory',
        'FactoryBuildingFactoryTenant',
        'FactoryTenant',
        'FactoryArea',
        'FactoryPhoto',
        'FactoryProperty',
        'IndustrialPark',
        'AddInformation',
    );
    public $paginate = array(
        'order' => 'FactoryBuilding.modified DESC'
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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '工場物件管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {

        $unbinds = array(
            'belongsTo' => array(
                'FactoryCategory',
                'FactoryArea',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'FactoryPhoto',
                'IndustrialPark',
            ),
        );
        $this->FactoryBuilding->unbindModel($unbinds, false);

        $this->set('factoryBuildings', $this->paginate());

        $params = array(
            'conditions' => array(
                0 => 'FactoryBuilding.next_update is not null',
                1 => 'FactoryBuilding.next_update < now()',
            ),
            'recursive' => 0,
        );
        $findRes = $this->FactoryBuilding->find('count', $params);

        if ($findRes > 0) {
            $this->Session->setFlash(Configure::read('Admin.Message.UpdateAlertExists'), 'alert', array('class' => 'alert-error'),'update-alert');
        }

        $factoryCategories = $this->FactoryCategory->find('list');
        $areas             = $this->FactoryArea->find('list', array('order'=>'modified'));
        $industrialParks   = $this->IndustrialPark->find('list');
        $addInformations   = $this->AddInformation->find('list');

        $this->set(compact('factoryCategories', 'areas', 'industrialParks', 'addInformations'));
    }

    public function admin_search() {

        $unbinds = array(
            'belongsTo' => array(
                'FactoryCategory',
                'FactoryArea',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'FactoryPhoto',
                'IndustrialPark',
            ),
        );
        $this->FactoryBuilding->unbindModel($unbinds, false);

        if (isset($this->params['named']['page']) || isset($this->params['named']['sort'])) {
            /* ページング時 or ソート時 */
            // セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FactoryBuildingsController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $this->Session->write('FactoryBuildingsController.ListSearchValue', $this->request->data);
            $listSearchValue = $this->request->data;
        }

        // 検索条件の取得
        $params = $this->FactoryBuilding->listSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('factoryBuildings', $this->paginate());

        $factoryCategories = $this->FactoryCategory->find('list');
        $areas             = $this->FactoryArea->find('list', array('order'=>'modified'));
        $industrialParks   = $this->IndustrialPark->find('list');
        $addInformations   = $this->AddInformation->find('list');

        $this->set(compact('factoryCategories', 'areas', 'industrialParks', 'addInformations'));

        return $this->render('admin_index');
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->FactoryBuilding->begin();
            $this->FactoryBuilding->create();

            // 位置情報
            $lat = $this->request->data['FactoryBuilding']['lat'];
            $lng = $this->request->data['FactoryBuilding']['lng'];
//            $location = $this->geoLocationFromText($lat, $lng);
//            $this->request->data['FactoryBuilding']['geolocation'] = $location;
            $this->request->data['FactoryBuilding']['lat_disabled'] = $lat;
            $this->request->data['FactoryBuilding']['lng_disabled'] = $lng;

            $next_update = $this->nextUpdate($this->request->data['FactoryBuilding']['alert_id']);
            $this->request->data['FactoryBuilding']['next_update'] = $next_update;

            try {
                $save_data = $this->FactoryBuilding->save($this->request->data);
            } catch (PDOException $e) {
                $save_data = false;
                if ($e->getCode() == Configure::read('MySql.ErrorCode.RowLarge')) {
                    $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailedRowLarge'), 'alert', array('class' => 'alert-error'), 'db-alert');
                }
            }
            if (!empty($save_data)) {
                $factory_building_id = $this->FactoryBuilding->id;
                $validErrors = array();
                // 主な入居企業をセーブ
                $save_data = true;
                if (is_array($this->request->data['FactoryBuildingFactoryTenant']['factory_tenant_id'])) {
                    foreach ($this->request->data['FactoryBuildingFactoryTenant']['factory_tenant_id'] as $factory_tenant_id) {
                        $saveData = array(
                            'FactoryBuildingFactoryTenant'=>array(
                                'factory_building_id' => $factory_building_id,
                                'factory_tenant_id'   => $factory_tenant_id,
                            )
                        );
                        $this->FactoryBuildingFactoryTenant->create();
                        $saveRes = $this->FactoryBuildingFactoryTenant->save($saveData);
                        if ($saveRes === false) {
                            $validErrors['FactoryBuildingFactoryTenant'] = $this->FactoryBuildingFactoryTenant->validationErrors;
                            $save_data = false;
                        }
                    }
                }
                // 画像をセーブ
                $photos = $this->photos_normalize(
                    $this->request->data['FactoryPhoto'],
                    $factory_building_id
                );
                $save_data = true;
                $savePhotos = array();
                foreach ($photos as $key => $photo) {
                    $saveData = array('FactoryPhoto'=>$photo);
                    $this->FactoryBuilding->FactoryPhoto->create();
                    $saveRes  = $this->FactoryBuilding->FactoryPhoto->save($saveData);
                    if ($saveRes === false) {
                        $validErrors['FactoryPhoto'][$key] = $this->FactoryBuilding->FactoryPhoto->validationErrors;
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
                        $from = $photo['FactoryPhoto']['path'];
                        $use_point = $photo['FactoryPhoto']['use_point'];
                        $resizes = Configure::read('Admin.Image.Size.'.$this->name.'.'.$use_point);
                        if (!is_null($resizes)) {
                            foreach ($resizes as $tmbKey => $tmbSize) {
                                $to = 'tmb_'.$tmbKey.'_'.$photo['FactoryPhoto']['path'];
                                $width  = $tmbSize[0];
                                $height = $tmbSize[1];
                                $this->ImageResizer->frame($local_dir, $from, $to, $width, $height, false);
                            }
                        }
                    }
                    $this->FactoryBuilding->commit();
                    $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    // 画像側にエラーがあったので、アップした分を消す
                    foreach ($photos as $key => $photo) {
                        $this->fileDelete($photo['path']);
                        $validErrors['FactoryPhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                    $this->set('validErrors', $validErrors);
                    $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                }
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors = array(
                    'FactoryPhoto'    => array(),
                    'FactoryBuilding' => array(),
                );
                foreach ($this->request->data['FactoryPhoto'] as $key => $factoryPhoto) {
                    // アップがあったか
                    if ($factoryPhoto['path']['error'] != UPLOAD_ERR_NO_FILE) {
                        $validErrors['FactoryPhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                }
                $validErrors['FactoryBuilding'] = $this->FactoryBuilding->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
            }
        } else {
            $this->request->data['FactoryBuilding']['alert_id'] = '1';
        }
        $factoryCategories = $this->FactoryCategory->find('list');
        $factoryTenants    = $this->FactoryTenant->find('list');
        $factoryAreas      = $this->FactoryArea->find('list', array('order'=>'modified'));
        $industrialParks   = $this->IndustrialPark->find('list');
        $addInformations   = $this->AddInformation->find('list');

        $this->set(compact('factoryCategories', 'factoryTenants', 'factoryAreas', 'industrialParks', 'addInformations'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->FactoryBuilding->id = $id;
        if (!$this->FactoryBuilding->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->FactoryBuilding->begin();
            $this->FactoryBuilding->create();

            // 位置情報
            $lat = $this->request->data['FactoryBuilding']['lat'];
            $lng = $this->request->data['FactoryBuilding']['lng'];
//            $location = $this->geoLocationFromText($lat, $lng);
//            $this->request->data['FactoryBuilding']['geolocation'] = $location;
            $this->request->data['FactoryBuilding']['lat_disabled'] = $lat;
            $this->request->data['FactoryBuilding']['lng_disabled'] = $lng;

            $next_update = $this->nextUpdate($this->request->data['FactoryBuilding']['alert_id']);
            $this->request->data['FactoryBuilding']['next_update'] = $next_update;

            try {
                $save_data = $this->FactoryBuilding->save($this->request->data);
            } catch (PDOException $e) {
                $save_data = false;
                if ($e->getCode() == Configure::read('MySql.ErrorCode.RowLarge')) {
                    $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailedRowLarge'), 'alert', array('class' => 'alert-error'), 'db-alert');
                }
            }
            if (!empty($save_data)) {
                $factory_building_id = $this->FactoryBuilding->id;
                $validErrors = array();
                // 主な入居企業はDELETE INSERT
                $this->FactoryBuilding->FactoryBuildingFactoryTenant->deleteAll(array('factory_building_id'=>$id));
                $save_data = true;
                if (is_array($this->request->data['FactoryBuildingFactoryTenant']['factory_tenant_id'])) {
                    foreach ($this->request->data['FactoryBuildingFactoryTenant']['factory_tenant_id'] as $factory_tenant_id) {
                        $saveData = array(
                            'FactoryBuildingFactoryTenant'=>array(
                                'factory_building_id' => $factory_building_id,
                                'factory_tenant_id'   => $factory_tenant_id,
                            )
                        );
                        $this->FactoryBuildingFactoryTenant->create();
                        $saveRes = $this->FactoryBuildingFactoryTenant->save($saveData);
                        if ($saveRes === false) {
                            $validErrors['FactoryBuildingFactoryTenant'] = $this->FactoryBuildingFactoryTenant->validationErrors;
                            $save_data = false;
                        }
                    }
                }

                // 変更前の画像リストを取っておく
                $oldPhotos = $this->FactoryBuilding->FactoryPhoto->find('list', array('conditions'=>array('factory_building_id'=>$id)));
                // 画像テーブルはDELETE INSERT
                $this->FactoryBuilding->FactoryPhoto->deleteAll(array('factory_building_id'=>$id));
                $photos = $this->photos_normalize(
                    $this->request->data['FactoryPhoto'],
                    $this->FactoryBuilding->id
                );
                $save_data = true;
                $savePhotos = array();
                foreach ($photos as $key => $photo) {
                    $saveData = array('FactoryPhoto'=>$photo);
                    $this->FactoryBuilding->FactoryPhoto->create();
                    $saveRes  = $this->FactoryBuilding->FactoryPhoto->save($saveData);
                    if ($saveRes === false) {
                        $validErrors['FactoryPhoto'][$key] = $this->FactoryBuilding->FactoryPhoto->validationErrors;
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
                        $from = $photo['FactoryPhoto']['path'];
                        $use_point = $photo['FactoryPhoto']['use_point'];
                        $resizes = Configure::read('Admin.Image.Size.'.$this->name.'.'.$use_point);
                        if (!is_null($resizes) && $photo['FactoryPhoto']['resize'] == 1) {
                            foreach ($resizes as $tmbKey => $tmbSize) {
                                $to = 'tmb_'.$tmbKey.'_'.$photo['FactoryPhoto']['path'];
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
                    $newPhotos = $this->FactoryBuilding->FactoryPhoto->find('list', array('conditions'=>array('factory_building_id'=>$id)));
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
                    $this->FactoryBuilding->commit();
                    $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->FactoryBuilding->rollback();
                    // 画像側にエラーがあったので、アップした分を消す
                    foreach ($photos as $key => $photo) {
                        if ($photo['resize'] == 1) {
                            $this->fileDelete($photo['path']);
                            $validErrors['FactoryPhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                        }
                    }
                    $this->set('validErrors', $validErrors);
                    $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                    // アップロードを取りやめる
                    $factoryPhotos = $this->FactoryPhoto->adminEditPhotoList($id);
                    foreach ($factoryPhotos['FactoryPhoto'] as $key => $factoryPhoto) {
                        $factoryPhotos['FactoryPhoto'][$key]['caption'] = $this->request->data['FactoryPhoto'][$key]['caption'];
                        if (isset($this->request->data['FactoryPhoto'][$key]['path_delete'])) {
                            $factoryPhotos['FactoryPhoto'][$key]['path_delete'] = $this->request->data['FactoryPhoto'][$key]['path_delete'];
                        }
                    }
                    $this->request->data['FactoryPhoto'] = $factoryPhotos['FactoryPhoto'];
                }
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors = array(
                    'FactoryPhoto'    => array(),
                    'FactoryBuilding' => array(),
                );
                foreach ($this->request->data['FactoryPhoto'] as $key => $factoryPhoto) {
                    // アップがあったか
                    if ($factoryPhoto['path']['error'] != UPLOAD_ERR_NO_FILE) {
                        $validErrors['FactoryPhoto'][$key]['path'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    }
                }
                $validErrors['FactoryBuilding'] = $this->FactoryBuilding->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                // アップロードを取りやめる
                $factoryPhotos = $this->FactoryPhoto->adminEditPhotoList($id);
                foreach ($factoryPhotos['FactoryPhoto'] as $key => $factoryPhoto) {
                    $factoryPhotos['FactoryPhoto'][$key]['caption'] = $this->request->data['FactoryPhoto'][$key]['caption'];
                    if (isset($this->request->data['FactoryPhoto'][$key]['path_delete'])) {
                        $factoryPhotos['FactoryPhoto'][$key]['path_delete'] = $this->request->data['FactoryPhoto'][$key]['path_delete'];
                    }
                }
                $this->request->data['FactoryPhoto'] = $factoryPhotos['FactoryPhoto'];
            }
        } else {
            // 不要な関連を解除
            $unbinds = array(
                'belongsTo' => array(
                    'FactoryCategory',
                    'FactoryArea',
                    'Station1',
                    'Station2',
                    'Station3',
                ),
                'hasMany' => array(
                    'FactoryPhoto',
                    'FactoryProperty',
                ),
            );
            $this->FactoryBuilding->unbindModel($unbinds, false);
            $unbinds = array(
                'belongsTo' => array(
                    'FactoryBuilding',
                ),
            );
            $this->FactoryPhoto->unbindModel($unbinds, false);
            // 住居物件情報を取得
            $factoryBuilding = $this->FactoryBuilding->findById($id);
            $factoryBuilding = $this->FactoryBuilding->setLatLngDisabled($factoryBuilding);
            // 住居物件画像を取得(ちょっと微妙になっちゃった。。。)
            $params = array(
                'conditions' => array(
                    'FactoryPhoto.factory_building_id' => $id
                ),
            );
            $factoryPhotos = $this->FactoryPhoto->adminEditPhotoList($id);

            // 入居企業一覧をセット
            $factoryBuilding = $this->FactoryBuilding->setTenant($factoryBuilding);

            // マージ
            $this->request->data = Set::merge($factoryBuilding, $factoryPhotos);
        }
        $factoryCategories = $this->FactoryCategory->find('list');
        $factoryTenants    = $this->FactoryTenant->find('list');
        $factoryAreas      = $this->FactoryArea->find('list', array('order'=>'modified'));
        $industrialParks   = $this->IndustrialPark->find('list');
        $addInformations   = $this->AddInformation->find('list');
        $factoryData       = $this->request->data;
        $this->set(compact(
            'factoryCategories',
            'factoryTenants',
            'factoryAreas',
            'industrialParks',
            'addInformations',
            'factoryData'
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
        $this->FactoryBuilding->id = $id;
        if (!$this->FactoryBuilding->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        $unbinds = array(
            'belongsTo' => array(
                'FactoryCategory',
                'FactoryArea',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'FactoryProperty',
                'FactoryPhoto',
                'IndustrialPark',
            ),
            'hasAndBelongsToMany' => array(
                'FactoryTenant',
            ),
        );
        $this->FactoryBuilding->unbindModel($unbinds);
        $findData   = $this->FactoryBuilding->findById($id);
        $photos     = $this->FactoryPhoto->find('all', array('conditions'=>array('FactoryPhoto.factory_building_id'=>$findData['FactoryBuilding']['id']),'recursive'=>-1));
        $properties = $this->FactoryProperty->find('all', array('conditions'=>array('FactoryProperty.factory_building_id'=>$findData['FactoryBuilding']['id']),'recursive'=>-1));
        if ($this->FactoryBuilding->delete()) {
            // 画像のキーリスト取得
            $keyList = array();
            foreach (Configure::read('Admin.Image.Size.'.$this->name) as $point => $resizeList) {
                foreach ($resizeList as $resizeKey => $sizeData) {
                    array_push($keyList, $resizeKey);
                }
            }
            // 画像を削除する
            foreach ($photos as $photo) {
                $this->fileDelete($photo['FactoryPhoto']['path']);
                foreach ($keyList as $keyName) {
                    $this->fileDelete('tmb_' . $keyName . '_' . $photo['FactoryPhoto']['path']);
                }
            }
            foreach ($properties as $property) {
                $this->fileDelete($property['FactoryProperty']['drowing'], 'FactoryProperties');
                $this->fileDelete($property['FactoryProperty']['arrangement_plan'], 'FactoryProperties');
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
                'factory_building_id' => $building_id,
            );
            $path_hidden = isset($photos[$i]['path_hidden']) ? $photos[$i]['path_hidden'] : '';
            $path_delete = isset($photos[$i]['path_delete']) ? $photos[$i]['path_delete'] : 0;
            if (!empty($photo['path']) && !empty($photo['factory_building_id'])) {
                $photo['resize'] = 1;
                $normalized[$i]  = $photo;
            } elseif (!empty($path_hidden) && !empty($photo['factory_building_id']) && $path_delete != 1) {
                $photo['path']   = $path_hidden;
                $photo['resize'] = 0;
                $normalized[$i]  = $photo;
            }
        }
        return $normalized;
    }
}
