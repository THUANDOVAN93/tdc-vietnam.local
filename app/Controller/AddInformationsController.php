<?php
App::uses('AdminController', 'Controller');
/**
 * OfficePersonNums Controller
 *
 * @property OfficePersonNum $OfficePersonNum
 */
class AddInformationsController extends AdminController {
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
    public $uses = array('AddInformation');

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

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), 'TOP表示項目管理'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->AddInformation->recursive = 0;
        $this->set('addInformations', $this->paginate());
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {

        $this->AddInformation->id = $id;
        if (!$this->AddInformation->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($id < 4) {
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->AddInformation->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $validErrors = $this->AddInformation->validationErrors;
                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->AddInformation->read(null, $id);
        }
    }
}
