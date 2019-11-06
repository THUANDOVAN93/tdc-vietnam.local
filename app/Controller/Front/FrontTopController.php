<?php
App::uses('FrontController', 'Controller');

class FrontTopController extends FrontController {

    public $name = 'FrontTop';
    public $uses = array(
        'ResidenceBuilding',
        'OfficeBuilding',
        'FactoryBuilding',
        'AddInformation',
        'FactoryArea',
    );

    // TOPページ
    public function index() {

        $this->ResidenceBuilding->unbindModelAll();
        $this->ResidenceBuilding->bindModelMainPhoto();
        $this->OfficeBuilding->unbindModelAll();
        $this->OfficeBuilding->bindModelMainPhoto();
        $this->FactoryBuilding->unbindModelAll();
        $this->FactoryBuilding->bindModelMainPhoto();

        $addInfos = $this->AddInformation->find('all', array('conditions'  => array('AddInformation.is_enable' => '1')));
        $this->set('addInfos', $addInfos);

        // 住居
        foreach ($addInfos as $addInfo) {
            $addInfoId = $addInfo['AddInformation']['id'];
            $size = 8;
            if ($addInfoId == '1' || $addInfoId == '2') {
                //新着、おすすめは1段
                $size = 4;
            }
            $residenceBuildings['add_information' . $addInfoId] = $this->ResidenceBuilding->getTopIconList('add_information' .$addInfoId , $size);
        }

        // 事務所
        foreach ($addInfos as $addInfo) {
            $addInfoId = $addInfo['AddInformation']['id'];
            $size = 8;
            if ($addInfoId == '1' || $addInfoId == '2') {
                //新着、おすすめは1段
                $size = 4;
            }
            $officeBuildings['add_information' . $addInfoId] = $this->OfficeBuilding->getTopIconList('add_information' .$addInfoId , $size);
        }

        // 工場
        foreach ($addInfos as $addInfo) {
            $addInfoId = $addInfo['AddInformation']['id'];
            $size = 8;
            if ($addInfoId == '1' || $addInfoId == '2') {
                //新着、おすすめは1段
                $size = 4;
            }
            $factoryBuildings['add_information' . $addInfoId] = $this->FactoryBuilding->getTopIconList('add_information' .$addInfoId , $size);
        }

        // Add Left Menu (Edit By Thuando)
        //$factoryAreas = $this->FactoryArea->find('all');
        //$this->FactoryArea->bindTranslation(array('name' => 'nameTranslation'));
        //$this->FactoryArea->locale = "eng";
        //$this->FactoryArea->FactoryBuildingOfArea->locale = "jpn";
        $this->FactoryArea->Behaviors->load('Containable');

        //debug($this->FactoryArea->FactoryBuildingOfArea->Behaviors);exit;
        // if (!$this->FactoryArea->FactoryBuildingOfArea->Behaviors->enabled('Translate')) {
        //     var_dump("this case");exit();
        //     $this->FactoryArea->FactoryBuildingOfArea->Behaviors->enable('Translate');
        // }

        //$this->FactoryArea->FactoryBuildingOfArea->Behaviors->load('Translate');
        //$this->FactoryArea->FactoryBuildingOfArea->Behaviors->enable('Translate', array('name' => 'nameTranslation'));
        $factoryAreas = $this->FactoryArea->find('all', array(
                'fields' => array('FactoryArea.id','FactoryArea.name'),
                // 'contain' => array(
                //     'FactoryBuildingOfArea' => array(
                //         'fields' => array('FactoryBuildingOfArea.id', 'FactoryBuildingOfArea.name')
                //     )
                // )
            )
        );
        //debug($factoryAreas);die();
        $this->set('factoryAreas', $factoryAreas);

        $this->set(compact(
            'residenceBuildings',
            'officeBuildings',
            'factoryBuildings'
        ));

        //画面表示
        $this->PageRender->render('index');
    }
}
