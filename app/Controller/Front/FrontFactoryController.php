<?php
App::uses('FrontController', 'Controller');

class FrontFactoryController extends FrontController {

    public $name = 'FrontFactory';
    public $uses = array(
        'FactoryBuilding',
        'FactoryCategory',
        'FactorySubCategory',
        'FactoryTenant',
        'FactoryPhoto',
        'FactoryProperty',
        'FactoryArea',
        'IndustrialPark',
        'ResidenceBuilding',
        'OfficeBuilding',
    );

    // 工場・工業用地を探す エリアから探す
    public function area_index() {
        $this->PageRender->render('area_index');
    }
    // 工場・工業用地を探す 北部エリアから探す
    public function area_north() {
        $this->PageRender->render('area_north');
    }
    // 工場・工業用地を探す 中部エリアから探す
    public function area_central() {
        $this->PageRender->render('area_central');
    }
    // 工場・工業用地を探す 南部エリアから探す
    public function area_south() {
        $this->PageRender->render('area_south');
    }

    // 工場・工業用地を探す 南部エリアから探す
    public function area_south_list() {

        //不要なモデルをはずす
        $this->FactoryBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->FactoryBuilding->bindModelListPhoto();

        //エリア情報を取得
        $factoryAreaId = $this->params['areaId'];
        $factoryArea = $this->FactoryArea->findById($factoryAreaId);
        if (!$factoryArea) {
            $this->redirect('/factory/area/south/');
        }
        $this->set('factoryArea', $factoryArea);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontFactoryController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['FactoryBuilding']['factory_area_id'] = $factoryArea['FactoryArea']['id'];
            $this->Session->write('FrontFactoryController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->FactoryBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('factoryBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['FactoryBuilding']['limit'])) {
            $this->request->data['FactoryBuilding']['limit'] = '10';
        }

        //検索条件のリスト
        $factoryCategories    = $this->FactoryCategory->find('list');
        $factorySubCategories = $this->FactorySubCategory->find('list');
        $factoryTenants       = $this->FactoryTenant->find('list');
        $industrialParks      = $this->IndustrialPark->find('list');

        $this->set(compact('factoryCategories', 'factorySubCategories', 'factoryTenants', 'industrialParks'));

        //画面表示
        Configure::write('Page.infolist.FrontFactory.area_list.title', sprintf(Configure::read('Page.infolist.FrontFactory.area_list.title'), $factoryArea['FactoryArea']['name']));
        $this->PageRender->render('area_south_list');
    }

    // 工場・工業用地を探す 北部エリアから探す
    public function area_north_list() {

        //不要なモデルをはずす
        $this->FactoryBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->FactoryBuilding->bindModelListPhoto();

        //エリア情報を取得
        $factoryAreaId = $this->params['areaId'];
        $factoryArea = $this->FactoryArea->findById($factoryAreaId);
        if (!$factoryArea) {
            $this->redirect('/factory/area/north/');
        }
        $this->set('factoryArea', $factoryArea);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontFactoryController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['FactoryBuilding']['factory_area_id'] = $factoryArea['FactoryArea']['id'];
            $this->Session->write('FrontFactoryController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->FactoryBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('factoryBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['FactoryBuilding']['limit'])) {
            $this->request->data['FactoryBuilding']['limit'] = '10';
        }

        //検索条件のリスト
        $factoryCategories    = $this->FactoryCategory->find('list');
        $factorySubCategories = $this->FactorySubCategory->find('list');
        $factoryTenants       = $this->FactoryTenant->find('list');
        $industrialParks      = $this->IndustrialPark->find('list');

        $this->set(compact('factoryCategories', 'factorySubCategories', 'factoryTenants', 'industrialParks'));

        //画面表示
        Configure::write('Page.infolist.FrontFactory.area_list.title', sprintf(Configure::read('Page.infolist.FrontFactory.area_list.title'), $factoryArea['FactoryArea']['name']));
        $this->PageRender->render('area_north_list');
    }

    // 工場・工業用地を探す 北部エリアから探す
    public function area_central_list() {

        //不要なモデルをはずす
        $this->FactoryBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->FactoryBuilding->bindModelListPhoto();

        //エリア情報を取得
        $factoryAreaId = $this->params['areaId'];
        $factoryArea = $this->FactoryArea->findById($factoryAreaId);
        if (!$factoryArea) {
            $this->redirect('/factory/area/central/');
        }
        $this->set('factoryArea', $factoryArea);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontFactoryController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['FactoryBuilding']['factory_area_id'] = $factoryArea['FactoryArea']['id'];
            $this->Session->write('FrontFactoryController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->FactoryBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('factoryBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['FactoryBuilding']['limit'])) {
            $this->request->data['FactoryBuilding']['limit'] = '10';
        }

        //検索条件のリスト
        $factoryCategories    = $this->FactoryCategory->find('list');
        $factorySubCategories = $this->FactorySubCategory->find('list');
        $factoryTenants       = $this->FactoryTenant->find('list');
        $industrialParks      = $this->IndustrialPark->find('list');

        $this->set(compact('factoryCategories', 'factorySubCategories', 'factoryTenants', 'industrialParks'));

        //画面表示
        Configure::write('Page.infolist.FrontFactory.area_list.title', sprintf(Configure::read('Page.infolist.FrontFactory.area_list.title'), $factoryArea['FactoryArea']['name']));
        $this->PageRender->render('area_central_list');
    }

    // 工場・工業用地を探す エリアから探す 一覧
    public function area_list() {

        //不要なモデルをはずす
        $this->FactoryBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->FactoryBuilding->bindModelListPhoto();

        //エリア情報を取得
        $factoryAreaId = $this->params['areaId'];
        $factoryArea = $this->FactoryArea->findById($factoryAreaId);
        if (!$factoryArea) {
            $this->redirect('/factory/area/');
        }
        $this->set('factoryArea', $factoryArea);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontFactoryController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['FactoryBuilding']['factory_area_id'] = $factoryArea['FactoryArea']['id'];
            $this->Session->write('FrontFactoryController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->FactoryBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('factoryBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['FactoryBuilding']['limit'])) {
            $this->request->data['FactoryBuilding']['limit'] = '10';
        }

        //検索条件のリスト
        $factoryCategories    = $this->FactoryCategory->find('list');
        $factorySubCategories = $this->FactorySubCategory->find('list');
        $factoryTenants       = $this->FactoryTenant->find('list');
        $industrialParks      = $this->IndustrialPark->find('list');

        $this->set(compact('factoryCategories', 'factorySubCategories', 'factoryTenants', 'industrialParks'));

        //画面表示
        Configure::write('Page.infolist.FrontFactory.area_list.title', sprintf(Configure::read('Page.infolist.FrontFactory.area_list.title'), $factoryArea['FactoryArea']['name']));
        $this->PageRender->render('area_list');
    }

    // 工場・工業用地を探す タイ全域の物件一覧から探す 一覧
    public function area_all() {

        //不要なモデルをはずす
        $this->FactoryBuilding->unbindModelAll();
        //一覧画像を取得するようにhasManyを追加
        $this->FactoryBuilding->bindModelListPhoto();

        //エリア情報を取得
        //$factoryAreaId = $this->params['areaId'];
        //$factoryAreaId = 16;
        $factoryArea = $this->FactoryArea->findById($factoryAreaId);
        if (!$factoryArea) {
            //$this->redirect('/factory/area/');
        }
        $this->set('factoryArea', $factoryArea);

        if (isset($this->params['named']['page'])) {
            /* ページング時 */
            //セッションから検索条件を取得
            $listSearchValue = $this->Session->read('FrontFactoryController.ListSearchValue');
            $this->request->data = $listSearchValue;
        } else {
            /* 検索初回時 */
            //検索情報をセッションに保存
            $listSearchValue = $this->request->data;
            $listSearchValue['FactoryBuilding']['factory_area_id'] = $factoryArea['FactoryArea']['id'];
            $this->Session->write('FrontFactoryController.ListSearchValue', $listSearchValue);
        }

        //検索条件の取得
        $params = $this->FactoryBuilding->frontListSearchConditions($listSearchValue);
        $this->paginate = $params;
        $this->set('factoryBuildings', $this->paginate());

        //検索条件の初期値を設定
        if (!isset($this->request->data['FactoryBuilding']['limit'])) {
            $this->request->data['FactoryBuilding']['limit'] = '10';
        }

        //検索条件のリスト
        $factoryCategories    = $this->FactoryCategory->find('list');
        $factorySubCategories = $this->FactorySubCategory->find('list');
        $factoryTenants       = $this->FactoryTenant->find('list');
        $industrialParks      = $this->IndustrialPark->find('list');

        $this->set(compact('factoryCategories', 'factorySubCategories', 'factoryTenants', 'industrialParks'));

        //画面表示
        Configure::write('Page.infolist.FrontFactory.area_all.title', sprintf(Configure::read('Page.infolist.FrontFactory.area_all.title'), $factoryArea['FactoryArea']['name']));
        $this->PageRender->render('area_all');
    }

    //工場・工業用地を探す エリアから探す 詳細
    public function area_detail() {

        //物件情報を取得
        $id = $this->params['id'];
        $factoryBuilding = $this->FactoryBuilding->findByIdAndVisible($id, '1');
        if (!$factoryBuilding) {
            $this->redirect('/factory/area/');
        }

        //部屋データを整形
        $factoryPropertyData = array();
        foreach($factoryBuilding['FactoryProperty'] as $factoryProperty) {
            //フロント非表示
            if ($factoryProperty['visible'] == '0') {
                continue;
            }
            //売り物件と貸し物件で、配列を整形
            $factoryPropertyData[$factoryProperty['factory_sub_category_id']][] = $factoryProperty;
        }
        unset($factoryBuilding['FactoryProperty']);
        $factoryBuilding['FactoryProperty'] = $factoryPropertyData;

        //画像データを整形
        $factoryPhotoData = array();
        foreach($factoryBuilding['FactoryPhoto'] as $factoryPhoto) {
            //表示位置ごとに、配列を整形
            $factoryPhotoData[$factoryPhoto['use_point']][] = $factoryPhoto;
        }
        unset($factoryBuilding['FactoryPhoto']);
        $factoryBuilding['FactoryPhoto'] = $factoryPhotoData;
        $this->set('factoryBuilding', $factoryBuilding);


        $factoryCategories    = $this->FactoryCategory->find('list');
        $factorySubCategories = $this->FactorySubCategory->find('list');
        $factoryTenants       = $this->FactoryTenant->find('list');
        $industrialParks      = $this->IndustrialPark->find('list');

        $this->set(compact('factoryCategories', 'factorySubCategories', 'factoryTenants', 'industrialParks'));

        //詳細リンク
        $this->set('detailLink', 'factory/'.$id);

        //画面表示
        Configure::write('Page.infolist.FrontFactory.area_detail.title', sprintf(Configure::read('Page.infolist.FrontFactory.area_detail.title'), $factoryBuilding['FactoryBuilding']['name']));
        $this->PageRender->render('area_detail');
    }
}
