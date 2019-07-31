<?php
App::uses('AppModel', 'Model');
/**
 * OfficeCategory Model
 *
 */
class OfficeCategory extends AppModel {

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
                'message'  => '事務所種別名を入力してください。',
                'required' => true,
                'last'     => true,
			),
			'maxlength' => array(
                'rule'     => array('maxlength', 32),
                'message'  => '事務所種別名は32文字以内で入力してください。',
                'required' => true,
                'last'     => true,
			),
		),
	);
}
