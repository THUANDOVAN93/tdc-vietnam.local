<?php
App::uses('AppModel', 'Model');
/**
 * ContactFactory Model
 *
 */
class ContactFactory extends AppModel {

	public $useTable = false;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		// 'buildings_name' => array(
		// ),
		'company_name' => array(
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => '会社名を正しく入力してください。',
            ),
		),
		// 'industry' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => '業種を正しく入力してください。',
  //           ),
		// ),
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
		// 'address' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => '住所を正しく入力してください。',
  //           ),
		// ),
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
		// 'fax' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => 'FAXを正しく入力してください。',
  //           ),
		// ),
		// 'boi_zone' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => 'BOIゾーンを正しく入力してください。',
  //           ),
		// ),
		// 'location' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => 'ロケーションを正しく入力してください。',
  //           ),
		// ),
		// 'factory_sub_category' => array(
		// ),
		// 'floor_space_site' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => '必要面積（リース工業用地）を正しく入力してください。',
  //           ),
		// ),
		// 'floor_space_building' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => '必要面積（リース工業用地以外）を正しく入力してください。',
  //           ),
		// ),
		// 'weight_limit' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => '床耐荷重を正しく入力してください。',
  //           ),
		// ),
		// 'building_height' => array(
  //           array(
  //               'rule'     => array('inpStringCheck','@'),
  //               'message'  => '天井高を正しく入力してください。',
  //           ),
		// ),
		'message' => array(
			'notempty' => array(
				'rule'     => array('notempty'),
				'message'  => 'お問い合わせ内容',
				'required' => true,
				'last'     => true,
			),
            array(
                'rule'     => array('inpStringCheck','@'),
                'message'  => 'お問い合わせ内容',
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
