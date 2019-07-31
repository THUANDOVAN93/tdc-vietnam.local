<?php
App::uses('AdminController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class RolesController extends AdminController {

    public $uses = array('Role');
    public $components = array('Auth', 'Session');

/**
 * beforeFilter
 *
 * @return void
 */
    public function beforeFilter() {
        parent::beforeFilter();
        if (empty($this->roleManager)) {
            $this->Session->setFlash(Configure::read('Admin.Message.AuthFailed'), 'alert', array('class' => 'alert-error'),'auth-alert');
            $this->redirect('/admin/');
        }

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '権限管理'));
    }
/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Role->recursive = 0;
        $this->set('roles', $this->paginate());
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {

            $this->Role->create();

            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->Role->validationErrors;
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

        $this->Role->id = $id;
        if (!$this->Role->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->Role->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->Role->read(null, $id);
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

        $this->Role->id = $id;
        if (!$this->Role->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        try {
            $result = $this->Role->delete();
        } catch (PDOException $e) {
            $result = false;
            if ($e->getCode() == Configure::read('MySql.ErrorCode.ForeignKey')) {
                $data = $this->Role->read('name');
                $dataName = $data['Role']['name'];
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
