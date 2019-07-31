<?php
App::uses('AppModel', 'Model');
/**
 * FactorySubCategory Model
 *
 */
class AddInformation extends AppModel {

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
                'message'  => 'TOP表示項目名を入力してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule'     => array('maxlength', 32),
                'message'  => 'TOP表示項目名は32文字以内で入力してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
    );
}
