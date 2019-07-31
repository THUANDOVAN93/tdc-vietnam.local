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


    public function index($lang = 'en') {
        $this->Session->write('lang',$lang);
        echo $lang;
    }
}