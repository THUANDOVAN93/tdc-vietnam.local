<?php
App::uses('AppModel', 'Model');
/**
 * ResidenceProperty Model
 *
 * @property ResidenceBuilding $ResidenceBuilding
 * @property ResidenceLayout $ResidenceLayout
 */
class ResidenceProperty extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'residence_building_id';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'residence_building_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '住居物件名を選択してください。',
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
        'sale_or_rent' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '売り物件/貸し物件を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'floor' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '所在階を入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
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
        'residence_layout_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '間取りを選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'residence_layout_text' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'floor_space' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '床面積を入力してください。',
                'required' => true,
                'last' => true,
            ),
            /*'decimalvalue' => array(
                'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,3})?$/i'),
                'message' => '小数点以下3桁までの数値で入力してください。',
                'required' => true,
                'last' => true,
            ),*/
            'numvalue' => array(
                //'rule' => array('custom', '/^[1-9][0-9]*$/i'),
                'rule' => array('mynumvalue', 'floor_space'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'last' => true,
            ),
            'range' => array(
                //'rule' => array('range', 0, 10000),
                'rule' => array('mynummax', 'floor_space'),
                'message' => '10000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'price' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '価格を入力してください。',
                'required' => true,
                'last' => true,
            ),
            'numvalue' => array(
                //'rule' => array('custom', '/^[1-9][0-9]*$/i'),
                'rule' => array('mynumvalue', 'price'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'last' => true,
            ),
            'maxLength' => array(
                //'rule' => array('maxLength', '8'),
                'rule' => array('mynummax', 'price'),
                'message' => '最大8桁で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'drowing' => array(
        ),
        'note' => array(
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'ResidenceBuilding' => array(
            'className'  => 'ResidenceBuilding',
            'foreignKey' => 'residence_building_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'ResidenceLayout' => array(
            'className'  => 'ResidenceLayout',
            'foreignKey' => 'residence_layout_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );

    public function listSearchConditions($data) {

        $cond = array();

        // 物件ID : 選択
        if (isset($data['ResidenceProperty']['residence_building_id']) && strlen($data['ResidenceProperty']['residence_building_id']) > 0) {
            $cond['ResidenceProperty.residence_building_id'] = $data['ResidenceProperty']['residence_building_id'];
        }

        // 物件名 : 部分一致
        if (isset($data['ResidenceProperty']['name']) && strlen($data['ResidenceProperty']['name']) > 0) {
            $cond['ResidenceBuilding.name like'] = '%' . $data['ResidenceProperty']['name'] . '%';
        }

        // 表示/非表示 : 選択
        if (isset($data['ResidenceProperty']['visible']) && strlen($data['ResidenceProperty']['visible']) > 0) {
            $cond['ResidenceProperty.visible'] = $data['ResidenceProperty']['visible'];
        }

        // 売り物件/貸し物件 : 選択
        if (isset($data['ResidenceProperty']['sale_or_rent']) && strlen($data['ResidenceProperty']['sale_or_rent']) > 0) {
            $cond['ResidenceProperty.sale_or_rent'] = $data['ResidenceProperty']['sale_or_rent'];
        }

        $params = array(
            'conditions' => $cond,
            'order' => 'ResidenceProperty.modified DESC',
        );

        return $params;
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
