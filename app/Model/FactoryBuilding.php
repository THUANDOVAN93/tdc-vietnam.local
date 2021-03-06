<?php
App::uses('AppModel', 'Model');
/**
 * FactoryBuilding Model
 *
 * @property FactoryCategory $FactoryCategory
 * @property Area $Area
 * @property FactoryPhoto $FactoryPhoto
 * @property FactoryTenant $FactoryTenant
 */
class FactoryBuilding extends AppModel {

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
        'factory_category_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '物件種別を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'factory_area_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '工場エリアを選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'プロジェクト名を入力してください。',
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
        /*'boi_zone' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'BOIゾーンを入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),*/
        'giz' => array(
        ),
        'epz' => array(
        ),
        'fz' => array(
        ),
        'industrial_park_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '工業団地内外を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'developer' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'address' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'allowEmpty' => true,
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
        'altitude' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'altitude'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'altitude'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
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
        'develop_area' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'develop_area'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'develop_area'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'from_hochiminh' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'from_hochiminh'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'from_hochiminh'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'from_tansonnhat' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'from_tansonnhat'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'from_tansonnhat'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'from_new_airport' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'from_new_airport'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'from_new_airport'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'from_saigon' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'from_saigon'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'from_saigon'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'from_catlai' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'from_catlai'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'from_catlai'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'from_thivai' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'from_thivai'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'from_thivai'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'from_vungtau' => array(
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,4})?$/i'),
                'message' => '小数点以下4桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('mynumvalue', 'from_vungtau'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'from_vungtau'),
                'message' => '1000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'recommend' => array(
        ),
        'popluar' => array(
        ),
        'newly' => array(
        ),
        'hotel' => array(
        ),
        'apart' => array(
        ),
        'restaurant' => array(
        ),
        'golfpark' => array(
        ),
        'hospital' => array(
        ),
        'shopping_center' => array(
        ),
        'internet' => array(
        ),
        'telephone' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'electricity' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'waterworks' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'sewer' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'reservoir' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        /*'natural_gas' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),*/
        'highway' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'security' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'management_cost' => array(
            /*'numvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,1})?$/i'),
                'message' => '小数点以下1桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                'rule' => array('decimal'),
                'message' => '数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '8'),
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
        'FactoryCategory' => array(
            'className'  => 'FactoryCategory',
            'foreignKey' => 'factory_category_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'FactoryArea' => array(
            'className'  => 'FactoryArea',
            'foreignKey' => 'factory_area_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'FactoryPhoto' => array(
            'className'    => 'FactoryPhoto',
            'foreignKey'   => 'factory_building_id',
            'dependent'    => true,
            'conditions'   => '',
            'fields'       => '',
            'order'        => 'id',
            'limit'        => '',
            'offset'       => '',
            'exclusive'    => '',
            'finderQuery'  => '',
            'counterQuery' => ''
        ),
        'FactoryProperty' => array(
            'className'    => 'FactoryProperty',
            'foreignKey'   => 'factory_building_id',
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
    public $hasAndBelongsToMany = array(
        'FactoryTenant' => array(
            'className'              => 'FactoryTenant',
            'joinTable'              => 'factory_building_factory_tenant',
            'foreignKey'             => 'factory_building_id',
            'associationForeignKey'  => 'factory_tenant_id',
            'unique'                 => true,
            'conditions'             => '',
            'fields'                 => '',
            'order'                  => '',
            'limit'                  => '',
            'offset'                 => '',
            'finderQuery'            => '',
            'deleteQuery'            => '',
            'insertQuery'            => ''
        ),
    );

    public function setNextUpdate($id) {
        $factoryBuilding = $this->findById($id);
        $alertId = $factoryBuilding['FactoryBuilding']['alert_id'];
        $term = Configure::read('AlertTerm.'.$alertId.'.term');
        if (!empty($term)) {
            $saveData = array('FactoryBuilding'=>array('id'=>$id));
            $saveData['FactoryBuilding']['next_update'] = date("Y-m-d H:i:s", time() + $term);
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

    public function setTenant($data) {
        $factoryTenantId = array();
        if (isset($data['FactoryTenant']) && is_array($data['FactoryTenant'])) {
            foreach ($data['FactoryTenant'] as $tenant) {
                array_push($factoryTenantId, $tenant['id']);
            }
        }
        $data['FactoryBuildingFactoryTenant']['factory_tenant_id'] = $factoryTenantId;
        return $data;
    }

    public function listSearchConditions($data) {

        $cond = array();

        // 物件ID : 選択
        if (isset($data['FactoryBuilding']['id']) && strlen($data['FactoryBuilding']['id']) > 0) {
            $cond['FactoryBuilding.id'] = $data['FactoryBuilding']['id'];
        }

        // 物件種別 : 選択
        if (isset($data['FactoryBuilding']['factory_category_id']) && strlen($data['FactoryBuilding']['factory_category_id']) > 0) {
            $cond['FactoryBuilding.factory_category_id'] = $data['FactoryBuilding']['factory_category_id'];
        }

        // 物件名 : 部分一致
        if (isset($data['FactoryBuilding']['name']) && strlen($data['FactoryBuilding']['name']) > 0) {
            $cond['FactoryBuilding.name like'] = '%' . $data['FactoryBuilding']['name'] . '%';
        }

        // 工場エリア : 選択
        if (isset($data['FactoryBuilding']['factory_area_id']) && strlen($data['FactoryBuilding']['factory_area_id']) > 0) {
            $cond['FactoryBuilding.factory_area_id'] = $data['FactoryBuilding']['factory_area_id'];
        }

        // 住所 : 部分一致
        if (isset($data['FactoryBuilding']['address']) && strlen($data['FactoryBuilding']['address']) > 0) {
            $cond['FactoryBuilding.address like'] = '%' . $data['FactoryBuilding']['address'] . '%';
        }

        // 開発業者 : 部分一致
        if (isset($data['FactoryBuilding']['developer']) && strlen($data['FactoryBuilding']['developer']) > 0) {
            $cond['FactoryBuilding.developer like'] = '%' . $data['FactoryBuilding']['developer'] . '%';
        }

        // BOIゾーン : 選択
        if (isset($data['FactoryBuilding']['boi_zone']) && strlen($data['FactoryBuilding']['boi_zone']) > 0) {
            $cond['FactoryBuilding.boi_zone'] = $data['FactoryBuilding']['boi_zone'];
        }

        // 工業団地内外 : 選択
        if (isset($data['FactoryBuilding']['industrial_park_id']) && strlen($data['FactoryBuilding']['industrial_park_id']) > 0) {
            $cond['FactoryBuilding.industrial_park_id'] = $data['FactoryBuilding']['industrial_park_id'];
        }

        // フロント表示 : 選択
        if (isset($data['FactoryBuilding']['visible']) && strlen($data['FactoryBuilding']['visible']) > 0) {
            $cond['FactoryBuilding.visible'] = $data['FactoryBuilding']['visible'];
        }

        // 表示優先度 : 選択
        if (isset($data['FactoryBuilding']['priority']) && strlen($data['FactoryBuilding']['priority']) > 0) {
            $cond['FactoryBuilding.priority'] = $data['FactoryBuilding']['priority'];
        }

        // アイコン : 選択
        if (isset($data['FactoryBuilding']['icon']) && strlen($data['FactoryBuilding']['icon']) > 0) {
            $icon = $data['FactoryBuilding']['icon'];
            $cond['FactoryBuilding.'.$icon] = '1';
        }

        // 追加情報 : 選択
        if (isset($data['FactoryBuilding']['add_information']) && strlen($data['FactoryBuilding']['add_information']) > 0) {
            $addInformationNo = $data['FactoryBuilding']['add_information'];
            $cond['FactoryBuilding.add_information' . $addInformationNo] = '1';
        }

        $params = array(
            'conditions' => $cond,
            'order' => 'FactoryBuilding.modified DESC',
        );

        return $params;
    }

    public function unbindModelAll () {
        $this->unbindModel(array(
            'belongsTo' => array(
                'FactoryCategory',
                'FactoryArea',
            ),
            'hasMany' => array(
                'FactoryPhoto',
                'FactoryProperty',
            ),
            'hasAndBelongsToMany' => array(
                'FactoryTenant',
            ),
        ), false);
    }

    // 一覧画像のみ取得するようにhasManyを追加する
    public function bindModelListPhoto () {
        $this->bindModel(array(
            'hasMany' => array(
                'FactoryPhoto' => array(
                    'conditions' => array(
                        'FactoryPhoto.use_point' => 'LIST'
                    ),
                )
            )
        ), false);
    }

    // メイン画像のみ取得するようにhasManyを追加する
    public function bindModelMainPhoto () {
        $this->bindModel(array(
            'hasMany' => array(
                'FactoryPhoto' => array(
                    'conditions' => array(
                        'FactoryPhoto.use_point' => 'Main'
                    ),
                )
            )
        ), false);
    }

    public function frontListSearchConditions($data) {

        $cond = array();
        $sort = 'FactoryBuilding.modified DESC';
        $limit = '10';

        $factoryPropertyFlag = false;

        //フロント表示
        $cond['FactoryBuilding.visible'] = '1';

        //エリア
        if (isset($data['FactoryBuilding']['factory_area_id']) && strlen($data['FactoryBuilding']['factory_area_id']) > 0) {
            $cond['FactoryBuilding.factory_area_id'] = $data['FactoryBuilding']['factory_area_id'];
        }

        //工業団地内外
        if (isset($data['FactoryBuilding']['industrial_park_id']) && count($data['FactoryBuilding']['industrial_park_id']) > 0) {
            $cond['FactoryBuilding.industrial_park_id'] = $data['FactoryBuilding']['industrial_park_id'];
        }

        //物件タイプ
        if (isset($data['FactoryBuilding']['factory_sub_category_id']) && strlen($data['FactoryBuilding']['factory_sub_category_id']) > 0) {
            $categoryDataList = explode(',', $data['FactoryBuilding']['factory_sub_category_id']);
            $cond['FactoryProperty.factory_sub_category_id'] = $categoryDataList;
            $factoryPropertyFlag = true;
        }

        //ご予算
        if (isset($data['FactoryBuilding']['price']) && strlen($data['FactoryBuilding']['price']) > 0) {
            $priceData = explode('-', $data['FactoryBuilding']['price']);
            $priceDataCount = count($priceData);
            if (isset($data['FactoryBuilding']['factory_sub_category_id']) && in_array($data['FactoryBuilding']['factory_sub_category_id'], array(1,3)) ) {
                if ($priceDataCount == 2) {
                    $cond['FactoryProperty.price BETWEEN ? AND ?'] = array($priceData[0], $priceData[1]);
                } else {
                    $cond['FactoryProperty.price >='] = $data['FactoryBuilding']['price'];
                }
            } elseif (isset($data['FactoryBuilding']['factory_sub_category_id']) && in_array($data['FactoryBuilding']['factory_sub_category_id'], array(2,4)) ) {
                if ($priceDataCount == 2) {
                    $cond['ceil(FactoryProperty.price/FactoryProperty.floor_space*1600) BETWEEN ? AND ?'] = array($priceData[0], $priceData[1]);
                } else {
                    $cond['ceil(FactoryProperty.price/FactoryProperty.floor_space*1600) >='] = $data['FactoryBuilding']['price'];
                }
            } else {
                if ($priceDataCount == 2) {
                    $cond['ceil(FactoryProperty.price/FactoryProperty.site_area) BETWEEN ? AND ?'] = array($priceData[0], $priceData[1]);
                } else {
                    $cond['ceil(FactoryProperty.price/FactoryProperty.site_area) >='] = $data['FactoryBuilding']['price'];
                }
            }
            $factoryPropertyFlag = true;
        }

        //床面積
        if (isset($data['FactoryBuilding']['floor_space']) && strlen($data['FactoryBuilding']['floor_space']) > 0) {
             $floorSpaceData = explode('-', $data['FactoryBuilding']['floor_space']);
             $floorSpaceDataCount = count($floorSpaceData);
             if ($floorSpaceDataCount == 2) {
//                 $cond['FactoryProperty.floor_space BETWEEN ? AND ?'] = array($floorSpaceData[0], $floorSpaceData[1]);
                 $cond['FactoryProperty.floor_space >='] = $floorSpaceData[0];
                 $cond['FactoryProperty.floor_space <'] = $floorSpaceData[1];
             } else {
                 $cond['FactoryProperty.floor_space >='] = $data['FactoryBuilding']['floor_space'];
             }
             $factoryPropertyFlag = true;
        }

        //敷地面積
        if (isset($data['FactoryBuilding']['site_area']) && strlen($data['FactoryBuilding']['site_area']) > 0) {
            $siteAreaData = explode('-', $data['FactoryBuilding']['site_area']);
            $siteAreaDataCount = count($siteAreaData);
            if ($siteAreaDataCount == 2) {
                 $cond['FactoryProperty.site_area BETWEEN ? AND ?'] = array($siteAreaData[0], $siteAreaData[1]);
            } else {
                 $cond['FactoryProperty.site_area >='] = $data['FactoryBuilding']['site_area'];
            }
            $factoryPropertyFlag = true;
        }

        //その他条件
        foreach(Configure::read('Facility.FactoryBuilding') as $key => $val) {
            if (isset($data['FactoryBuilding'][$key])) {
                $cond['FactoryBuilding.' . $key] = '1';
            }
        }

        //並び替え
        if (isset($data['FactoryBuilding']['sort']) && strlen($data['FactoryBuilding']['sort']) > 0) {
            if ($data['FactoryBuilding']['sort'] == 'newly') {
                $sort = 'FactoryBuilding.modified DESC';
            } else if ($data['FactoryBuilding']['sort'] == 'popluar') {
                $sort = 'FactoryBuilding.priority DESC';
            }
        }

        //部屋のフロント表示
        if ($factoryPropertyFlag) {
            $cond['FactoryProperty.visible'] = '1';
        }

        //表示件数
        if (isset($data['FactoryBuilding']['limit']) && strlen($data['FactoryBuilding']['limit']) > 0) {
            $limit = $data['FactoryBuilding']['limit'];
        }

        $params = array(
            'conditions' => $cond,
            'order'      => $sort,
            'limit'      => $limit,
            'group'      => 'FactoryBuilding.id',
        );

        if ($factoryPropertyFlag) {
            $params['joins'] = array(
                array(
                    'type'       => 'LEFT',
                    'table'      => 'factory_properties',
                    'alias'      => 'FactoryProperty',
                    'conditions' => 'FactoryBuilding.id = FactoryProperty.factory_building_id',
                ),
            );
        }

        return $params;
    }

    /* マップ用XML */
    public function getMapDataList($data) {
        $cond = array();

        //フロント表示
        $cond['FactoryBuilding.visible'] = '1';

        // 緯度範囲
        /*if (isset($data['min_lat']) && strlen($data['min_lat']) > 0 && isset($data['max_lat']) && strlen($data['max_lat']) > 0) {
            $cond['FactoryBuilding.lat BETWEEN ? AND ?'] = array($data['min_lat'], $data['max_lat']);
        }*/

        // 経度範囲
        /*if (isset($data['min_lng']) && strlen($data['min_lng']) > 0 && isset($data['max_lng']) && strlen($data['max_lng']) > 0) {
            $cond['FactoryBuilding.lng BETWEEN ? AND ?'] = array($data['min_lng'], $data['max_lng']);
        }*/

        // 物件タイプ
        if (isset($data['factory_category_id']) && count($data['factory_category_id']) > 0) {
            $cond['FactoryBuilding.factory_category_id'] = $data['factory_category_id'];
        }

        $this->unbindModelAll();
        $this->bindModel(array(
            'hasMany' => array(
                'FactoryPhoto' => array(
                    'conditions' => array(
                        'FactoryPhoto.use_point' => 'LIST'
                    ),
                ),
            )
        ));

        $dataList = $this->find('all', array('conditions'=>$cond));

        return $dataList;
    }

    // フロントトップページ表示
    public function getTopIconList($iconKey, $viewSize) {

        $retBuildings = array();
        $cond['FactoryBuilding.visible']        = '1';
        $cond['FactoryBuilding.' . $iconKey]    = '1';
        $buildings = $this->find('all', array(
            'conditions' => $cond,
            'limit'      => 16,
            'order'      => 'modified DESC',
        ));
        $selCount  = 1;
        $detaCount = 1;
        $buildingCount = 1;
        foreach ($buildings as $building) {
            $retBuildings[$selCount][$detaCount]['FactoryBuilding']['id']       = $building['FactoryBuilding']['id'];
            $retBuildings[$selCount][$detaCount]['FactoryBuilding']['name']     = $building['FactoryBuilding']['name'];
            $retBuildings[$selCount][$detaCount]['FactoryBuilding']['newly']    = $building['FactoryBuilding']['newly'];
            if (isset($building['FactoryPhoto'][0]['path'])) {
                $retBuildings[$selCount][$detaCount]['FactoryPhoto']['path']    = $building['FactoryPhoto'][0]['path'];
                $retBuildings[$selCount][$detaCount]['FactoryPhoto']['caption'] = $building['FactoryPhoto'][0]['caption'];
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

	function mynummax( $data, $name ) {
		$num = str_replace( ',', '', $data[$name] );

	    if( $num > 1000000 ) {
	    	return false;
	    }
	    return true;
	}
}
