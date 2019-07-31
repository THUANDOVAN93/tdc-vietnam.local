<?php
App::uses('AppModel', 'Model');
/**
 * OfficeProperty Model
 *
 * @property OfficeBuilding $OfficeBuilding
 * @property OfficeLayout $OfficeLayout
 */
class OfficeProperty extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'office_building_id';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'office_building_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '事務所物件名を選択してください。',
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
            /*'notempty' => array(
                'rule' => array('notempty'),
                'message' => '所在階を入力してください。',
                'required' => true,
                'last' => true,
            ),*/
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
                'last' => true,
            ),
        ),
        'office_layout_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '間取りを選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'office_layout_text' => array(
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
        'office_person_num_id' => array(
            /*'notempty' => array(
                'rule' => array('notempty'),
                'message' => '人数（サービスオフィス）を選択してください。',
                'required' => true,
                'last' => true,
            ),*/
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
        'OfficeBuilding' => array(
            'className'  => 'OfficeBuilding',
            'foreignKey' => 'office_building_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'OfficeLayout' => array(
            'className'  => 'OfficeLayout',
            'foreignKey' => 'office_layout_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );

    public function listSearchConditions($data) {

        $cond = array();

        // 物件ID : 選択
        if (isset($data['OfficeProperty']['office_building_id']) && strlen($data['OfficeProperty']['office_building_id']) > 0) {
            $cond['OfficeProperty.office_building_id'] = $data['OfficeProperty']['office_building_id'];
        }

        // 物件名 : 部分一致
        if (isset($data['OfficeProperty']['name']) && strlen($data['OfficeProperty']['name']) > 0) {
            $cond['OfficeBuilding.name like'] = '%' . $data['OfficeProperty']['name'] . '%';
        }

        // 表示/非表示 : 選択
        if (isset($data['OfficeProperty']['visible']) && strlen($data['OfficeProperty']['visible']) > 0) {
            $cond['OfficeProperty.visible'] = $data['OfficeProperty']['visible'];
        }

        // 貸物件/売物件 : 選択
        if (isset($data['OfficeProperty']['sale_or_rent']) && strlen($data['OfficeProperty']['sale_or_rent']) > 0) {
            $cond['OfficeProperty.sale_or_rent'] = $data['OfficeProperty']['sale_or_rent'];
        }

        $params = array(
            'conditions' => $cond,
            'order' => 'OfficeProperty.modified DESC',
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

	    if( $num > 100000000 ) {
	    	return false;
	    }
	    return true;
	}
}
