<?php
App::uses('AdminController', 'Controller');
/**
 * FactoryProperties Controller
 *
 * @property FactoryProperty $FactoryProperty
 */
class FactoryPropertiesController extends AdminController {

    public $uses = array(
        'FactoryProperty',
        'FactoryBuilding',
    );
    public $paginate = array(
        'order' => 'FactoryProperty.modified DESC'
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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '工場区画管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
//        $this->FactoryProperty->recursive = 0;
        $this->set('factoryProperties', $this->paginate());

        $factorySubCategories = $this->FactoryProperty->FactorySubCategory->find('list');
        $this->set(compact('factorySubCategories'));
    }

    public function admin_search($id = null) {

        if (isset($this->params['named']['page']) || isset($this->params['named']['sort'])) {
            /* ページング時 or ソート時 */
            // セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FactoryPropertiesController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else if(isset($this->request->data['FactoryBuilding']['factory_building_id'])) {
            /* 親データから来た場合 */
            $listSearchValue['FactoryProperty']['factory_building_id'] = $this->request->data['FactoryBuilding']['factory_building_id'];
            $this->Session->write('FactoryPropertiesController.ListSearchValue', $listSearchValue);
            $this->request->data = $listSearchValue;
        } else if(!is_null($id)) {
            /* URLで物件IDが渡された場合 */
            $listSearchValue['FactoryProperty']['factory_building_id'] = $id;
            $this->Session->write('FactoryPropertiesController.ListSearchValue', $listSearchValue);
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $this->Session->write('FactoryPropertiesController.ListSearchValue', $this->request->data);
            $listSearchValue = $this->request->data;
        }

        // 検索条件の取得
        $params = $this->FactoryProperty->listSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('factoryProperties', $this->paginate());

        $factorySubCategories = $this->FactoryProperty->FactorySubCategory->find('list');
        $this->set(compact('factorySubCategories'));

        return $this->render('admin_index');
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add($id = null) {
        if ($this->request->is('post')) {
            $this->FactoryProperty->create();

            // ファイルアップロード
            $image_path = $this->fileUpload(
                $this->request->data['FactoryProperty']['drowing']['tmp_name'],
                $this->request->data['FactoryProperty']['drowing']['name']
            );
            unset($this->request->data['FactoryProperty']['drowing']);
            $this->request->data['FactoryProperty']['drowing'] = $image_path;
            $drowing = $image_path;

            // ファイルアップロード
            $image_path = $this->fileUpload(
                $this->request->data['FactoryProperty']['arrangement_plan']['tmp_name'],
                $this->request->data['FactoryProperty']['arrangement_plan']['name']
            );
            unset($this->request->data['FactoryProperty']['arrangement_plan']);
            $this->request->data['FactoryProperty']['arrangement_plan'] = $image_path;
            $arrangement_plan = $image_path;

            if ($this->FactoryProperty->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                // 親の次回更新日付を更新
                $factory_building_id = $this->request->data['FactoryProperty']['factory_building_id'];
                $this->FactoryBuilding->setNextUpdate($factory_building_id);
                // 親の物件が検索された状態で一覧に遷移
                $this->redirect(array('action' => 'search', $factory_building_id));
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors['FactoryProperty'] = $this->FactoryProperty->validationErrors;
                if (!empty($this->request->data['FactoryProperty']['drowing'])) {
                    $validErrors['FactoryProperty']['drowing'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($drowing);
                }
                if (!empty($this->request->data['FactoryProperty']['arrangement_plan'])) {
                    $validErrors['FactoryProperty']['arrangement_plan'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($arrangement_plan);
                }
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
            }
        }
        $factoryBuildings     = $this->FactoryProperty->FactoryBuilding->find('list');
        $factorySubCategories = $this->FactoryProperty->FactorySubCategory->find('list');
        $this->set(compact('factoryBuildings', 'factorySubCategories'));

        $buildingData = $this->FactoryBuilding->findById($id);
        if (empty($buildingData)) {
            $id = null;
        }
        $this->set('set_building_id', $id);
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->FactoryProperty->id = $id;
        if (!$this->FactoryProperty->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            // ファイルアップロード
            $image_path = $this->fileUpload(
                $this->request->data['FactoryProperty']['new_drowing']['tmp_name'],
                $this->request->data['FactoryProperty']['new_drowing']['name']
            );
            $bk_drowing = $this->request->data['FactoryProperty']['drowing'];
            $bk_new_drowing = $image_path;
            $drowing_delete = isset($this->request->data['FactoryProperty']['drowing_delete']) ? $this->request->data['FactoryProperty']['drowing_delete'] : 0;
            unset($this->request->data['FactoryProperty']['new_drowing']);
            if (!empty($image_path)) {
                $this->request->data['FactoryProperty']['drowing'] = $image_path;
            } elseif (!empty($drowing_delete)) {
                $this->request->data['FactoryProperty']['drowing'] = '';
            }
            $image_path = $this->fileUpload(
                $this->request->data['FactoryProperty']['new_arrangement_plan']['tmp_name'],
                $this->request->data['FactoryProperty']['new_arrangement_plan']['name']
            );
            $bk_arrangement_plan = $this->request->data['FactoryProperty']['arrangement_plan'];
            $bk_new_arrangement_plan = $image_path;
            $arrangement_plan_delete = isset($this->request->data['FactoryProperty']['arrangement_plan_delete']) ? $this->request->data['FactoryProperty']['arrangement_plan_delete'] : 0;
            unset($this->request->data['FactoryProperty']['new_arrangement_plan']);
            if (!empty($image_path)) {
                $this->request->data['FactoryProperty']['arrangement_plan'] = $image_path;
            } elseif (!empty($arrangement_plan_delete)) {
                $this->request->data['FactoryProperty']['arrangement_plan'] = '';
            }

            if ($this->FactoryProperty->save($this->request->data)) {
                // 古い画像は消す
                if (!empty($bk_drowing) && (!empty($bk_new_drowing) || !empty($drowing_delete))) {
                    $this->fileDelete($bk_drowing);
                }
                if (!empty($bk_arrangement_plan) && (!empty($bk_new_arrangement_plan) || !empty($arrangement_plan_delete))) {
                    $this->fileDelete($bk_arrangement_plan);
                }
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                // 親の次回更新日付を更新
                $factory_building_id = $this->request->data['FactoryProperty']['factory_building_id'];
                $this->FactoryBuilding->setNextUpdate($factory_building_id);
                // 親の物件が検索された状態で一覧に遷移
                $this->redirect(array('action' => 'search', $factory_building_id));
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors['FactoryProperty'] = $this->FactoryProperty->validationErrors;
                if (!empty($bk_new_drowing)) {
                    $validErrors['FactoryProperty']['drowing'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($bk_new_drowing);
                }
                if (!empty($bk_new_arrangement_plan)) {
                    $validErrors['FactoryProperty']['arrangement_plan'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($bk_new_arrangement_plan);
                }
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                $this->request->data['FactoryProperty']['drowing'] = $bk_drowing;
                $this->request->data['FactoryProperty']['arrangement_plan'] = $bk_arrangement_plan;
            }
        } else {
            $this->request->data = $this->FactoryProperty->read(null, $id);
        }
        $factoryBuildings = $this->FactoryProperty->FactoryBuilding->find('list');
        $factorySubCategories = $this->FactoryProperty->FactorySubCategory->find('list');
        $this->set(compact('factoryBuildings', 'factorySubCategories'));
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
        $this->FactoryProperty->id = $id;
        if (!$this->FactoryProperty->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        $findData = $this->FactoryProperty->findById($id);
        if ($this->FactoryProperty->delete()) {
            // 画像があれば消す
            if (!empty($findData['FactoryProperty']['drowing'])) {
                $this->fileDelete($findData['FactoryProperty']['drowing']);
            }
            if (!empty($findData['FactoryProperty']['arrangement_plan'])) {
                $this->fileDelete($findData['FactoryProperty']['arrangement_plan']);
            }
            // 親の次回更新日付を更新
            $factory_building_id = $findData['FactoryProperty']['factory_building_id'];
            $this->FactoryBuilding->setNextUpdate($factory_building_id);
            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'alert', array('class' => 'alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert-error'));
        $this->redirect(array('action' => 'index'));
    }
}
