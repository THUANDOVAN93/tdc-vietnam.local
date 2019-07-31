<?php
App::uses('FrontController', 'Controller');

class FrontOfficeController extends FrontController {

    public $name = 'FrontOffice';
    public $uses = array(
        'OfficeBuilding',
        'OfficeCategory',
        'OfficeLayout',
        'OfficePhoto',
        'OfficeProperty',
        'OfficePersonNum',
        'Area',
        'Station',
        'FactoryBuilding',
        'ResidenceBuilding',
    );

    // 事務所を探す エリアから探す
    public function area_index() {
        $this->PageRender->render('area_index');
    }
    // 事務所を探す ハノイ探す
    public function area_hanoi() {
        $this->PageRender->render('area_hanoi');
    }

    // 事務所を探す エリアから探す 一覧
    public function area_list() {

        //不要なモデルをはずす
        $this->OfficeBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->OfficeBuilding->bindModelListPhoto();

        //エリア情報を取得
        $areaId = $this->params['areaId'];
        $area = $this->Area->findById($areaId);
        if (!$area) {
            $this->redirect('/office/area/');
        }
        $this->set('area', $area);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontOfficeController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['OfficeBuilding']['area_id'] = $area['Area']['id'];
            $this->Session->write('FrontOfficeController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->OfficeBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('officeBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['OfficeBuilding']['limit'])) {
            $this->request->data['OfficeBuilding']['limit'] = '10';
        }

        //検索条件のリスト
        $officeCategories = $this->OfficeCategory->find('list');
        $officeLayouts    = $this->OfficeLayout->find('list');
        $officePersonNums = $this->OfficePersonNum->find('list');
        $this->set(compact('officeCategories', 'officeLayouts', 'officePersonNums'));

        //画面表示
        Configure::write('Page.infolist.FrontOffice.area_list.title', sprintf(Configure::read('Page.infolist.FrontOffice.area_list.title'), $area['Area']['name']));
        $this->PageRender->render('area_list');
    }

    // 事務所をハノイで探す エリアから探す 一覧
    public function area_hanoi_list() {

        //不要なモデルをはずす
        $this->OfficeBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->OfficeBuilding->bindModelListPhoto();

        //エリア情報を取得
        $areaId = $this->params['areaId'];
        $area = $this->Area->findById($areaId);
        if (!$area) {
            $this->redirect('/office/area/hanoi/');
        }
        $this->set('area', $area);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontOfficeController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['OfficeBuilding']['area_id'] = $area['Area']['id'];
            $this->Session->write('FrontOfficeController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->OfficeBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('officeBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['OfficeBuilding']['limit'])) {
            $this->request->data['OfficeBuilding']['limit'] = '10';
        }

        //検索条件のリスト
        $officeCategories = $this->OfficeCategory->find('list');
        $officeLayouts    = $this->OfficeLayout->find('list');
        $officePersonNums = $this->OfficePersonNum->find('list');
        $this->set(compact('officeCategories', 'officeLayouts', 'officePersonNums'));

        //画面表示
        Configure::write('Page.infolist.FrontOffice.area_hanoi_list.title', sprintf(Configure::read('Page.infolist.FrontOffice.area_hanoi_list.title'), $area['Area']['name']));
        $this->PageRender->render('area_hanoi_list');
    }

    //事務所を探す エリアから探す 詳細
    public function area_detail() {

        //物件情報を取得
        $id = $this->params['id'];
        $officeBuilding = $this->OfficeBuilding->findByIdAndVisible($id, '1');
        if (!$officeBuilding) {
            $this->redirect('/office/area/');
        }

        //部屋データを整形
        $officePropertyData = array();
        foreach($officeBuilding['OfficeProperty'] as $officeProperty) {
            //フロント非表示
            if ($officeProperty['visible'] == '0') {
                continue;
            }
            //売り物件と貸し物件で、配列を整形
            $officePropertyData[$officeProperty['sale_or_rent']][] = $officeProperty;
        }
        unset($officeBuilding['OfficeProperty']);
        $officeBuilding['OfficeProperty'] = $officePropertyData;

        //画像データを整形
        $officePhotoData = array();
        foreach($officeBuilding['OfficePhoto'] as $officePhoto) {
            //表示位置ごとに、配列を整形
            $officePhotoData[$officePhoto['use_point']][] = $officePhoto;
        }
        unset($officeBuilding['OfficePhoto']);
        $officeBuilding['OfficePhoto'] = $officePhotoData;
        $this->set('officeBuilding', $officeBuilding);

        //間取り
        $officeLayouts    = $this->OfficeLayout->find('list');
        $this->set(compact('officeLayouts'));

        //詳細リンク
        $this->set('detailLink', 'office/'.$id);

        //画面表示
        Configure::write('Page.infolist.FrontOffice.area_detail.title', sprintf(Configure::read('Page.infolist.FrontOffice.area_detail.title'), $officeBuilding['OfficeBuilding']['name']));
        $this->PageRender->render('area_detail');
    }

    // 事務所を探す 駅から探す
    public function station_index() {
        $this->PageRender->render('station_index');
    }

    // 事務所を探す 駅から探す 一覧
    public function station_list() {

        //不要なモデルをはずす
        $this->OfficeBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->OfficeBuilding->bindModelListPhoto();

        //駅情報を取得
        $stationId = $this->params['stationId'];
        $station = $this->Station->findById($stationId);
        if (!$station) {
            $this->redirect('/office/station/');
        }
        $this->set('station', $station);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontOfficeController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['OfficeBuilding']['station_id'] = $station['Station']['id'];
            $this->Session->write('FrontOfficeController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->OfficeBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('officeBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['OfficeBuilding']['limit'])) {
            $this->request->data['OfficeBuilding']['limit'] = '10';
        }
        if (!isset($this->request->data['OfficeBuilding']['office_category_id'])) {
            $this->request->data['OfficeBuilding']['office_category_id'] = '';
        }

        //検索条件のリスト
        $areas = $this->Area->find('list');
        $officeCategories = $this->OfficeCategory->find('list');
        $officeLayouts    = $this->OfficeLayout->find('list');
        $officePersonNums = $this->OfficePersonNum->find('list');
        $this->set(compact('areas', 'officeCategories', 'officeLayouts', 'officePersonNums'));

        //画面表示
        Configure::write('Page.infolist.FrontOffice.station_list.title', sprintf(Configure::read('Page.infolist.FrontOffice.station_list.title'), $station['Station']['name']));
        $this->PageRender->render('station_list');
    }

    //事務所を探す 駅から探す 詳細
    public function station_detail() {

        //物件情報を取得
        $id = $this->params['id'];
        $officeBuilding = $this->OfficeBuilding->findByIdAndVisible($id, '1');
        if (!$officeBuilding) {
            $this->redirect('/office/station/');
        }

        //部屋データを整形
        $officePropertyData = array();
        foreach($officeBuilding['OfficeProperty'] as $officeProperty) {
            //フロント非表示
            if ($officeProperty['visible'] == '0') {
                continue;
            }
            //売り物件と貸し物件で、配列を整形
            $officePropertyData[$officeProperty['sale_or_rent']][] = $officeProperty;
        }
        unset($officeBuilding['OfficeProperty']);
        $officeBuilding['OfficeProperty'] = $officePropertyData;

        //画像データを整形
        $officePhotoData = array();
        foreach($officeBuilding['OfficePhoto'] as $officePhoto) {
            //表示位置ごとに、配列を整形
            $officePhotoData[$officePhoto['use_point']][] = $officePhoto;
        }
        unset($officeBuilding['OfficePhoto']);
        $officeBuilding['OfficePhoto'] = $officePhotoData;

        $this->set('officeBuilding', $officeBuilding);

        //間取り
        $officeLayouts    = $this->OfficeLayout->find('list');
        $this->set(compact('officeLayouts'));

        //詳細リンク
        $this->set('detailLink', 'office/'.$id);

        //画面表示
        Configure::write('Page.infolist.FrontOffice.station_detail.title', sprintf(Configure::read('Page.infolist.FrontOffice.station_detail.title'), $officeBuilding['OfficeBuilding']['name']));
        $this->PageRender->render('station_detail');
    }
}
