<?php
App::uses('AppModel', 'Model');
/**
 * IndustrialPark Model
 *
 */
class IndustrialPark extends AppModel {

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
                'message'  => '工業団地内外名を入力してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule'     => array('maxlength', 32),
                'message'  => '工業団地内外名は32文字以内で入力してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
    );
}
