<?php
App::uses('AppModel', 'Model');
/**
 * FactoryProperty Model
 *
 * @property FactoryBuilding $FactoryBuilding
 * @property FactorySubCategory $FactorySubCategory
 */
class FactoryProperty extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'factory_building_id';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'factory_building_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'プロジェクト名を選択してください。',
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
        'factory_sub_category_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '区画種別を選択してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'plot' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'unit' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'allowEmpty' => true,
                'required' => true,
                'last' => true,
            ),
        ),
        'floor_space' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '工場面積を入力してください。',
                'required' => true,
                'last' => true,
            ),
            'decimalvalue' => array(
                //'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,3})?$/i'),
                'rule' => array('mynumvalue', 'floor_space'),
                'message' => '小数点以下3桁までの数値で入力してください。',
                'required' => false,
                'last' => true,
            ),
            'range' => array(
                //'rule' => array('range', 0, 1000000),
                'rule' => array('mynumvalue', 'floor_space'),
                'message' => '100000000未満の数値で入力してください。',
                'required' => false,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'site_area' => array(
            /*'notempty' => array(
                'rule' => array('notempty'),
                'message' => '敷地面積を入力してください。',
                'required' => true,
                'last' => true,
            ),*/
            'decimalvalue' => array(
                //'rule' => array('custom', '/^([1-9]\d*|0)(\.[0-9]{0,3})?$/i'),
                'rule' => array('mynumvalue', 'site_area'),
                'message' => '小数点以下3桁までの数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
            'range' => array(
                //'rule' => array('range', 0, 1000000),
                'rule' => array('mynummax', 'site_area'),
                'message' => '100000000未満の数値で入力してください。',
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
                'rule' => array('mynumvalue', 'price'),
                'message' => '整数値で入力してください。',
                'required' => true,
                'last' => true,
            ),
            'range' => array(
                'rule' => array('mynummax', 'price'),
                'message' => '100000000未満の数値で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'arrangement_plan' => array(
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
        'FactoryBuilding' => array(
            'className'  => 'FactoryBuilding',
            'foreignKey' => 'factory_building_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'FactorySubCategory' => array(
            'className'  => 'FactorySubCategory',
            'foreignKey' => 'factory_sub_category_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );

    public function listSearchConditions($data) {

        $cond = array();

        // 物件ID : 選択
        if (isset($data['FactoryProperty']['factory_building_id']) && strlen($data['FactoryProperty']['factory_building_id']) > 0) {
            $cond['FactoryProperty.factory_building_id'] = $data['FactoryProperty']['factory_building_id'];
        }

        // プロジェクト名 : 部分一致
        if (isset($data['FactoryProperty']['name']) && strlen($data['FactoryProperty']['name']) > 0) {
            $cond['FactoryBuilding.name like'] = '%' . $data['FactoryProperty']['name'] . '%';
        }

        // 売り物件/貸し物件 : 選択
        if (isset($data['FactoryProperty']['factory_sub_category_id']) && strlen($data['FactoryProperty']['factory_sub_category_id']) > 0) {
            $cond['FactoryProperty.factory_sub_category_id'] = $data['FactoryProperty']['factory_sub_category_id'];
        }

        // 表示/非表示 : 選択
        if (isset($data['FactoryProperty']['visible']) && strlen($data['FactoryProperty']['visible']) > 0) {
            $cond['FactoryProperty.visible'] = $data['FactoryProperty']['visible'];
        }

        $params = array(
                'conditions' => $cond,
                'order' => 'FactoryProperty.modified DESC',
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
