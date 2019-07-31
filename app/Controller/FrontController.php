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
        'PageRender.PageRender',
    );

    public function beforeFilter() {
        parent::beforeFilter();

        $resCnt = $this->ResidenceBuilding->find('count', array('conditions'=>array('ResidenceBuilding.visible'=>1)));
        $ofcCnt = $this->OfficeBuilding->find('count', array('conditions'=>array('OfficeBuilding.visible'=>1)));
        $fctCnt = $this->FactoryBuilding->find('count', array('conditions'=>array('FactoryBuilding.visible'=>1)));

        $totalBuildingCount = ($resCnt + $ofcCnt + $fctCnt);
        $this->set('totalBuildingCount', $totalBuildingCount);
    }

}
