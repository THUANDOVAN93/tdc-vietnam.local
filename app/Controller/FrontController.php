<?php
App::uses('AppController', 'Controller');

class FrontController extends AppController {

    public $layout = 'front';
    public $helpers = array(
        'Session',
        'Html',
        'Form',
        'Paginator',
        'Common',
    );
    public $uses = array(
        'ResidenceBuilding',
        'OfficeBuilding',
        'FactoryBuilding',
    );
    public $components = array(
        'Cookie',
        'PageRender.PageRender',
    );

    public function beforeFilter() {

        parent::beforeFilter();

        $fctCnt = $this->FactoryBuilding->find('count', array('conditions'=>array('FactoryBuilding.visible'=>1)));

        $totalBuildingCount = ($fctCnt);
        $this->set('totalBuildingCount', $totalBuildingCount);
    }
}
