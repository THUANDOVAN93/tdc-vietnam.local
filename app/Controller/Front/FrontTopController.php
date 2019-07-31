<?php
App::uses('FrontController', 'Controller');

class FrontTopController extends FrontController {

    public $name = 'FrontTop';
    public $uses = array(
        'ResidenceBuilding',
        'OfficeBuilding',
        'FactoryBuilding',
        'AddInformation',
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

        $this->set(compact(
            'residenceBuildings',
            'officeBuildings',
            'factoryBuildings'
        ));

        //画面表示
        $this->PageRender->render('index');
    }
}
