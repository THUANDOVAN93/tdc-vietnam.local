<?php
App::uses('FrontController', 'Controller');

class FrontResidenceController extends FrontController {

    public $name = 'FrontResidence';
    public $uses = array(
        'ResidenceBuilding',
        'ResidenceCategory',
        'ResidenceLayouts',
        'ResidencePhoto',
        'ResidenceProperty',
        'Area',
        'Station',
        'OfficeBuilding',
        'FactoryBuilding',
    );

    // 住まいを探す エリアから探す
    public function area_index() {
        $this->PageRender->render('area_index');
    }
    // 事務所を探す ハノイ探す
    public function area_hanoi() {
        $this->PageRender->render('area_hanoi');
    }

    // 住まいを探す エリアから探す 一覧
    public function area_list() {

        //不要なモデルをはずす
        $this->ResidenceBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->ResidenceBuilding->bindModelListPhoto();

        //エリア情報を取得
        $areaId = $this->params['areaId'];
        $area = $this->Area->findById($areaId);
        if (!$area) {
            $this->redirect('/residence/area/');
        }
        $this->set('area', $area);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontResidenceController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['ResidenceBuilding']['area_id'] = $area['Area']['id'];
            $this->Session->write('FrontResidenceController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->ResidenceBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('residenceBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['ResidenceBuilding']['limit'])) {
            $this->request->data['ResidenceBuilding']['limit'] = '10';
        }
        if (!isset($this->request->data['ResidenceBuilding']['residence_category_id'])) {
            $this->request->data['ResidenceBuilding']['residence_category_id'] = '';
        }

        //検索条件のリスト
        $residenceCategories = $this->ResidenceCategory->find('list');
        $residenceLayouts    = $this->ResidenceLayouts->find('list');
        $this->set(compact('residenceCategories', 'residenceLayouts'));

        //画面表示
        Configure::write('Page.infolist.FrontResidence.area_list.title', sprintf(Configure::read('Page.infolist.FrontResidence.area_list.title'), $area['Area']['name']));
        $this->PageRender->render('area_list');
    }

    // 住まいを探す ハノイで探す 一覧
    public function area_hanoi_list() {

        //不要なモデルをはずす
        $this->ResidenceBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->ResidenceBuilding->bindModelListPhoto();

        //エリア情報を取得
        $areaId = $this->params['areaId'];
        $area = $this->Area->findById($areaId);
        if (!$area) {
            $this->redirect('/residence/area/hanoi/');
        }
        $this->set('area', $area);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontResidenceController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['ResidenceBuilding']['area_id'] = $area['Area']['id'];
            $this->Session->write('FrontResidenceController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->ResidenceBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('residenceBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['ResidenceBuilding']['limit'])) {
            $this->request->data['ResidenceBuilding']['limit'] = '10';
        }
        if (!isset($this->request->data['ResidenceBuilding']['residence_category_id'])) {
            $this->request->data['ResidenceBuilding']['residence_category_id'] = '';
        }

        //検索条件のリスト
        $residenceCategories = $this->ResidenceCategory->find('list');
        $residenceLayouts    = $this->ResidenceLayouts->find('list');
        $this->set(compact('residenceCategories', 'residenceLayouts'));

        //画面表示
        Configure::write('Page.infolist.FrontResidence.area_hanoi_list.title', sprintf(Configure::read('Page.infolist.FrontResidence.area_hanoi_list.title'), $area['Area']['name']));
        $this->PageRender->render('area_hanoi_list');
    }

    //住まいを探す エリアから探す 詳細
    public function area_detail() {

        //物件情報を取得
        $id = $this->params['id'];
        $residenceBuilding = $this->ResidenceBuilding->findByIdAndVisible($id, '1');
        if (!$residenceBuilding) {
            $this->redirect('/residence/area/');
        }

        //部屋データを整形
        $residencePropertyData = array();
        foreach($residenceBuilding['ResidenceProperty'] as $residenceProperty) {
            //フロント非表示
            if ($residenceProperty['visible'] == '0') {
                continue;
            }
            //売り物件と貸し物件で、配列を整形
            $residencePropertyData[$residenceProperty['sale_or_rent']][] = $residenceProperty;
        }
        unset($residenceBuilding['ResidenceProperty']);
        $residenceBuilding['ResidenceProperty'] = $residencePropertyData;

        //画像データを整形
        $residencePhotoData = array();
        foreach($residenceBuilding['ResidencePhoto'] as $residencePhoto) {
            //表示位置ごとに、配列を整形
            $residencePhotoData[$residencePhoto['use_point']][] = $residencePhoto;
        }
        unset($residenceBuilding['ResidencePhoto']);
        $residenceBuilding['ResidencePhoto'] = $residencePhotoData;

        $this->set('residenceBuilding', $residenceBuilding);

        //間取り
        $residenceLayouts    = $this->ResidenceLayouts->find('list');
        $this->set(compact('residenceLayouts'));

        //詳細リンク
        $this->set('detailLink', 'residence/'.$id);

        //画面表示
        Configure::write('Page.infolist.FrontResidence.area_detail.title', sprintf(Configure::read('Page.infolist.FrontResidence.area_detail.title'), $residenceBuilding['ResidenceBuilding']['name']));
        $this->PageRender->render('area_detail');
    }

    // 住まいを探す 駅から探す
    public function station_index() {
        $this->PageRender->render('station_index');
    }

    // 住まいを探す 駅から探す 一覧
    public function station_list() {

        //不要なモデルをはずす
        $this->ResidenceBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->ResidenceBuilding->bindModelListPhoto();

        //駅情報を取得
        $stationId = $this->params['stationId'];
        $station = $this->Station->findById($stationId);
        if (!$station) {
            $this->redirect('/residence/station/');
        }
        $this->set('station', $station);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontResidenceController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['ResidenceBuilding']['station_id'] = $station['Station']['id'];
            $this->Session->write('FrontResidenceController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->ResidenceBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('residenceBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['ResidenceBuilding']['limit'])) {
            $this->request->data['ResidenceBuilding']['limit'] = '10';
        }
        if (!isset($this->request->data['ResidenceBuilding']['residence_category_id'])) {
            $this->request->data['ResidenceBuilding']['residence_category_id'] = '';
        }

        //検索条件のリスト
        $areas = $this->Area->find('list');
        $residenceCategories = $this->ResidenceCategory->find('list');
        $residenceLayouts    = $this->ResidenceLayouts->find('list');
        $this->set(compact('residenceCategories', 'residenceLayouts', 'areas'));

        //画面表示
        Configure::write('Page.infolist.FrontResidence.station_list.title', sprintf(Configure::read('Page.infolist.FrontResidence.station_list.title'), $station['Station']['name']));
        $this->PageRender->render('station_list');
    }

    //住まいを探す 駅から探す 詳細
    public function station_detail() {

        //物件情報を取得
        $id = $this->params['id'];
        $residenceBuilding = $this->ResidenceBuilding->findByIdAndVisible($id, '1');
        if (!$residenceBuilding) {
            $this->redirect('/residence/station/');
        }

        //部屋データを整形
        $residencePropertyData = array();
        foreach($residenceBuilding['ResidenceProperty'] as $residenceProperty) {
            //フロント非表示
            if ($residenceProperty['visible'] == '0') {
                continue;
            }
            //売り物件と貸し物件で、配列を整形
            $residencePropertyData[$residenceProperty['sale_or_rent']][] = $residenceProperty;
        }
        unset($residenceBuilding['ResidenceProperty']);
        $residenceBuilding['ResidenceProperty'] = $residencePropertyData;

        //画像データを整形
        $residencePhotoData = array();
        foreach($residenceBuilding['ResidencePhoto'] as $residencePhoto) {
            //表示位置ごとに、配列を整形
            $residencePhotoData[$residencePhoto['use_point']][] = $residencePhoto;
        }
        unset($residenceBuilding['ResidencePhoto']);
        $residenceBuilding['ResidencePhoto'] = $residencePhotoData;

        $this->set('residenceBuilding', $residenceBuilding);

        //間取り
        $residenceLayouts    = $this->ResidenceLayouts->find('list');
        $this->set(compact('residenceLayouts'));

        //詳細リンク
        $this->set('detailLink', 'residence/'.$id);

        //画面表示
        Configure::write('Page.infolist.FrontResidence.station_detail.title', sprintf(Configure::read('Page.infolist.FrontResidence.station_detail.title'), $residenceBuilding['ResidenceBuilding']['name']));
        $this->PageRender->render('station_detail');
    }
}
