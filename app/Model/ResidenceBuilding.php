<?php
App::uses('AppModel', 'Model');
/**
 * ResidenceBuilding Model
 *
 * @property ResidenceCategory $ResidenceCategory
 * @property Area $Area
 * @property ResidencePhoto $ResidencePhoto
 */
class ResidenceBuilding extends AppModel {

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
        'residence_category_id' => array(
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
        'total_room' => array(
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
        'nearby' => array(
        ),
        'recommend' => array(
        ),
        'popluar' => array(
        ),
        'newly' => array(
        ),
        'pool' => array(
        ),
        'gym' => array(
        ),
        'sauna' => array(
        ),
        'tennis_court' => array(
        ),
        'children_playground' => array(
        ),
        'laundry' => array(
        ),
        'store' => array(
        ),
        'kitchen' => array(
        ),
        'washer' => array(
        ),
        'maid_room' => array(
        ),
        'keep_pet' => array(
        ),
        'security' => array(
        ),
        'parking' => array(
        ),
        'internet' => array(
        ),
        'satellite_broadcasting' => array(
        ),
        'service' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'electricity' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'water_supply' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'telephone' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'cookstove' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
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
        'ResidenceCategory' => array(
            'className'  => 'ResidenceCategory',
            'foreignKey' => 'residence_category_id',
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
        'ResidencePhoto' => array(
            'className'    => 'ResidencePhoto',
            'foreignKey'   => 'residence_building_id',
            'dependent'    => true,
            'conditions'   => '',
            'fields'       => '',
            'order'        => 'id',
            'limit'        => '11',
            'offset'       => '',
            'exclusive'    => '',
            'finderQuery'  => '',
            'counterQuery' => ''
        ),
        'ResidenceProperty' => array(
            'className'    => 'ResidenceProperty',
            'foreignKey'   => 'residence_building_id',
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
        $residenceBuilding = $this->findById($id);
        $alertId = $residenceBuilding['ResidenceBuilding']['alert_id'];
        $term = Configure::read('AlertTerm.'.$alertId.'.term');
        if (!empty($term)) {
            $saveData = array('ResidenceBuilding'=>array('id'=>$id));
            $saveData['ResidenceBuilding']['next_update'] = date("Y-m-d H:i:s", time() + $term);
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
        if (isset($data['ResidenceBuilding']['id']) && strlen($data['ResidenceBuilding']['id']) > 0) {
            $cond['ResidenceBuilding.id'] = $data['ResidenceBuilding']['id'];
        }

        // 物件種別 : 選択
        if (isset($data['ResidenceBuilding']['residence_category_id']) && strlen($data['ResidenceBuilding']['residence_category_id']) > 0) {
            $cond['ResidenceBuilding.residence_category_id'] = $data['ResidenceBuilding']['residence_category_id'];
        }

        // 物件名 : 部分一致
        if (isset($data['ResidenceBuilding']['name']) && strlen($data['ResidenceBuilding']['name']) > 0) {
            $cond['ResidenceBuilding.name like'] = '%' . $data['ResidenceBuilding']['name'] . '%';
        }

        // エリア : 選択
        if (isset($data['ResidenceBuilding']['area_id']) && strlen($data['ResidenceBuilding']['area_id']) > 0) {
            $cond['ResidenceBuilding.area_id'] = $data['ResidenceBuilding']['area_id'];
        }

        // 住所 : 部分一致
        if (isset($data['ResidenceBuilding']['address']) && strlen($data['ResidenceBuilding']['address']) > 0) {
            $cond['ResidenceBuilding.address like'] = '%' . $data['ResidenceBuilding']['address'] . '%';
        }

        // 最寄駅 : 部分一致
        if (isset($data['ResidenceBuilding']['station_id']) && strlen($data['ResidenceBuilding']['station_id']) > 0) {
            $tmpCond['ResidenceBuilding.station1_id'] = $data['ResidenceBuilding']['station_id'];
            $tmpCond['ResidenceBuilding.station2_id'] = $data['ResidenceBuilding']['station_id'];
            $tmpCond['ResidenceBuilding.station3_id'] = $data['ResidenceBuilding']['station_id'];
            $cond['or'] = $tmpCond;
        }

        // フロント表示 : 選択
        if (isset($data['ResidenceBuilding']['visible']) && strlen($data['ResidenceBuilding']['visible']) > 0) {
            $cond['ResidenceBuilding.visible'] = $data['ResidenceBuilding']['visible'];
        }

        // 表示優先度 : 選択
        if (isset($data['ResidenceBuilding']['priority']) && strlen($data['ResidenceBuilding']['priority']) > 0) {
            $cond['ResidenceBuilding.priority'] = $data['ResidenceBuilding']['priority'];
        }

        // アイコン : 選択
        if (isset($data['ResidenceBuilding']['icon']) && strlen($data['ResidenceBuilding']['icon']) > 0) {
            $icon = $data['ResidenceBuilding']['icon'];
            $cond['ResidenceBuilding.'.$icon] = '1';
        }

        // 追加情報 : 選択
        if (isset($data['ResidenceBuilding']['add_information']) && strlen($data['ResidenceBuilding']['add_information']) > 0) {
            $addInformationNo = $data['ResidenceBuilding']['add_information'];
            $cond['ResidenceBuilding.add_information' . $addInformationNo] = '1';
        }

        $params = array(
            'conditions' => $cond,
            'order' => 'ResidenceBuilding.modified DESC',
        );

        return $params;
    }

    public function unbindModelAll () {
        $this->unbindModel(array(
            'belongsTo' => array(
                'ResidenceCategory',
                'Area',
                'Station1',
                'Station2',
                'Station3',
            ),
            'hasMany' => array(
                'ResidencePhoto',
                'ResidenceProperty',
            ),
        ), false);
    }

    /** ------------------------------------------------------------------------
     * フロント用ファンクション
     * ---------------------------------------------------------------------- */

    public function frontListSearchConditions($data) {

        $cond = array();
        $sort = 'ResidenceBuilding.modified DESC';
        $limit = '10';

        //フロント表示
        $cond['ResidenceBuilding.visible'] = '1';

        //エリア
        if (isset($data['ResidenceBuilding']['area_id']) && strlen($data['ResidenceBuilding']['area_id']) > 0) {
            $cond['ResidenceBuilding.area_id'] = $data['ResidenceBuilding']['area_id'];
        }

        //駅
        if (isset($data['ResidenceBuilding']['station_id']) && strlen($data['ResidenceBuilding']['station_id']) > 0) {
            $stationCond['ResidenceBuilding.station1_id'] = $data['ResidenceBuilding']['station_id'];
            $stationCond['ResidenceBuilding.station2_id'] = $data['ResidenceBuilding']['station_id'];
            $stationCond['ResidenceBuilding.station3_id'] = $data['ResidenceBuilding']['station_id'];
            $cond['or'] = $stationCond;
        }

        //物件タイプ
        if (isset($data['ResidenceBuilding']['residence_category_id']) && strlen($data['ResidenceBuilding']['residence_category_id']) > 0) {
            $cond['ResidenceBuilding.residence_category_id'] = $data['ResidenceBuilding']['residence_category_id'];
        }

        $residencePropertyFlag = false;

        //ご予算
        if (isset($data['ResidenceBuilding']['price']) && strlen($data['ResidenceBuilding']['price']) > 0) {
            $priceData = explode('-', $data['ResidenceBuilding']['price']);
            $priceDataCount = count($priceData);
            if ($priceDataCount == 2) {
                $cond['ResidenceProperty.price BETWEEN ? AND ?'] = array($priceData[0], $priceData[1]);
            } else {
                $cond['ResidenceProperty.price >='] = $data['ResidenceBuilding']['price'];
            }
            $residencePropertyFlag = true;
        }

        //広さ
        if (isset($data['ResidenceBuilding']['floor_space']) && strlen($data['ResidenceBuilding']['floor_space']) > 0) {
             $floorSpaceData = explode('-', $data['ResidenceBuilding']['floor_space']);
             $floorSpaceDataCount = count($floorSpaceData);
             if ($floorSpaceDataCount == 2) {
//                 $cond['ResidenceProperty.floor_space BETWEEN ? AND ?'] = array($floorSpaceData[0], $floorSpaceData[1]);
                 $cond['ResidenceProperty.floor_space >='] = $floorSpaceData[0];
                 $cond['ResidenceProperty.floor_space <'] = $floorSpaceData[1];
             } else {
                 $cond['ResidenceProperty.floor_space >='] = $data['ResidenceBuilding']['floor_space'];
             }
             $residencePropertyFlag = true;
        }

        //間取り
        if (isset($data['ResidenceBuilding']['residence_layout_id']) && count($data['ResidenceBuilding']['residence_layout_id']) > 0) {
            $cond['ResidenceProperty.residence_layout_id'] = $data['ResidenceBuilding']['residence_layout_id'];
            $residencePropertyFlag = true;
        }

        //その他条件
        foreach(Configure::read('Facility.Residence') as $key => $val) {
            if (isset($data['ResidenceBuilding'][$key])) {
                $cond['ResidenceBuilding.' . $key] = '1';
            }
        }

        //並び替え
        if (isset($data['ResidenceBuilding']['sort']) && strlen($data['ResidenceBuilding']['sort']) > 0) {
            if ($data['ResidenceBuilding']['sort'] == 'newly') {
                $sort = 'ResidenceBuilding.modified DESC';
            } else if ($data['ResidenceBuilding']['sort'] == 'popluar') {
                $sort = 'ResidenceBuilding.priority DESC';
            }
        }

        //部屋のフロント表示
        if ($residencePropertyFlag) {
            $cond['ResidenceProperty.visible'] = '1';
        }

        //表示件数
        if (isset($data['ResidenceBuilding']['limit']) && strlen($data['ResidenceBuilding']['limit']) > 0) {
            $limit = $data['ResidenceBuilding']['limit'];
        }

        $params = array(
            'conditions' => $cond,
            'order'      => $sort,
            'limit'      => $limit,
            'group'      => 'ResidenceBuilding.id',
        );

        if ($residencePropertyFlag) {
            $params['joins'] = array(
                array(
                    'type'       => 'LEFT',
                    'table'      => 'residence_properties',
                    'alias'      => 'ResidenceProperty',
                    'conditions' => 'ResidenceBuilding.id = ResidenceProperty.residence_building_id',
                ),
            );
        }

        return $params;
    }

    /* マップ用XML */
    public function getMapDataList($data) {
        $cond = array();

        //フロント表示
        $cond['ResidenceBuilding.visible'] = '1';

        // 緯度範囲
        /*if (isset($data['min_lat']) && strlen($data['min_lat']) > 0 && isset($data['max_lat']) && strlen($data['max_lat']) > 0) {
            $cond['ResidenceBuilding.lat BETWEEN ? AND ?'] = array($data['min_lat'], $data['max_lat']);
        }*/

        // 経度範囲
        /*if (isset($data['min_lng']) && strlen($data['min_lng']) > 0 && isset($data['max_lng']) && strlen($data['max_lng']) > 0) {
            $cond['ResidenceBuilding.lng BETWEEN ? AND ?'] = array($data['min_lng'], $data['max_lng']);
        }*/

        // 物件タイプ
        if (isset($data['residence_category_id']) && count($data['residence_category_id']) > 0) {
            $cond['ResidenceBuilding.residence_category_id'] = $data['residence_category_id'];
        }

        $this->unbindModelAll();
        $this->bindModel(array(
            'hasMany' => array(
                'ResidencePhoto' => array(
                    'conditions' => array(
                        'ResidencePhoto.use_point' => 'LIST'
                    ),
//                    'limit' => 1, // 無いほうが処理が軽いっぽい？
                )
            )
        ));

        $dataList = $this->find('all', array('conditions'=>$cond));

        return $dataList;
    }

    // 一覧画像のみ取得するようにhasManyを追加する
    public function bindModelListPhoto () {
        $this->bindModel(array(
            'hasMany' => array(
                'ResidencePhoto' => array(
                    'conditions' => array(
                        'ResidencePhoto.use_point' => 'LIST'
                    ),
                )
            )
        ), false);
    }

    // メイン画像のみ取得するようにhasManyを追加する
    public function bindModelMainPhoto () {
        $this->bindModel(array(
            'hasMany' => array(
                'ResidencePhoto' => array(
                    'conditions' => array(
                        'ResidencePhoto.use_point' => 'Main'
                    ),
                )
            )
        ), false);
    }

    // フロントトップページ表示
    public function getTopIconList($iconKey, $viewSize) {

        $retBuildings = array();
        $cond['ResidenceBuilding.visible']        = '1';
        $cond['ResidenceBuilding.' . $iconKey]    = '1';
        $buildings = $this->find('all', array(
            'conditions' => $cond,
            'limit'      => 16,
            'order'      => 'modified DESC',
        ));
        $selCount  = 1;
        $detaCount = 1;
        $buildingCount = 1;
        foreach ($buildings as $building) {
            $retBuildings[$selCount][$detaCount]['ResidenceBuilding']['id']       = $building['ResidenceBuilding']['id'];
            $retBuildings[$selCount][$detaCount]['ResidenceBuilding']['name']     = $building['ResidenceBuilding']['name'];
            $retBuildings[$selCount][$detaCount]['ResidenceBuilding']['newly']    = $building['ResidenceBuilding']['newly'];
            if (isset($building['ResidencePhoto'][0]['path'])) {
                $retBuildings[$selCount][$detaCount]['ResidencePhoto']['path']    = $building['ResidencePhoto'][0]['path'];
                $retBuildings[$selCount][$detaCount]['ResidencePhoto']['caption'] = $building['ResidencePhoto'][0]['caption'];
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
