<?php
App::uses('AppModel', 'Model');
/**
 * OfficeBuilding Model
 *
 * @property Alert $Alert
 * @property OfficeCategory $OfficeCategory
 * @property Area $Area
 * @property Station1 $Station1
 * @property Station2 $Station2
 * @property Station3 $Station3
 * @property OfficePhoto $OfficePhoto
 */
class OfficeBuilding extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'alert_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '更新頻度を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'priority' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '表示優先度を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'visible' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'フロント表示を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'office_category_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '物件種別を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'area_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'エリアを選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '物件名を入力してください。',
                'required' => true,
                'last' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '住所を入力してください。',
                'required' => true,
                'last' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'map_address' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'lat' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '緯度を入力してください。',
                'required' => true,
                'last' => true,
            ),
            'decimal' => array(
                'rule' => array('decimal'),
                'message' => '数値で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'lng' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '経度を入力してください。',
                'required' => true,
                'last' => true,
            ),
            'decimal' => array(
                'rule' => array('decimal'),
                'message' => '数値で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'station1_id' => array(
            /*'notempty' => array(
                'rule' => array('notempty'),
                'message' => '最寄駅1を選択してください。',
                'required' => true,
                'last' => true,
            ),*/
        ),
        'station2_id' => array(
        ),
        'station3_id' => array(
        ),
        'access' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'complated' => array(
            'numvalue' => array(
                'rule' => array('custom', '/^[1-9][0-9]*$/i'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '4'),
                'message' => '最大4桁で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'height' => array(
            'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,3})?$/i'),
                'message' => '小数点以下3桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('range', 0, 10000),
                'message' => '10000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'total_floor' => array(
            'numvalue' => array(
                'rule' => array('custom', '/^[1-9][0-9]*$/i'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '4'),
                'message' => '最大4桁で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'elevator' => array(
            'numvalue' => array(
                'rule' => array('custom', '/^[1-9][0-9]*$/i'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '4'),
                'message' => '最大4桁で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'lift' => array(
            'numvalue' => array(
                'rule' => array('custom', '/^[1-9][0-9]*$/i'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '4'),
                'message' => '最大4桁で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'description' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'around' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'proprietary' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'nearby' => array(
        ),
        'recommend' => array(
        ),
        'popluar' => array(
        ),
        'newly' => array(
        ),
        'together' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'canteen' => array(
        ),
        'store' => array(
        ),
        'cafe' => array(
        ),
        'shared_pantry' => array(
        ),
        'restaurant' => array(
        ),
        'fitness' => array(
        ),
        'parking' => array(
            'numvalue' => array(
                //'rule' => array('custom', '/^[1-9][0-9]*$/i'),
                'rule' => array('mynumvalue', 'parking'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'maxLength' => array(
                //'rule' => array('maxLength', '8'),
                'rule' => array('mynummax', 'parking'),
                'message' => '最大8桁で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'security' => array(
        ),
        'meeting_room' => array(
        ),
        'internet' => array(
        ),
        'air_conditioner' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'electricity' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'water_supply' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'telephone' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'management_cost' => array(
            'decimalvalue' => array(
                //'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,1})?$/i'),
                'rule' => array('mynumvalue2', 'management_cost'),
                'message' => '小数点以下1桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'maxLength' => array(
                //'rule' => array('maxLength', '10'),
                'rule' => array('mynummax', 'management_cost'),
                'message' => '最大8桁で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'facilities' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
    );

    public $virtualFields = array(
//        'lat'      => 'X(geolocation)',
//        'lng'      => 'Y(geolocation)',
        'unixtime' => 'unix_timestamp(next_update)'
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'OfficeCategory' => array(
            'className'  => 'OfficeCategory',
            'foreignKey' => 'office_category_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'Area' => array(
            'className'  => 'Area',
            'foreignKey' => 'area_id',
            'conditions' => '',
            'fields'     => 'id, name',
            'order'      => ''
        ),
        'Station1' => array(
            'className'  => 'Station',
            'foreignKey' => 'station1_id',
            'conditions' => '',
            'fields'     => 'id, name',
            'order'      => ''
        ),
        'Station2' => array(
            'className'  => 'Station',
            'foreignKey' => 'station2_id',
            'conditions' => '',
            'fields'     => 'id, name',
            'order'      => ''
        ),
        'Station3' => array(
            'className'  => 'Station',
            'foreignKey' => 'station3_id',
            'conditions' => '',
            'fields'     => 'id, name',
            'order'      => ''
        )
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'OfficePhoto' => array(
            'className'    => 'OfficePhoto',
            'foreignKey'   => 'office_building_id',
            'dependent'    => true,
            'conditions'   => '',
            'fields'       => '',
            'order'        => '',
            'limit'        => '',
            'offset'       => '',
            'exclusive'    => '',
            'finderQuery'  => '',
            'counterQuery' => ''
        ),
        'OfficeProperty' => array(
            'className'    => 'OfficeProperty',
            'foreignKey'   => 'office_building_id',
            'dependent'    => true,
            'conditions'   => '',
            'fields'       => '',
            'order'        => '',
            'limit'        => '',
            'offset'       => '',
            'exclusive'    => '',
            'finderQuery'  => '',
            'counterQuery' => ''
        )
    );

    public function setNextUpdate($id) {
        $officeBuilding = $this->findById($id);
        $alertId = $officeBuilding['OfficeBuilding']['alert_id'];
        $term = Configure::read('AlertTerm.'.$alertId.'.term');
        if (!empty($term)) {
            $saveData = array('OfficeBuilding'=>array('id'=>$id));
            $saveData['OfficeBuilding']['next_update'] = date("Y-m-d H:i:s", time() + $term);
            $this->save($saveData, false);
        }
    }

    public function setLatLngDisabled($data) {
        if (isset($data[$this->name]['lat'])) {
            $data[$this->name]['lat_disabled'] = $data[$this->name]['lat'];
        }
        if (isset($data[$this->name]['lng'])) {
            $data[$this->name]['lng_disabled'] = $data[$this->name]['lng'];
        }
        return $data;
    }

    public function listSearchConditions($data) {

        $cond = array();

        // 物件ID : 選択
        if (isset($data['OfficeBuilding']['id']) && strlen($data['OfficeBuilding']['id']) > 0) {
            $cond['OfficeBuilding.id'] = $data['OfficeBuilding']['id'];
        }

        // 物件種別 : 選択
        if (isset($data['OfficeBuilding']['office_category_id']) && strlen($data['OfficeBuilding']['office_category_id']) > 0) {
            $cond['OfficeBuilding.office_category_id'] = $data['OfficeBuilding']['office_category_id'];
        }

        // 物件名 : 部分一致
        if (isset($data['OfficeBuilding']['name']) && strlen($data['OfficeBuilding']['name']) > 0) {
            $cond['OfficeBuilding.name like'] = '%' . $data['OfficeBuilding']['name'] . '%';
        }

        // エリア : 選択
        if (isset($data['OfficeBuilding']['area_id']) && strlen($data['OfficeBuilding']['area_id']) > 0) {
            $cond['OfficeBuilding.area_id'] = $data['OfficeBuilding']['area_id'];
        }

        // 住所 : 部分一致
        if (isset($data['OfficeBuilding']['address']) && strlen($data['OfficeBuilding']['address']) > 0) {
            $cond['OfficeBuilding.address like'] = '%' . $data['OfficeBuilding']['address'] . '%';
        }

        // 最寄駅 : 部分一致
        if (isset($data['OfficeBuilding']['station_id']) && strlen($data['OfficeBuilding']['station_id']) > 0) {
            $tmpCond['OfficeBuilding.station1_id'] = $data['OfficeBuilding']['station_id'];
            $tmpCond['OfficeBuilding.station2_id'] = $data['OfficeBuilding']['station_id'];
            $tmpCond['OfficeBuilding.station3_id'] = $data['OfficeBuilding']['station_id'];
            $cond['or'] = $tmpCond;
        }

        // フロント表示 : 選択
        if (isset($data['OfficeBuilding']['visible']) && strlen($data['OfficeBuilding']['visible']) > 0) {
            $cond['OfficeBuilding.visible'] = $data['OfficeBuilding']['visible'];
        }

        // 表示優先度 : 選択
        if (isset($data['OfficeBuilding']['priority']) && strlen($data['OfficeBuilding']['priority']) > 0) {
            $cond['OfficeBuilding.priority'] = $data['OfficeBuilding']['priority'];
        }

        // アイコン : 選択
        if (isset($data['OfficeBuilding']['icon']) && strlen($data['OfficeBuilding']['icon']) > 0) {
            $icon = $data['OfficeBuilding']['icon'];
            $cond['OfficeBuilding.'.$icon] = '1';
        }

        // 追加情報 : 選択
        if (isset($data['OfficeBuilding']['add_information']) && strlen($data['OfficeBuilding']['add_information']) > 0) {
            $addInformationNo = $data['OfficeBuilding']['add_information'];
            $cond['OfficeBuilding.add_information' . $addInformationNo] = '1';
        }

        $params = array(
            'conditions' => $cond,
            'order' => 'OfficeBuilding.modified DESC',
        );

        return $params;
    }

    public function unbindModelAll () {
        $this->unbindModel(array(
            'belongsTo' => array(
                'OfficeCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'OfficePhoto',
                'OfficeProperty',
            ),
        ), false);
    }

    // 一覧画像のみ取得するようにhasManyを追加する
    public function bindModelListPhoto () {
        $this->bindModel(array(
            'hasMany' => array(
                'OfficePhoto' => array(
                    'conditions' => array(
                        'OfficePhoto.use_point' => 'LIST'
                    ),
                )
            )
        ), false);
    }

    // メイン画像のみ取得するようにhasManyを追加する
    public function bindModelMainPhoto () {
        $this->bindModel(array(
            'hasMany' => array(
                'OfficePhoto' => array(
                    'conditions' => array(
                        'OfficePhoto.use_point' => 'Main'
                    ),
                )
            )
        ), false);
    }

    public function frontListSearchConditions($data) {

        $cond = array();
        $sort = 'OfficeBuilding.modified DESC';
        $limit = '10';

        //フロント表示
        $cond['OfficeBuilding.visible'] = '1';

        //エリア
        if (isset($data['OfficeBuilding']['area_id']) && strlen($data['OfficeBuilding']['area_id']) > 0) {
            $cond['OfficeBuilding.area_id'] = $data['OfficeBuilding']['area_id'];
        }

        //駅
        if (isset($data['OfficeBuilding']['station_id']) && strlen($data['OfficeBuilding']['station_id']) > 0) {
            $stationCond['OfficeBuilding.station1_id'] = $data['OfficeBuilding']['station_id'];
            $stationCond['OfficeBuilding.station2_id'] = $data['OfficeBuilding']['station_id'];
            $stationCond['OfficeBuilding.station3_id'] = $data['OfficeBuilding']['station_id'];
            $cond['or'] = $stationCond;
        }

        //物件タイプ
        if (isset($data['OfficeBuilding']['office_category_id']) && strlen($data['OfficeBuilding']['office_category_id']) > 0) {
            $categoryDataList = explode(',', $data['OfficeBuilding']['office_category_id']);
            $cond['OfficeBuilding.office_category_id'] = $categoryDataList;
        }

        $officePropertyFlag = false;

        //ご予算
        if (isset($data['OfficeBuilding']['price']) && strlen($data['OfficeBuilding']['price']) > 0) {
            $priceData = explode('-', $data['OfficeBuilding']['price']);
            $priceDataCount = count($priceData);
            if ($priceDataCount == 2) {
                $cond['OfficeProperty.price BETWEEN ? AND ?'] = array($priceData[0], $priceData[1]);
            } else {
                $cond['OfficeProperty.price >='] = $data['OfficeBuilding']['price'];
            }
            $officePropertyFlag = true;
        }

        //広さ
        if (isset($data['OfficeBuilding']['floor_space']) && strlen($data['OfficeBuilding']['floor_space']) > 0) {
             $floorSpaceData = explode('-', $data['OfficeBuilding']['floor_space']);
             $floorSpaceDataCount = count($floorSpaceData);
             if ($floorSpaceDataCount == 2) {
//                 $cond['OfficeProperty.floor_space BETWEEN ? AND ?'] = array($floorSpaceData[0], $floorSpaceData[1]);
                 $cond['OfficeProperty.floor_space >='] = $floorSpaceData[0];
                 $cond['OfficeProperty.floor_space <'] = $floorSpaceData[1];
             } else {
                 $cond['OfficeProperty.floor_space >='] = $data['OfficeBuilding']['floor_space'];
             }
             $officePropertyFlag = true;
        }

        //間取り
        if (isset($data['OfficeBuilding']['office_layout_id']) && strlen($data['OfficeBuilding']['office_layout_id']) > 0) {
            $cond['OfficeProperty.office_layout_id'] = $data['OfficeBuilding']['office_layout_id'];
            $officePropertyFlag = true;
        }

        //人数
        if (isset($data['OfficeBuilding']['office_person_num_id']) && strlen($data['OfficeBuilding']['office_person_num_id']) > 0) {
            $cond['OfficeProperty.office_person_num_id'] = $data['OfficeBuilding']['office_person_num_id'];
            $officePropertyFlag = true;
        }

        //その他条件
        foreach(Configure::read('Facility.OfficeBuilding') as $key => $val) {
            if (isset($data['OfficeBuilding'][$key])) {
                $cond['OfficeBuilding.' . $key] = '1';
            }
        }

        //並び替え
        if (isset($data['OfficeBuilding']['sort']) && strlen($data['OfficeBuilding']['sort']) > 0) {
            if ($data['OfficeBuilding']['sort'] == 'newly') {
                $sort = 'OfficeBuilding.modified DESC';
            } else if ($data['OfficeBuilding']['sort'] == 'popluar') {
                $sort = 'OfficeBuilding.priority DESC';
            }
        }

        //部屋のフロント表示
        if ($officePropertyFlag) {
            $cond['OfficeProperty.visible'] = '1';
        }

        //表示件数
        if (isset($data['OfficeBuilding']['limit']) && strlen($data['OfficeBuilding']['limit']) > 0) {
            $limit = $data['OfficeBuilding']['limit'];
        }

        $params = array(
            'conditions' => $cond,
            'order'      => $sort,
            'limit'      => $limit,
            'group'      => 'OfficeBuilding.id',
        );

        if ($officePropertyFlag) {
            $params['joins'] = array(
                array(
                    'type'       => 'LEFT',
                    'table'      => 'office_properties',
                    'alias'      => 'OfficeProperty',
                    'conditions' => 'OfficeBuilding.id = OfficeProperty.office_building_id',
                ),
            );
        }

        return $params;
    }

    /* マップ用XML */
    public function getMapDataList($data) {
        $cond = array();

        //フロント表示
        $cond['OfficeBuilding.visible'] = '1';

        // 緯度範囲
        /*if (isset($data['min_lat']) && strlen($data['min_lat']) > 0 && isset($data['max_lat']) && strlen($data['max_lat']) > 0) {
            $cond['OfficeBuilding.lat BETWEEN ? AND ?'] = array($data['min_lat'], $data['max_lat']);
        }*/

        // 経度範囲
        /*if (isset($data['min_lng']) && strlen($data['min_lng']) > 0 && isset($data['max_lng']) && strlen($data['max_lng']) > 0) {
            $cond['OfficeBuilding.lng BETWEEN ? AND ?'] = array($data['min_lng'], $data['max_lng']);
        }*/

        // 物件タイプ
        if (isset($data['office_category_id']) && count($data['office_category_id']) > 0) {
            $cond['OfficeBuilding.office_category_id'] = $data['office_category_id'];
        }

        $this->unbindModelAll();
        $this->bindModel(array(
            'hasMany' => array(
                'OfficePhoto' => array(
                    'conditions' => array(
                        'OfficePhoto.use_point' => 'LIST'
                    ),
                )
            )
        ));

        $dataList = $this->find('all', array('conditions'=>$cond));

        return $dataList;
    }

    // フロントトップページ表示
    public function getTopIconList($iconKey, $viewSize) {

        $retBuildings = array();
        $cond['OfficeBuilding.visible']        = '1';
        $cond['OfficeBuilding.' . $iconKey]    = '1';
        $buildings = $this->find('all', array(
            'conditions' => $cond,
            'limit'      => 16,
            'order'      => 'modified DESC',
        ));
        $selCount  = 1;
        $detaCount = 1;
        $buildingCount = 1;
        foreach ($buildings as $building) {
            $retBuildings[$selCount][$detaCount]['OfficeBuilding']['id']       = $building['OfficeBuilding']['id'];
            $retBuildings[$selCount][$detaCount]['OfficeBuilding']['name']     = $building['OfficeBuilding']['name'];
            $retBuildings[$selCount][$detaCount]['OfficeBuilding']['newly']    = $building['OfficeBuilding']['newly'];
            if (isset($building['OfficePhoto'][0]['path'])) {
                $retBuildings[$selCount][$detaCount]['OfficePhoto']['path']    = $building['OfficePhoto'][0]['path'];
                $retBuildings[$selCount][$detaCount]['OfficePhoto']['caption'] = $building['OfficePhoto'][0]['caption'];
            }
            if (count($buildings) == $buildingCount) {
                if ($detaCount < $viewSize) {
                    //指定の配列数に満たない場合、空の配列で埋める
                    $retBuildings[$selCount] = array_pad($retBuildings[$selCount], $viewSize, array());
                }
            }
            if ($detaCount == $viewSize) {
                $detaCount = 1;
                $selCount++;
            } else {
                $detaCount++;
            }
            $buildingCount++;
        }

        // 2段レイアウトの場合
        if ($viewSize == 8) {
            $retBuildings = $this->rowSplitTopList($retBuildings);
        }

        return $retBuildings;
    }

    // フロントトップページ表示
    public function rowSplitTopList($buildings) {

        $retBuildings = array();
        foreach ($buildings as $selKey => $selVal) {
            $rowCount = 1;
            $dataCount = 1;
            foreach ($selVal as $detaKey => $detaVal) {
                $retBuildings[$selKey][$rowCount][$detaKey] = $detaVal;
                if ($dataCount == 4) {
                    $dataCount = 1;
                    $rowCount++;
                } else {
                    $dataCount++;
                }
            }
        }

        return $retBuildings;
    }

	function mynumvalue( $data, $name ) {
		$num = str_replace( ',', '', $data[$name] );

	    if( !preg_match("/^[0-9]+$/", $num) ) {
	    	return false;
	    }
	    return true;
	}

	function mynumvalue2( $data, $name ) {
		$num = str_replace( ',', '', $data[$name] );

	    if( !preg_match("/^([1-9]\d*|0)(\.[0-9]{0,1})?$/i", $num) ) {
	    	return false;
	    }
	    return true;
	}

	function mynummax( $data, $name ) {
		$num = str_replace( ',', '', $data[$name] );

	    if( $num > 100000000 ) {
	    	return false;
	    }
	    return true;
	}
}
