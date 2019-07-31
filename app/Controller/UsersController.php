<?php
App::uses('AdminController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class UsersController extends AdminController {

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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), 'ユーザー管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {

            $this->User->create();

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->User->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            unset($this->request->data['User']['password']);
            if (!empty($this->request->data['User']['new_password'])) {
                $this->request->data['User']['password'] = $this->request->data['User']['new_password'];
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->User->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }

        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
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

        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        //ログイン中のユーザーは、削除禁止
        if ($this->User->id == $this->Session->read('Auth.User.id')) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataLoginUser'), 'alert', array('class' => 'alert alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->User->delete()) {
            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert alert-error'));
        $this->redirect(array('action' => 'index'));
    }
}
