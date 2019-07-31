<?php
App::uses('AdminController', 'Controller');
/**
 * OfficeProperties Controller
 *
 * @property OfficeProperty $OfficeProperty
 */
class OfficePropertiesController extends AdminController {

    public $uses = array(
        'OfficeProperty',
        'OfficeBuilding',
        'OfficeLayout',
        'OfficePersonNum',
    );
    public $paginate = array(
        'order'  => 'OfficeProperty.modified DESC'
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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '事務所部屋管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->OfficeProperty->recursive = 0;
        $this->set('officeProperties', $this->paginate());
    }

    public function admin_search($id = null) {

        //ページング時
        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            // セッションから検索条件を取得
            $listSearchValue = $this->Session->read('OfficePropertiesController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else if(isset($this->request->data['OfficeBuilding']['office_building_id'])) {
            /* 親データから来た場合 */
            $listSearchValue['OfficeProperty']['office_building_id'] = $this->request->data['OfficeBuilding']['office_building_id'];
            $this->Session->write('OfficePropertiesController.ListSearchValue', $listSearchValue);
            $this->request->data = $listSearchValue;
        } else if(!is_null($id)) {
            /* URLで物件IDが渡された場合 */
            $listSearchValue['OfficeProperty']['office_building_id'] = $id;
            $this->Session->write('OfficePropertiesController.ListSearchValue', $listSearchValue);
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $this->Session->write('OfficePropertiesController.ListSearchValue', $this->request->data);
            $listSearchValue = $this->request->data;
        }

        // 検索条件の取得
        $params = $this->OfficeProperty->listSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('officeProperties', $this->paginate());

        return $this->render('admin_index');
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add($id = null) {
        if ($this->request->is('post')) {
            $this->OfficeProperty->create();

            // ファイルアップロード
            $image_path = $this->fileUpload(
                $this->request->data['OfficeProperty']['drowing']['tmp_name'],
                $this->request->data['OfficeProperty']['drowing']['name']
            );
            unset($this->request->data['OfficeProperty']['drowing']);
            $this->request->data['OfficeProperty']['drowing'] = $image_path;

            if ($this->OfficeProperty->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                // 親の次回更新日付を更新
                $office_building_id = $this->request->data['OfficeProperty']['office_building_id'];
                $this->OfficeBuilding->setNextUpdate($office_building_id);
                // 親の物件が検索された状態で一覧に遷移
                $this->redirect(array('action' => 'search', $office_building_id));
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors['OfficeProperty'] = $this->OfficeProperty->validationErrors;
                if (!empty($this->request->data['OfficeProperty']['drowing'])) {
                    $validErrors['OfficeProperty']['drowing'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($image_path);
                }
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
            }
        }
        $officeBuildings  = $this->OfficeBuilding->find('list');
        $officeLayouts    = $this->OfficeLayout->find('list');
        $officePersonNums = $this->OfficePersonNum->find('list');
        $this->set(compact('officeBuildings', 'officeLayouts', 'officePersonNums'));

        $buildingData = $this->OfficeBuilding->findById($id);
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
        $this->OfficeProperty->id = $id;
        if (!$this->OfficeProperty->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            // ファイルアップロード
            $image_path = $this->fileUpload(
                $this->request->data['OfficeProperty']['new_drowing']['tmp_name'],
                $this->request->data['OfficeProperty']['new_drowing']['name']
            );
            $bk_drowing = $this->request->data['OfficeProperty']['drowing'];
            $bk_new_drowing = $image_path;
            $drowing_delete = isset($this->request->data['OfficeProperty']['drowing_delete']) ? $this->request->data['OfficeProperty']['drowing_delete'] : 0;
            unset($this->request->data['OfficeProperty']['new_drowing']);
            if (!empty($image_path)) {
                $this->request->data['OfficeProperty']['drowing'] = $image_path;
            } elseif (!empty($drowing_delete)) {
                $this->request->data['OfficeProperty']['drowing'] = '';
            }

            if ($this->OfficeProperty->save($this->request->data)) {
                // 古い画像は消す
                if (!empty($bk_drowing) && (!empty($image_path) || !empty($drowing_delete))) {
                    $this->fileDelete($bk_drowing);
                }
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                // 親の次回更新日付を更新
                $office_building_id = $this->request->data['OfficeProperty']['office_building_id'];
                $this->OfficeBuilding->setNextUpdate($office_building_id);
                // 親の物件が検索された状態で一覧に遷移
                $this->redirect(array('action' => 'search', $office_building_id));
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors['OfficeProperty'] = $this->OfficeProperty->validationErrors;
                if (!empty($bk_new_drowing)) {
                    $validErrors['OfficeProperty']['drowing'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($bk_new_drowing);
                }
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                $this->request->data['OfficeProperty']['drowing'] = $bk_drowing;
            }
        } else {
            $this->request->data = $this->OfficeProperty->read(null, $id);
        }
        $officeBuildings  = $this->OfficeBuilding->find('list');
        $officeLayouts    = $this->OfficeLayout->find('list');
        $officePersonNums = $this->OfficePersonNum->find('list');
        $this->set(compact('officeBuildings', 'officeLayouts', 'officePersonNums'));
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
        $this->OfficeProperty->id = $id;
        if (!$this->OfficeProperty->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        $findData = $this->OfficeProperty->findById($id);
        if ($this->OfficeProperty->delete()) {
            // 画像があれば消す
            if (!empty($findData['OfficeProperty']['drowing'])) {
                $this->fileDelete($findData['OfficeProperty']['drowing']);
            }
            // 親の次回更新日付を更新
            $office_building_id = $findData['OfficeProperty']['office_building_id'];
            $this->OfficeBuilding->setNextUpdate($office_building_id);
            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'alert', array('class' => 'alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert-error'));
        $this->redirect(array('action' => 'index'));
    }
}
