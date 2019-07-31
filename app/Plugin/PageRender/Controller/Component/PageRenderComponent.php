<?php

class PageRenderComponent extends Component {

    var $c = null;

    public function initialize(Controller $controller) {
        $this->c = $controller;
    }

    /**
     * タイトルセット＆レンダリング
     *
     * @return
     * @access public
     */
    function render($action){
        $name = $this->c->name;
        $settingInfo = Configure::read('Page.infolist.'.$name.'.'.$action);
        if (is_null($settingInfo)) {
            $this->c->cakeError('error404');
        }
        $defaultInfo = array(
            'render'      => '',
            'title'       => '',
            'keywords'    => '',
            'description' => '',
            'canonical'   => '',
        );
        $info = Set::merge($defaultInfo, $settingInfo);
        $this->c->set('title_for_layout', $info['title']);
        $this->c->set('meta_keywords'   , $info['keywords']);
        $this->c->set('meta_description', $info['description']);
        $this->c->set('link_canonical', $info['canonical']);
        $this->c->render($info['render']);
    }

}