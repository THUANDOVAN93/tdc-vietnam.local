<?php
App::uses('AdminController', 'Controller');
/**
 * FactoryCategories Controller
 *
 * @property FactoryCategory $FactoryCategory
 */
class FactoryCategoriesController extends AdminController {

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
    public $uses = array('FactoryCategory');

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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '工場種別管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->FactoryCategory->recursive = 0;
        $this->set('factoryCategories', $this->paginate());
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {

            $this->FactoryCategory->create();

            if ($this->FactoryCategory->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->FactoryCategory->validationErrors;
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

        $this->FactoryCategory->id = $id;
        if (!$this->FactoryCategory->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->FactoryCategory->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->FactoryCategory->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->FactoryCategory->read(null, $id);
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

        $this->FactoryCategory->id = $id;
        if (!$this->FactoryCategory->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        try {
            $result = $this->FactoryCategory->delete();
        } catch (PDOException $e) {
            $result = false;
            if ($e->getCode() == Configure::read('MySql.ErrorCode.ForeignKey')) {
                $data = $this->FactoryCategory->read('name');
                $dataName = $data['FactoryCategory']['name'];
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
