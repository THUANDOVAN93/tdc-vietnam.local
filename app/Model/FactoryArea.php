<?php
App::uses('AppModel', 'Model');
/**
 * FactoryArea Model
 *
 */
class FactoryArea extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';

    public $hasMany = array(
        'FactoryBuildingOfArea' => array(
            'className'     => 'FactoryBuilding',
            'foreignkey'    => 'factory_area_id',
            'dependent'     => true
        )
    );

/**
 * Translate
 *
 * @var string
 */
    // public $actsAs = array(
    //     'Translate' => array(
    //         'name' => 'nameTranslation',
    //         'note' => 'noteTranslation'
    //     )
    // );
    public $actsAs = array(
        'Translate' => array(
            'name',
            'note'
        )
    );

    // $this->FactoryArea->FactoryBuildingOfArea->Behaviors->load(
    //     'Translate' => array(
    //         'name' => 'nameFbTranslation'
    //     )
    // );

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule'     => array('notempty'),
                'message'  => '工場エリア名を入力してください。',
                'required' => true,
                'last'     => true,
            ),
            'maxlength' => array(
                'rule'     => array('maxlength', 64),
                'message'  => '工場エリア名は64文字以内で入力してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
        'note' => array(
            'maxlength' => array(
                'rule'     => array('maxlength', 1000),
                'message'  => 'Enter the factory area description within 1000 characters.',
                'required' => true,
                'last'     => true,
            ),
        ),
        'address' => array(
            'maxLength' => array(
                'rule' => array('maxLength', '512'),
                'message' => '最大512文字で入力してください。',
                'required' => true,
                'last' => true,
            ),
        ),
        'lat' => array(
            'decimal' => array(
                'rule'     => array('decimal'),
                'message'  => '緯度の入力値が不正です。再度、マップを選択してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
        'lng' => array(
            'decimal' => array(
                'rule'     => array('decimal'),
                'message'  => '経度の入力値が不正です。再度、マップを選択してください。',
                'required' => true,
                'last'     => true,
            ),
        ),
    );

    // public function getTranslatedModelField($id = 0, $field) {
    //     // retrieve active language
    //     $ActiveLanguageCatalog=CakeSession::read('Config.language') ;
    //     $res = false;
    //     $translateTable = (isset($this->translateTable))?$this->translateTable:"i18n";

    //     $db = $this->getDataSource();
    //     $tmp = $db->fetchAll(
    //         "SELECT content from {$translateTable} WHERE model = ? AND locale = ? AND foreign_key = ? AND field = ? LIMIT 1",
    //         array($this->alias, $ActiveLanguageCatalog['locale'], $id, $field)
    //     );
    //     if (!empty($tmp)) {
    //         $res = $tmp[0][$translateTable]['content'];
    //     }
    //     return $res;
    // }   

    // public function afterFind($results, $primary = false) {

    //     var_dump($primary);exit();
    //     if ($primary === false) {
    //         var_dump("this case 1"); exit(); 
    //     }
    //     if($primary == false && array_key_exists('Translate', $this->actsAs)) {
            
    //         foreach ($results as $key => $val) {
    //             if (isset($val[$this->name]) && isset($val[$this->name]['id'])) {
    //                 foreach($this->actsAs['Translate'] as $translationfield) {  
    //                     $results[$key][$this->name][$translationfield] = $this->getTranslatedModelField($val[$this->name]['id'], $translationfield);
    //                 }
    //             } else if($key == 'id' && is_numeric($val)) {
    //                 foreach($this->actsAs['Translate'] as $translationfield) {  
    //                     $results[$translationfield] = $this->getTranslatedModelField($val, $translationfield);
    //                 }                   
    //             }
    //          }
    //     }

    //     //var_dump($results);exit();

    //     return $results;
    // }

    // public function afterFind($results, $primary = false) {
    //     if(!empty($this->hasMany)) {
    //         foreach($this->hasMany as $model => $settings) {
    //             if(isset($this->{$model}->actsAs['Translate'])) {
    //                 if(!empty($results[0][$model])) {
    //                     foreach($results[0][$model] as $row => $result) {
    //                         $supplement = $this->{$model}->find('first', array(
    //                             'conditions' => array(
    //                                 $model .'.id' => $result['id']),
    //                             'fields' => $this->{$model}->actsAs['Translate'],
    //                             'recursive' => -1));

    //                         if(!empty($supplement)) {
    //                             $results[0][$model][$row] = array_merge($results[0][$model][$row], array_diff($supplement[$model], $result));
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     if(!empty($this->belongsTo)) {
    //         foreach($this->belongsTo as $model => $settings) {
    //             if(isset($this->{$model}->actsAs['Translate'])) {
    //                 if(!empty($results[0][$model])) {
    //                     foreach($results[0][$model] as $row => $result) {
    //                         $supplement = $this->{$model}->find('first', array(
    //                             'conditions' => array(
    //                                 $model .'.id' => $result),
    //                             'fields' => $this->{$model}->actsAs['Translate'],
    //                             'recursive' => -1));

    //                         if(!empty($supplement)) {
    //                             $results[0][$model] = array_merge($results[0][$model], $supplement[$model]);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     return $results;
    // } 

    // public function getTranslatedModelField($id = 0, $field) {
    //     // retrieve active language

    //     $locale = $this->locale ;// gets the current assigned locale

    //     $res = false;
    //     $translateTable = (isset($this->translateTable))?$this->translateTable:"i18n";

    //     $db = $this->getDataSource();
    //     $tmp = $db->fetchAll(
    //         "SELECT content from {$translateTable} WHERE model = ? AND locale = ? AND foreign_key = ? AND field = ? LIMIT 1",
    //         array($this->alias, $locale , $id, $field)
    //     );
    //     if (!empty($tmp)) {
    //         $res = $tmp[0][$translateTable]['content'];
    //     }
    //     return $res;
    // }   

    // public function afterFind($results, $primary = true) {

    //     if($primary == false && array_key_exists('Translate', $this->actsAs)) {
    //         foreach ($results as $key => $val) {
    //             if (isset($val[$this->name]) && isset($val[$this->name]['id'])) {
    //                 foreach($this->actsAs['Translate'] as $translationfield) {  
    //                     $results[$key][$this->name][$translationfield] = $this->getTranslatedModelField($val[$this->name]['id'], $translationfield);
    //                 }
    //             } else if($key == 'id' && is_numeric($val)) {
    //                 foreach($this->actsAs['Translate'] as $translationfield) {  
    //                     $results[$translationfield] = $this->getTranslatedModelField($val, $translationfield);
    //                 }                   
    //             }
    //          }
    //     }


    //     //var_dump($results);exit();

    //     return $results;
    // }

//     public function getTranslatedModelField($id = 0, $field) {
//         // retrieve active language
//         $locale = $this->locale ;// gets the current assigned locale

//         $res = false;
//         $translateTable = (isset($this->translateTable))?$this->translateTable:"i18n";

//         $db = $this->getDataSource();
//         $tmp = $db->fetchAll(
//             "SELECT content from {$translateTable} WHERE model = ? AND locale = ? AND foreign_key = ? AND field = ? LIMIT 1",
//             array($this->alias, $locale , $id, $field)
//         );
//         if (!empty($tmp)) {
//             $res = $tmp[0][$translateTable]['content'];
//         }
//         return $res;

//     } 

//     public function afterFind($results, $primary = false) {
//         $translateTable = (isset($this->translateTable))?$this->translateTable:"i18n";
//         var_dump($translateTable);exit();
//     if($primary == false && array_key_exists('Translate', $this->actsAs)) {
//         foreach ($results as $key => $val) {
//             if (isset($val[$this->name]) && isset($val[$this->name]['id'])) {
//                 foreach($this->actsAs['Translate'] as $translationfield) {  
//                     $results[$key][$this->name][$translationfield] = $this->getTranslatedModelField($val[$this->name]['id'], $translationfield);
//                 }
//             } else if($key == 'id' && is_numeric($val)) {
//                 foreach($this->actsAs['Translate'] as $translationfield) {  
//                     $results[$translationfield] = $this->getTranslatedModelField($val, $translationfield);
//                 }                   
//             }
//          }
//     }



//     return $results;
// }

// public function afterFind($results, $primary = false) {
//     //$translateTable = (isset($this->translateTable))?$this->translateTable:"i18n";

//     if(!empty($this->hasMany)) {
//         var_dump($this->hasMany);exit();
//         foreach($this->hasMany as $model => $settings) {
//             var_dump($model);exit();
//             if(isset($this->{$model}->actsAs['Translate'])) {
//                 if(!empty($results[0][$model])) {
//                     foreach($results[0][$model] as $row => $result) {
//                         $supplement = $this->{$model}->find('first', array(
//                             'conditions' => array(
//                                 $model .'.id' => $result['id']),
//                             'fields' => $this->{$model}->actsAs['Translate'],
//                             'recursive' => -1));

//                         if(!empty($supplement)) {
//                             $results[0][$model][$row] = array_merge($results[0][$model][$row], array_diff($supplement[$model], $result));
//                         }
//                     }
//                 }
//             }
//         }
//     }

//     if(!empty($this->belongsTo)) {
//         foreach($this->belongsTo as $model => $settings) {
//             if(isset($this->{$model}->actsAs['Translate'])) {
//                 if(!empty($results[0][$model])) {
//                     foreach($results[0][$model] as $row => $result) {
//                         $supplement = $this->{$model}->find('first', array(
//                             'conditions' => array(
//                                 $model .'.id' => $result),
//                             'fields' => $this->{$model}->actsAs['Translate'],
//                             'recursive' => -1));

//                         if(!empty($supplement)) {
//                             $results[0][$model] = array_merge($results[0][$model], $supplement[$model]);
//                         }
//                     }
//                 }
//             }
//         }
//     }

//     return $results;
// } 


    // public function getTranslatedModelField($id = 0, $field) {
    //     // retrieve active language
    //     $ActiveLanguageCatalog = CakeSession::read('Config.language');
    //     $res = false;
    //     $translateTable = (isset($this->translateTable))?$this->translateTable:"i18n";

    //     $db = $this->getDataSource();
    //     $tmp = $db->fetchAll(
    //         "SELECT content from {$translateTable} WHERE model = ? AND locale = ? AND foreign_key = ? AND field = ? LIMIT 1",
    //         array($this->alias, $ActiveLanguageCatalog['locale'], $id, $field)
    //     );
    //     if (!empty($tmp)) {
    //         $res = $tmp[0][$translateTable]['content'];
    //     }
    //     return $res;
    // }   

    // public function afterFind($results, $primary = false) {

    //     if($primary == false && array_key_exists('Translate', $this->actsAs)) {
    //         foreach ($results as $key => $val) {
    //             if (isset($val[$this->name]) && isset($val[$this->name]['id'])) {
    //                 foreach($this->actsAs['Translate'] as $translationfield) {  
    //                     $results[$key][$this->name][$translationfield] = $this->getTranslatedModelField($val[$this->name]['id'], $translationfield);
    //                 }
    //             } else if($key == 'id' && is_numeric($val)) {
    //                 foreach($this->actsAs['Translate'] as $translationfield) {  
    //                     $results[$translationfield] = $this->getTranslatedModelField($val, $translationfield);
    //                 }                   
    //             }
    //          }
    //     }

    //     var_dump($results);exit();
    //     return $results;
    // }


}
