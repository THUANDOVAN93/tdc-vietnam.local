<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 */
class Area extends AppModel {

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
                'message'  => 'エリア名を入力してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule'     => array('maxlength', 64),
                'message'  => 'エリア名は64文字以内で入力してください。',
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
/*
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
*/
    );
}
