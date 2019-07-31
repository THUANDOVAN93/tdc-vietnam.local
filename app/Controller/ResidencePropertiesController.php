<?php
App::uses('AdminController', 'Controller');
/**
 * ResidenceProperties Controller
 *
 * @property ResidenceProperty $ResidenceProperty
 */
class ResidencePropertiesController extends AdminController {

    public $uses = array('ResidenceProperty', 'ResidenceBuilding');
    public $paginate = array(
        'order'  => 'ResidenceProperty.modified DESC'
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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '住居部屋管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->ResidenceProperty->recursive = 0;
        $this->set('residenceProperties', $this->paginate());
    }

    public function admin_search($id = null) {

            /* ページング時 */
        if (isset($this->params['named']['page']) || isset($this->params['named']['sort'])) {
            /* ページング時 or ソート時 */
            // セッションから検索条件を取得
            $listSearchValue = $this->Session->read('ResidencePropertiesController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else if(isset($this->request->data['ResidenceBuilding']['residence_building_id'])) {
            /* 親データから来た場合 */
            $listSearchValue['ResidenceProperty']['residence_building_id'] = $this->request->data['ResidenceBuilding']['residence_building_id'];
            $this->Session->write('ResidencePropertiesController.ListSearchValue', $listSearchValue);
            $this->request->data = $listSearchValue;
        } else if(!is_null($id)) {
            /* URLで物件IDが渡された場合 */
            $listSearchValue['ResidenceProperty']['residence_building_id'] = $id;
            $this->Session->write('ResidencePropertiesController.ListSearchValue', $listSearchValue);
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $this->Session->write('ResidencePropertiesController.ListSearchValue', $this->request->data);
            $listSearchValue = $this->request->data;
        }

        // 検索条件の取得
        $params = $this->ResidenceProperty->listSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('residenceProperties', $this->paginate());

        return $this->render('admin_index');
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add($id = null) {
        if ($this->request->is('post')) {
            $this->ResidenceProperty->create();

            // ファイルアップロード
            $image_path = $this->fileUpload(
                $this->request->data['ResidenceProperty']['drowing']['tmp_name'],
                $this->request->data['ResidenceProperty']['drowing']['name']
            );
            unset($this->request->data['ResidenceProperty']['drowing']);
            $this->request->data['ResidenceProperty']['drowing'] = $image_path;

            if ($this->ResidenceProperty->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                // 親の次回更新日付を更新
                $residence_building_id = $this->request->data['ResidenceProperty']['residence_building_id'];
                $this->ResidenceBuilding->setNextUpdate($residence_building_id);
                // 親の物件が検索された状態で一覧に遷移
                $this->redirect(array('action' => 'search', $residence_building_id));
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors['ResidenceProperty'] = $this->ResidenceProperty->validationErrors;
                if (!empty($image_path)) {
                    $validErrors['ResidenceProperty']['drowing'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($image_path);
                }
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
            }
        }
        $residenceBuildings = $this->ResidenceProperty->ResidenceBuilding->find('list');
        $residenceLayouts = $this->ResidenceProperty->ResidenceLayout->find('list');
        $this->set(compact('residenceBuildings', 'residenceLayouts'));

        $buildingData = $this->ResidenceBuilding->findById($id);
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
        $this->ResidenceProperty->id = $id;
        if (!$this->ResidenceProperty->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            // ファイルアップロード
            $image_path = $this->fileUpload(
                $this->request->data['ResidenceProperty']['new_drowing']['tmp_name'],
                $this->request->data['ResidenceProperty']['new_drowing']['name']
            );
            $bk_drowing = $this->request->data['ResidenceProperty']['drowing'];
            $bk_new_drowing = $image_path;
            $drowing_delete = isset($this->request->data['ResidenceProperty']['drowing_delete']) ? $this->request->data['ResidenceProperty']['drowing_delete'] : 0;
            unset($this->request->data['ResidenceProperty']['new_drowing']);
            if (!empty($image_path)) {
                $this->request->data['ResidenceProperty']['drowing'] = $image_path;
            } elseif (!empty($drowing_delete)) {
                $this->request->data['ResidenceProperty']['drowing'] = '';
            }

            if ($this->ResidenceProperty->save($this->request->data)) {
                // 古い画像は消す
                if (!empty($bk_drowing) && (!empty($image_path) || $drowing_delete)) {
                    $this->fileDelete($bk_drowing);
                }
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'alert', array('class' => 'alert-success'));
                // 親の次回更新日付を更新
                $residence_building_id = $this->request->data['ResidenceProperty']['residence_building_id'];
                $this->ResidenceBuilding->setNextUpdate($residence_building_id);
                // 親の物件が検索された状態で一覧に遷移
                $this->redirect(array('action' => 'search', $residence_building_id));
            } else {
                // 入力エラーがあったために、アップロードを取りやめた分を表示させる
                $validErrors['ResidenceProperty'] = $this->ResidenceProperty->validationErrors;
                if (!empty($bk_new_drowing)) {
                    $validErrors['ResidenceProperty']['drowing'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                    $this->fileDelete($bk_new_drowing);
                }
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert-error'));
                $this->request->data['ResidenceProperty']['drowing'] = $bk_drowing;
            }
        } else {
            $this->request->data = $this->ResidenceProperty->read(null, $id);
        }
        $residenceBuildings = $this->ResidenceProperty->ResidenceBuilding->find('list');
        $residenceLayouts = $this->ResidenceProperty->ResidenceLayout->find('list');
        $this->set(compact('residenceBuildings', 'residenceLayouts'));
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
        $this->ResidenceProperty->id = $id;
        if (!$this->ResidenceProperty->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }
        $findData = $this->ResidenceProperty->findById($id);
        if ($this->ResidenceProperty->delete()) {
            // 画像があれば消す
            if (!empty($findData['ResidenceProperty']['drowing'])) {
                $this->fileDelete($findData['ResidenceProperty']['drowing']);
            }
            // 親の次回更新日付を更新
            $residence_building_id = $findData['ResidenceProperty']['residence_building_id'];
            $this->ResidenceBuilding->setNextUpdate($residence_building_id);
            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'alert', array('class' => 'alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert-error'));
        $this->redirect(array('action' => 'index'));
    }
}
