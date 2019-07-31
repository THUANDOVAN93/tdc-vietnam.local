<?php
App::uses('AppModel', 'Model');
/**
 * ContactResidence Model
 *
 */
class ContactResidence extends AppModel {

	public $useTable = false;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'buildings_name' => array(
		),
		'company_name' => array(
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => '会社名を正しく入力してください。',
            ),
		),
		'name' => array(
			'notempty' => array(
				'rule'     => array('notempty'),
				'message'  => 'お名前は省略できません。',
				'required' => true,
				'last'     => true,
			),
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => 'お名前を正しく入力してください。',
            ),
		),
		'tel' => array(
			'notempty' => array(
				'rule'     => array('notempty'),
				'message'  => '電話番号は省略できません。',
				'required' => true,
				'last'     => true,
			),
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => '電話番号を正しく入力してください。',
            ),
		),
		'mobile' => array(
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => '携帯電話を正しく入力してください。',
            ),
		),
		'family_structure' => array(
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => '家族構成を正しく入力してください。',
            ),
		),
		'budget' => array(
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => 'ご予算を正しく入力してください。',
            ),
		),
		'area' => array(
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => 'エリアを正しく入力してください。',
            ),
		),
		'layout' => array(
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => '間取りを正しく入力してください。',
            ),
		),
		'message' => array(
			array(
                'rule'     => array('inpJpnCheck'),
				'message' => 'お問い合わせ内容は日本語で入力してください。',
				'allowEmpty' => true,
			),
		),
		'email' => array(
			'notempty' => array(
				'rule'     => array('notempty'),
				'message'  => 'E-mailは省略できません。',
				'required' => true,
				'last'     => true,
			),
			'emailvalue' => array(
				//'rule' => array('custom', '/^(.*)@(.*)\.(.*)$/i'),
				'rule' => array('custom', "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/"),
				'message' => 'E-mailを正しく入力してください。',
				'required' => true,
				'allowEmpty' => true,
				'last' => true,
			),
		),
	);

	public function inpStringCheck( $check, $str = '') {
        $value = array_values( $check );
        $value = $value[0];

		if ( empty( $str ) ) return true;
        if( strpos( $value, $str ) !== false ) return false;

        return true;
    }

	public function inpJpnCheck( $check ) {
        $value = array_values( $check );
        $value = $value[0];

		if ( strlen( $value ) == mb_strlen( $value ) ) {
		  // 全部英語（全部シングルバイト文字）
			return false;
		} else {
		  // 日本語が含まれている（マルチバイト文字が含まれている）
			return true;
		}
    }
}
