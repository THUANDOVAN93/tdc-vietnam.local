<?php
/**
 * Users Controller
 *
 * @property User $User
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */


class LangController extends AppController {

    public $components = array('Session');
    public $layout = false;
    public $autoRender = false;


    public function index() {
        if ($this->Session->check('Config.language')) {
            Configure::write('Config.language', $this->Session->read('Config.language'));
        }
        if (isset($this->params['language']) && $this->params['language'] != $this->Session->read('Config.language')) {
            Configure::write('Config.language', $this->params['language']);
            $this->Session->write('Config.language', $this->params['language']);
        }
        return $this->redirect($this->referer());
    }
}