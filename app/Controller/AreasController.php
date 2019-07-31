<?php
App::uses('AdminController', 'Controller');
/**
 * Areas Controller
 *
 * @property Area $Area
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class AreasController extends AdminController {
/**
 * paginate
 *
 * @var array
 */
    public $paginate = array(
        'sort' => 'id'
    );

/**
 * Uses
 *
 * @var array
 */
    public $uses = array('Area');

/**
 * beforeFilter
 *
 * @return void
 */
    public function beforeFilter() {
        parent::beforeFilter();
        if (empty($this->roleAdmin)) {
            $this->Session->setFlash(Configure::read('Admin.Message.AuthFailed'), 'alert', array('class' => 'alert-error'),'auth-alert');
            $this->redirect('/admin/');
        }

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), 'エリア管理'));
    }

/**
 * getLocalFilePath method
 *
 * @return string
 */
    private function getLocalFilePath($id) {
        // マップ画像のファイルパスを取得する
        $result = $this->Area->findById($id);
        $url_path = $result['Area']['map'];
        if (!empty($url_path)) {
            $url_path = Configure::read('UploadSavePath') . $this->name . '/' . $url_path;
        }
        return $url_path;
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Area->recursive = 0;
        $this->set('areas', $this->paginate());
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {

            $this->Area->create();

            if ($this->Area->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {

                // 位置情報を再設定
                $areaData = $this->request->data;
                $areaData['Area']['lat_disabled'] = $areaData['Area']['lat'];
                $areaData['Area']['lng_disabled'] = $areaData['Area']['lng'];
                $this->request->data = $areaData;

                $validErrors = $this->Area->validationErrors;

                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        }
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {

        $this->Area->id = $id;
        if (!$this->Area->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->Area->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {

                // 位置情報を再設定
                $areaData = $this->request->data;
                $areaData['Area']['lat_disabled'] = $areaData['Area']['lat'];
                $areaData['Area']['lng_disabled'] = $areaData['Area']['lng'];
                $this->request->data = $areaData;

                $validErrors = $this->Area->validationErrors;

                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }

        } else {

            //初期表示
            $areaData = $this->Area->read(null, $id);
            $areaData['Area']['lat_disabled'] = $areaData['Area']['lat'];
            $areaData['Area']['lng_disabled'] = $areaData['Area']['lng'];

            $this->request->data = $areaData;
        }
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

        $this->Area->id = $id;
        if (!$this->Area->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        try {
            $result = $this->Area->delete();
        } catch (PDOException $e) {
            $result = false;
            if ($e->getCode() == Configure::read('MySql.ErrorCode.ForeignKey')) {
                $data = $this->Area->read('name');
                $dataName = $data['Area']['name'];
                $this->Session->setFlash(sprintf(Configure::read('Admin.Message.DbDeleteFailedForeignKey'), $dataName), 'alert', array('class' => 'alert alert-error'));
                $this->redirect(array('action' => 'index'));
            }
        }

        if ($result) {
            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert alert-error'));
        $this->redirect(array('action' => 'index'));
    }
}
