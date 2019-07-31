<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/',                                  array('controller' => 'FrontTop',       'action' => 'index'));

	Router::connect('/residence/area/',                     array('controller' => 'FrontResidence', 'action' => 'area_index'));
	Router::connect('/residence/area/list/:areaId/*',       array('controller' => 'FrontResidence', 'action' => 'area_list'));
	Router::connect('/residence/area/list/:areaId',         array('controller' => 'FrontResidence', 'action' => 'area_list'));
	Router::connect('/residence/area/hanoi/',               array('controller' => 'FrontResidence', 'action' => 'area_hanoi'));
	Router::connect('/residence/area/hanoi/list/:areaId/*', array('controller' => 'FrontResidence', 'action' => 'area_hanoi_list'));
	Router::connect('/residence/area/hanoi/list/:areaId',   array('controller' => 'FrontResidence', 'action' => 'area_hanoi_list'));
	Router::connect('/residence/area/detail/:id',           array('controller' => 'FrontResidence', 'action' => 'area_detail'));
	Router::connect('/residence/station/',                  array('controller' => 'FrontResidence', 'action' => 'station_index'));
	Router::connect('/residence/station/list/:stationId/*', array('controller' => 'FrontResidence', 'action' => 'station_list'));
	Router::connect('/residence/station/list/:stationId',   array('controller' => 'FrontResidence', 'action' => 'station_list'));
	Router::connect('/residence/station/detail/:id',        array('controller' => 'FrontResidence', 'action' => 'station_detail'));

	Router::connect('/office/area/',                        array('controller' => 'FrontOffice',    'action' => 'area_index'));
	Router::connect('/office/area/list/:areaId/*',          array('controller' => 'FrontOffice',    'action' => 'area_list'));
	Router::connect('/office/area/list/:areaId',            array('controller' => 'FrontOffice',    'action' => 'area_list'));
	Router::connect('/office/area/hanoi/',                  array('controller' => 'FrontOffice',    'action' => 'area_hanoi'));
	Router::connect('/office/area/hanoi/list/:areaId/*',    array('controller' => 'FrontOffice',    'action' => 'area_hanoi_list'));
	Router::connect('/office/area/hanoi/list/:areaId',      array('controller' => 'FrontOffice',    'action' => 'area_hanoi_list'));
	Router::connect('/office/area/detail/:id',              array('controller' => 'FrontOffice',    'action' => 'area_detail'));
	Router::connect('/office/station/',                     array('controller' => 'FrontOffice',    'action' => 'station_index'));
	Router::connect('/office/station/list/:stationId/*',    array('controller' => 'FrontOffice',    'action' => 'station_list'));
	Router::connect('/office/station/list/:stationId',      array('controller' => 'FrontOffice',    'action' => 'station_list'));
	Router::connect('/office/station/detail/:id',           array('controller' => 'FrontOffice',    'action' => 'station_detail'));

	Router::connect('/factory/area/',                       array('controller' => 'FrontFactory',   'action' => 'area_index'));
	Router::connect('/factory/area/north/',                 array('controller' => 'FrontFactory',   'action' => 'area_north'));
	Router::connect('/factory/area/north/list/:areaId/*',   array('controller' => 'FrontFactory',   'action' => 'area_north_list'));
	Router::connect('/factory/area/north/list/:areaId',     array('controller' => 'FrontFactory',   'action' => 'area_north_list'));
	Router::connect('/factory/area/central/',               array('controller' => 'FrontFactory',   'action' => 'area_central'));
	Router::connect('/factory/area/central/list/:areaId/*', array('controller' => 'FrontFactory',   'action' => 'area_central_list'));
	Router::connect('/factory/area/central/list/:areaId',   array('controller' => 'FrontFactory',   'action' => 'area_central_list'));
	Router::connect('/factory/area/south/',                 array('controller' => 'FrontFactory',   'action' => 'area_south'));
	Router::connect('/factory/area/south/list/:areaId/*',   array('controller' => 'FrontFactory',   'action' => 'area_south_list'));
	Router::connect('/factory/area/south/list/:areaId',     array('controller' => 'FrontFactory',   'action' => 'area_south_list'));
	Router::connect('/factory/area/all/',                   array('controller' => 'FrontFactory',   'action' => 'area_all'));
	Router::connect('/factory/area/all/*',                  array('controller' => 'FrontFactory',   'action' => 'area_all'));
	Router::connect('/factory/area/list/:areaId/*',         array('controller' => 'FrontFactory',   'action' => 'area_list'));
	Router::connect('/factory/area/list/:areaId',           array('controller' => 'FrontFactory',   'action' => 'area_list'));
	Router::connect('/factory/area/detail/:id',             array('controller' => 'FrontFactory',   'action' => 'area_detail'));

	Router::connect('/contact/',                            array('controller' => 'FrontContact',   'action' => 'index', 'id' => null, 'building' => 'factory'));
	Router::connect('/contact/:building',                   array('controller' => 'FrontContact',   'action' => 'index', 'id' => null));
	Router::connect('/contact/:building/confirm',           array('controller' => 'FrontContact',   'action' => 'confirm'));
	Router::connect('/contact/:building/complete',          array('controller' => 'FrontContact',   'action' => 'complete'));
	Router::connect('/contact/:building/back',              array('controller' => 'FrontContact',   'action' => 'index', 'back' => 'back'));
	Router::connect('/contact/:building/:id',               array('controller' => 'FrontContact',   'action' => 'index'));

	Router::connect('/map/', array('controller' => 'FrontMap', 'action' => 'index'));
	Router::connect('/map/:building/:min_lat/:max_lat/:min_lng/:max_lng/:typeflg/', array('controller' => 'FrontMap', 'action' => 'xml'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Admin Routing
 */
	Router::connect('/admin',        array('controller' => 'admin', 'action' => 'index',  'admin' => true));
	Router::connect('/admin/login',  array('controller' => 'admin', 'action' => 'login',  'admin' => true));
	Router::connect('/admin/logout', array('controller' => 'admin', 'action' => 'logout', 'admin' => true));

/**
 * Setlang Routing
 */
	Router::connect('/lang/*',  array('controller' => 'Lang',       'action' => 'index'));
/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

