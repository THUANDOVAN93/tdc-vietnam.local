<?php
App::uses('AppModel', 'Model');
/**
 * Line Model
 *
 */
class Line extends AppModel {

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
                'message'  => '路線名を入力してください。',
                'required' => true,
                'last'     => true,
			),
			'maxlength' => array(
                'rule'     => array('maxlength', 64),
                'message'  => '路線名は64文字以内で入力してください。',
                'required' => true,
                'last'     => true,
			),
		),
	);
}
