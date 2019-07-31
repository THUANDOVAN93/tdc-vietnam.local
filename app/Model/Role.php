<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 * @property User $User
 */
class Role extends AppModel {

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
                'message'  => '権限名を入力してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule'     => array('maxlength', 32),
                'message'  => '権限名は32文字以内で入力してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
        'role_admin' => array(
            'rule' => array('roleCheck', array('role_admin', 'role_manager', 'role_staff')),
            'message' => '権限を1つ以上選択してください。',
            'required' => true,
            'last'     => true,
        ),
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'role_id',
            'dependent'    => false,
            'conditions'   => '',
            'fields'       => '',
            'order'        => '',
            'limit'        => '',
            'offset'       => '',
            'exclusive'    => '',
            'finderQuery'  => '',
            'counterQuery' => ''
        )
    );

    /**
    * 権限 : いずれかが選択されているか
    */
    public function roleCheck($data, $arg) {
        foreach ($arg as $key => $val) {
            if ($this->data['Role'][$val] == '1') {
                return true;
            }
        }
        return false;
    }
}
