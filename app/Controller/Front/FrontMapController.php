<?php
App::uses('FrontController', 'Controller');
/**
 * ResidenceCategories Controller
 *
 * @property ResidenceCategory $ResidenceCategory
 */
class FrontMapController extends FrontController {

    public $name = 'FrontMap';
    public $uses = array(
        'ResidenceBuilding',
        'OfficeBuilding',
        'FactoryBuilding',
    	'Station',
    );
    public $components = array(
        'RequestHandler',
        'PageRender.PageRender',
    );

    public function beforeFilter() {
    }

    // マップのサンプルページ
    public function index() {
        $this->PageRender->render('index');
    }

    // マップXML
    public function xml() {
        $building = $this->request->params['building'];
        switch ($building) {
            case 'residence':
                $this->_actionXmlResidence();
                break;
            case 'office':
                $this->_actionXmlOffice();
                break;
            case 'factory':
                $this->_actionXmlFactory();
                break;
            default:
                throw new NotFoundException();
                break;
        }
        $this->layout = '';
        $this->RequestHandler->respondAs('text/xml');
        $this->render('/Map/xml');
    }

    // 住居用XML出力
    private function _actionXmlResidence() {
        $searchCond = array();
        $searchCond['min_lat']               = $this->request->params['min_lat'];
        $searchCond['max_lat']               = $this->request->params['max_lat'];
        $searchCond['min_lng']               = $this->request->params['min_lng'];
        $searchCond['max_lng']               = $this->request->params['max_lng'];

        $typeChecked                         = $this->request->params['typeflg'];
        $searchCond['residence_category_id'] = explode(',', $typeChecked);

        $retData = $this->ResidenceBuilding->getMapDataList($searchCond);
        $this->set('buildingList', $retData);
        $this->set('keyNameBuilding', 'ResidenceBuilding');
        $this->set('keyNamePhoto'   , 'ResidencePhoto');
        $this->set('categoryId'     , 'residence_category_id');

		//駅情報
        $retData2 = $this->Station->getMapDataList();
        $this->set('stationList', $retData2);
    }

    // 事務所用XML出力
    private function _actionXmlOffice() {
        $searchCond = array();
        $searchCond['min_lat']               = $this->request->params['min_lat'];
        $searchCond['max_lat']               = $this->request->params['max_lat'];
        $searchCond['min_lng']               = $this->request->params['min_lng'];
        $searchCond['max_lng']               = $this->request->params['max_lng'];

        $typeChecked                         = $this->request->params['typeflg'];
        $searchCond['office_category_id'] = explode(',', $typeChecked);

        $retData = $this->OfficeBuilding->getMapDataList($searchCond);
        $this->set('buildingList', $retData);
        $this->set('keyNameBuilding', 'OfficeBuilding');
        $this->set('keyNamePhoto'   , 'OfficePhoto');
        $this->set('categoryId'     , 'office_category_id');

		//駅情報
        $retData2 = $this->Station->getMapDataList();
        $this->set('stationList', $retData2);
    }

    // 工場用XML出力
    private function _actionXmlFactory() {

        $searchCond = array();
        $searchCond['min_lat']               = $this->request->params['min_lat'];
        $searchCond['max_lat']               = $this->request->params['max_lat'];
        $searchCond['min_lng']               = $this->request->params['min_lng'];
        $searchCond['max_lng']               = $this->request->params['max_lng'];

        $typeChecked                         = $this->request->params['typeflg'];
        $searchCond['factory_category_id']   = explode(',', $typeChecked);
        $retData = $this->FactoryBuilding->getMapDataList($searchCond);

        $this->set('buildingList', $retData);
        $this->set('keyNameBuilding', 'FactoryBuilding');
        $this->set('keyNamePhoto'   , 'FactoryPhoto');
        $this->set('categoryId'     , 'factory_category_id');
    }

}
