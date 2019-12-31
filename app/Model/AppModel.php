<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    function begin() {
        $db = & ConnectionManager::getDataSource($this->useDbConfig);
        $db->begin($this);
    }
    function commit() {
        $db = & ConnectionManager::getDataSource($this->useDbConfig);
        $db->commit($this);
    }
    function rollback() {
        $db = & ConnectionManager::getDataSource($this->useDbConfig);
        $db->rollback($this);
    }

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

//     public function afterFind($results, $primary = false) {
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

//     //var_dump($results);exit();
//     return $results;
// } 

    // app/Model/AppModel.php
// public function afterFind($results, $primary = false) {
//     // if getting associated data
//     if($primary === false) {
//         // check for translate behavior
//         foreach(array_keys($this->actsAs) as $behavior) {
//             if(preg_match('/^(T|t)ranslate$/', $behavior)) {
//                 // set locale to lookup translation
//                 $currentLanguage = Configure::read('Config.language');
//                 if($currentLanguage !== DEFAULT_LANGUAGE) {
//                     $this->locale = array($currentLanguage, DEFAULT_LANGUAGE);  
//                 } else {
//                     $this->locale = $currentLanguage;   
//                 }
//                 // if multi-dimensional array
//                 if(count($results) != count($results, COUNT_RECURSIVE)) {
//                     foreach($results as &$model) {
//                         if(is_array($model)){
//                             // if multiple models
//                             if(isset($model[$this->name][0])) {
//                                 foreach($model[$this->name] as &$associatedModel) {
//                                     // get model with translations
//                                     $res = $this->find('first', array(
//                                         'conditions' => array("{$this->alias}.{$this->primaryKey} = ".$associatedModel[$this->primaryKey]),
//                                         'contain' => false
//                                     ));
//                                     // add translated fields to results
//                                     $diff = array_diff_assoc($res[$this->name], $associatedModel);
//                                     if(count($diff)) {
//                                         $associatedModel = array_merge($associatedModel, $diff);
//                                     }
//                                 }
//                             } else if(!empty($model[$this->name])) {
//                                 // get model with translations
//                                 $res = $this->find('first', array(
//                                     'conditions' => array("{$this->alias}.{$this->primaryKey} = ".$model[$this->name][$this->primaryKey]),
//                                     'contain' => false
//                                 ));
//                                 // add translated fields to results
//                                 $diff = array_diff_assoc($res[$this->name], $model[$this->name]);
//                                 if(count($diff)) {
//                                     $model[$this->name] = array_merge($model[$this->name], $diff);
//                                 }
//                             }
//                         }
//                     }
//                 } else {
//                     // get model with translations
//                     $res = $this->find('first', array(
//                         'conditions' => array("{$this->alias}.{$this->primaryKey} = ".$results[$this->primaryKey]),
//                         'contain' => false
//                     ));
//                     // add translated fields to results
//                     $diff = array_diff_assoc($res[$this->name], $results);
//                     if(count($diff)) {
//                         $results = array_merge($results, $diff);
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
}
