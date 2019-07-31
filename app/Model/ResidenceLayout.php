<?php
App::uses('AppModel', 'Model');
/**
 * ResidenceLayout Model
 *
 */
class ResidenceLayout extends AppModel {

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
                'message'  => '住居間取り名を入力してください。',
                'required' => true,
                'last'     => true,
			),
			'maxlength' => array(
                'rule'     => array('maxlength', 32),
                'message'  => '住居間取り名は32文字以内で入力してください。',
                'required' => true,
                'last'     => true,
			),
		),
	);
}
