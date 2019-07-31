<?php
App::uses('AdminController', 'Controller');
/**
 * ResidenceCategories Controller
 *
 * @property ResidenceCategory $ResidenceCategory
 */
class ResidenceCategoriesController extends AdminController {
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
    public $uses = array('ResidenceCategory');

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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '住居種別管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->ResidenceCategory->recursive = 0;
        $this->set('residenceCategories', $this->paginate());
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {

            $this->ResidenceCategory->create();

            if ($this->ResidenceCategory->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->ResidenceCategory->validationErrors;
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

        $this->ResidenceCategory->id = $id;
        if (!$this->ResidenceCategory->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->ResidenceCategory->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->ResidenceCategory->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->ResidenceCategory->read(null, $id);
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

        $this->ResidenceCategory->id = $id;
        if (!$this->ResidenceCategory->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        try {
            $result = $this->ResidenceCategory->delete();
        } catch (PDOException $e) {
            $result = false;
            if ($e->getCode() == Configure::read('MySql.ErrorCode.ForeignKey')) {
                $data = $this->ResidenceCategory->read('name');
                $dataName = $data['ResidenceCategory']['name'];
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
