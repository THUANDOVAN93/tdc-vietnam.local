<?php
App::uses('AdminController', 'Controller');
/**
 * FactoryAreas Controller
 *
 * @property FactoryArea $FactoryArea
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class FactoryAreasController extends AdminController {
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
    public $uses = array('FactoryArea');

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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '工場エリア管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->FactoryArea->recursive = 0;
        $this->set('factoryAreas', $this->paginate());
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {

            $this->FactoryArea->create();

            if ($this->FactoryArea->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {

                // 位置情報を再設定
                $factoryAreaData = $this->request->data;
                $factoryAreaData['FactoryArea']['lat_disabled'] = $factoryAreaData['FactoryArea']['lat'];
                $factoryAreaData['FactoryArea']['lng_disabled'] = $factoryAreaData['FactoryArea']['lng'];
                $this->request->data = $factoryAreaData;

                $validErrors = $this->FactoryArea->validationErrors;
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

        $this->FactoryArea->id = $id;
        if (!$this->FactoryArea->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->FactoryArea->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {

                // 位置情報を再設定
                $factoryAreaData = $this->request->data;
                $factoryAreaData['FactoryArea']['lat_disabled'] = $factoryAreaData['FactoryArea']['lat'];
                $factoryAreaData['FactoryArea']['lng_disabled'] = $factoryAreaData['FactoryArea']['lng'];
                $this->request->data = $factoryAreaData;

                $validErrors = $this->FactoryArea->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }

        } else {

            //初期表示
            $factoryAreaData = $this->FactoryArea->read(null, $id);
            $factoryAreaData['FactoryArea']['lat_disabled'] = $factoryAreaData['FactoryArea']['lat'];
            $factoryAreaData['FactoryArea']['lng_disabled'] = $factoryAreaData['FactoryArea']['lng'];

            $this->request->data = $factoryAreaData;
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

        $this->FactoryArea->id = $id;
        if (!$this->FactoryArea->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        try {
            $result = $this->FactoryArea->delete();
        } catch (PDOException $e) {
            $result = false;
            if ($e->getCode() == Configure::read('MySql.ErrorCode.ForeignKey')) {
                $data = $this->FactoryArea->read('name');
                $dataName = $data['FactoryArea']['name'];
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
