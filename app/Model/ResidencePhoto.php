<?php
App::uses('AppModel', 'Model');
/**
 * ResidencePhoto Model
 *
 * @property ResidenceBuilding $ResidenceBuilding
 */
class ResidencePhoto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'path';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'path' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => '画像のパスがセットされていません。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 255),
                'message'  => '画像のパスが長すぎます。',
                'required' => true,
                'allowEmpty' => true,
                'last'     => true,
            ),
        ),
        'caption' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '255'),
                'message' => '最大255文字で入力してください。',
                'required' => true,
                'allowEmpty' => true,
                'last' => true,
            ),
        ),
        'use_point' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => '画像の使用箇所がセットされていません。',
                'required' => true,
                'last'     => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '30'),
                'message' => '最大30文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'residence_building_id' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => '住居物件IDがセットされていません。',
                'required' => true,
                'last'     => true,
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'ResidenceBuilding' => array(
            'className'  => 'ResidenceBuilding',
            'foreignKey' => 'residence_building_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );


    public function adminEditPhotoList($residence_building_id) {

        $tempArray = array();
        for ($i=0; $i <= 10; $i++) {
            $tempArray[$i] = array();
        }
        $returnArray[$this->name] = $tempArray;

        // 一覧画像
        $params = array(
            'conditions' => array(
                'ResidencePhoto.residence_building_id' => $residence_building_id,
                'ResidencePhoto.use_point'             => 'List',
            ),
        );
        $photos = $this->find('all', $params);
        $i = 0;
        foreach ($photos as $photo) {
            $returnArray[$this->name][$i++] = $photo[$this->name];
            if ($i > 1) {
                break;
            }
        }
        // メイン
        $params = array(
            'conditions' => array(
                'ResidencePhoto.residence_building_id' => $residence_building_id,
                'ResidencePhoto.use_point'             => 'Main',
            ),
        );
        $photos = $this->find('all', $params);
        $i = 2;
        foreach ($photos as $photo) {
            $returnArray[$this->name][$i++] = $photo[$this->name];
            if ($i > 2) {
                break;
            }
        }
        // サブ大
        $params = array(
            'conditions' => array(
                'ResidencePhoto.residence_building_id' => $residence_building_id,
                'ResidencePhoto.use_point'             => 'Sub',
            ),
        );
        $photos = $this->find('all', $params);
        $i = 3;
        foreach ($photos as $photo) {
            $returnArray[$this->name][$i++] = $photo[$this->name];
            if ($i > 4) {
                break;
            }
        }
        // サブ大
        $params = array(
            'conditions' => array(
                'ResidencePhoto.residence_building_id' => $residence_building_id,
                'ResidencePhoto.use_point'             => 'SubSub',
            ),
        );
        $photos = $this->find('all', $params);
        $i = 5;
        foreach ($photos as $photo) {
            $returnArray[$this->name][$i++] = $photo[$this->name];
            if ($i > 10) {
                break;
            }
        }
        return $returnArray;
    }

}
