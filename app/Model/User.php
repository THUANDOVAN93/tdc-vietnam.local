<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => 'ユーザー名を入力してください。',
                'required' => true,
                'last'     => true,
			),
			'maxlength' => array(
                'rule'     => array('maxlength', 64),
                'message'  => 'ユーザー名は64文字以内で入力してください。',
                'required' => true,
                'last'     => true,
			),
		),
        'login_id' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => 'ログインIDを入力してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule'     => array('maxlength', 15),
                'message'  => 'ログインIDは15文字以内で入力してください。',
                'required' => true,
                'last'     => true,
            ),
        'uniqueLoginId' => array(
                'rule'     => array('uniqueLoginId'),
                'message'  => 'こちらのユーザーIDは既に使用されています。',
                'required' => true,
                'last'     => true,
            ),
        ),
		'password' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => 'パスワードを入力してください。',
                'required' => true,
                'last'     => true,
                'on' => 'create',
            ),
			'maxlength' => array(
                'rule'     => array('maxlength', 64),
                'message'  => 'パスワードは64文字以内で入力してください。',
                'required' => true,
                'last'     => true,
                'on' => 'create',
			),
		),
		'new_password' => array(
			'maxlength' => array(
                'rule'     => array('maxlength', 64),
                'message'  => '新しいパスワードは64文字以内で入力してください。',
                'required' => true,
                'last'     => true,
                'allowEmpty' => true,
                'on' => 'update',
            ),
		),
		'role_id' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => '権限を入力してください。',
                'required' => true,
                'last'     => true,
            ),
		),
	);

	public function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className'  => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)
	);

    /**
    * ユーザーID重複チェック
    * @return array
    */
    function uniqueLoginId() {

        $loginId = $this->data[$this->name]['login_id'];

        //編集時は、チェック対象から自分のIDを省く
        if (isset($this->data[$this->name]['id']) && strlen($this->data[$this->name]['id'])){
            $id = $this->data[$this->name]['id'];
            $params['conditions']['User.id !='] = $id;
        }

        $params['conditions']['User.login_id'] = $loginId;
        $user = $this->find('first', $params);
        if (isset($user['User']) && count($user['User']) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
