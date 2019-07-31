<?php
App::uses('AppModel', 'Model');
/**
 * Station Model
 *
 * @property Line $Line
 */
class Station extends AppModel {

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
        'name' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => '駅名を入力してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule'     => array('maxlength', 64),
                'message'  => '駅名は64文字以内で入力してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
        'line_id' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => '路線名１を入力してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
        'address' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'lat' => array(
            'decimal' => array(
                'rule'     => array('decimal'),
                'message'  => '緯度の入力値が不正です。再度、マップを選択してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
        'lng' => array(
            'decimal' => array(
                'rule'     => array('decimal'),
                'message'  => '経度の入力値が不正です。再度、マップを選択してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
        'map' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => 'マップ画像を選択してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 255),
                'message'  => 'マップ画像のパスが長すぎます。',
                'required' => true,
                'last'     => true,
            ),
        ),
    );

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Line' => array(
            'className'  => 'Line',
            'foreignKey' => 'line_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'Line2' => array(
            'className'  => 'Line',
            'foreignKey' => 'line2_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );

    /* マップ用XML */
    public function getMapDataList() {
		$cond = array();

        $dataList = $this->find('all', array('conditions'=>$cond));

        return $dataList;
    }
}
