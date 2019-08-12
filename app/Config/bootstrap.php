<?php

App::build(array(
//    'Plugin' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
//    'Model' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
    'View' => array(
        APP . 'View' . DS . 'Front' . DS,
        APP . 'View' . DS, 
    ),
    'Controller' => array(
        APP . 'Controller' . DS . 'Front' . DS,
        APP . 'Controller' . DS, 
    ),
//    'Model/Datasource' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
//    'Model/Behavior' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
//    'Controller/Component' => array('/full/path/to/components/', '/next/full/path/to/components/'),
//    'View/Helper' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
//    'Vendor' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
//    'Console/Command' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
//    'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
), App::RESET);
Configure::write('debug', 0);

Cache::config('default', array('engine' => 'File'));

CakePlugin::loadAll();
CakePlugin::load('Wysiwyg');

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'FileLog',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'FileLog',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

/**
 * Session
 */
/*
Configure::write('Session', array(
        'defaults' => 'database',
        'cookie'   => 'SID',
        'timeout'  => 86400,
        'ini'      => Array(
                'session.cookie_lifetime' => 86400,
                'session.gc_maxlifetime'  => 86400,
                'session.gc_probability'  => 1,
                'session.gc_divisor'      => 100
        )
));
*/

Configure::write('Security', array(
	'level'      => 'high',
	'salt'       => 'lW@#+Yj^IsYq3,OBai)+Xa^&yuyB.-5C-/_r-pRA]*du=,qd|q`g`.!z$%<uGPMN',
	'cipherSeed' => '03OR+aSf!^+_p7%zAmx.R&cx4)M:78ZZ_]iebbk1}/<t|qN`)D6SL?xe5pyG<f6'
));

/**
 * File Upload Directory
 */
Configure::write('UploadDir', '/upload/');
Configure::write('UploadSavePath', APP . WEBROOT_DIR . '/upload/');
Configure::write('UploadDeletePath', APP . WEBROOT_DIR);

/**
 * PDOException ForeignKey
 */
Configure::write('MySql.ErrorCode.ForeignKey', '23000');
Configure::write('MySql.ErrorCode.RowLarge', '42000');

// 外部ファイル読み込み
config('item_define_configure');
config('admin_message');
config('image_size');
config('map_size');
config('pageinfo');
config('email');
config('util');
