<?php
App::uses('AppController', 'Controller');

class AdminController extends AppController {
/**
 *  Layout
 *
 * @var string
 */
    public $layout = 'admin';

/**
 * Helpers
 *
 * @var array
 */
    public $helpers = array(
        'TwitterBootstrap.BootstrapHtml',
        'TwitterBootstrap.BootstrapForm',
        'TwitterBootstrap.BootstrapPaginator',
    );

/**
 * Helpers
 *
 * @var array
 */
    public $uses = array(
        'User',
        'Role',
        'ResidenceBuilding',
        'OfficeBuilding',
        'FactoryBuilding',
        'ResidenceCategory',
        'OfficeCategory',
        'FactoryCategory',
        'Area',
        'FactoryArea',
        'Station',
        'IndustrialPark',
    );

/**
 * Components
 *
 * @var array
 */
    public $components = array(
        'Auth',
        'ImageGd.ImageResizer',
    );

/**
 * beforeFilter
 *
 * @return void
 */
    public function beforeFilter() {
        parent::beforeFilter();
        // 各URL設定
        $this->Auth->loginRedirect  = '/admin';
        $this->Auth->loginAction    = '/admin/login';
        $this->Auth->logoutRedirect = '/admin/login';
        // ログイン情報データの設定
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'User',
                'fields' => array(
                    'username' => 'login_id',
                    'password' => 'password',
                ),
            ),
        );
        $allowNoAuthPage = ($this->request->params['controller'] == 'admin' && $this->request->params['action'] == 'admin_login');
        if (!$allowNoAuthPage && !$this->Auth->login()) {
            if (!($this->request->params['controller'] == 'admin') || !($this->request->params['action'] == 'admin_index')) {
                $this->Session->setFlash(Configure::read('Admin.Message.AutoLogout'), 'alert', array('class' => 'alert-error'));
            }
            $this->redirect('/admin/login');
        }

        $this->username    = $username    = $this->Session->read('Auth.User.username');
        $this->roleAdmin   = $roleAdmin   = $this->Session->read('Auth.User.Role.role_admin'); // システム
        $this->roleManager = $roleManager = $this->Session->read('Auth.User.Role.role_manager'); // ユーザ
        $this->roleStaff   = $roleStaff   = $this->Session->read('Auth.User.Role.role_staff'); // サイト
        $this->set(compact('username', 'roleAdmin', 'roleManager', 'roleStaff'));

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), 'ホーム'));
    }

    public function admin_index() {

        // 住居
        $residenceBuildingConditions = array(
            'ResidenceBuilding.next_update < now()',
        );
        $this->ResidenceBuilding->unbindModelAll();
        $residenceAlertCount = $this->ResidenceBuilding->find('count', array(
            'conditions' => $residenceBuildingConditions,
        ));
        $residenceBuildings = $this->ResidenceBuilding->find('all', array(
            'conditions' => $residenceBuildingConditions,
            'limit' => 3,
            'order' => 'next_update DESC',
        ));
        // 事務所
        $officeBuildingConditions = array(
            'OfficeBuilding.next_update < now()',
        );
        $this->OfficeBuilding->unbindModelAll();
        $officeAlertCount = $this->OfficeBuilding->find('count', array(
            'conditions' => $officeBuildingConditions,
        ));
        $officeBuildings    = $this->OfficeBuilding->find('all', array(
            'conditions' => $officeBuildingConditions,
            'limit' => 3,
            'order' => 'next_update DESC',
        ));
        // 工場
        $factoryBuildingConditions = array(
            'FactoryBuilding.next_update < now()',
        );
        $this->FactoryBuilding->unbindModelAll();
        $factoryAlertCount = $this->FactoryBuilding->find('count', array(
            'conditions' => $factoryBuildingConditions,
        ));
        $factoryBuildings   = $this->FactoryBuilding->find('all', array(
            'conditions' => $factoryBuildingConditions,
            'limit' => 3,
            'order' => 'next_update DESC',
        ));
        // 何れかが1件以上あればアラート表示
        if ($residenceAlertCount > 0 || $officeAlertCount > 0 || $factoryAlertCount > 0) {
            $this->Session->setFlash(Configure::read('Admin.Message.UpdateAlertExists'), 'alert', array('class' => 'alert-error'),'update-alert');
        } else {
            $this->Session->setFlash(Configure::read('Admin.Message.UpdateAlertEmpty'), 'alert', array('class' => 'alert-success'),'update-alert');
        }

        $residenceCategories = $this->ResidenceCategory->find('list');
        $officeCategories    = $this->OfficeCategory->find('list');
        $factoryCategories   = $this->FactoryCategory->find('list');
        $areas               = $this->Area->find('list');
        $factoryAreas        = $this->FactoryArea->find('list');
        $stations            = $this->Station->find('list');
        $industrialParks     = $this->IndustrialPark->find('list');

        $this->set(compact(
            'residenceAlertCount', 
            'residenceBuildings', 
            'officeAlertCount', 
            'officeBuildings', 
            'factoryAlertCount',
            'factoryBuildings', 
            'residenceCategories', 
            'officeCategories', 
            'factoryCategories', 
            'areas', 
            'factoryAreas', 
            'stations', 
            'industrialParks'
        ));

    }

    public function admin_login() {
        $this->set('title_for_layout', 'ダッシュボード | 管理画面');
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(
                    'ユーザーIDとパスワードが一致しません。',
                    'alert',
                    array(
                        'plugin' => 'TwitterBootstrap',
                        'class'  => 'alert-error',
                    )
                );
            }
        }
    }

    public function admin_logout() {
        $this->redirect($this->Auth->logout());
    }


/**
 * fileUpload method
 *
 * @return string
 */
    protected function fileUpload($tmp_name, $name, $id = '') {
        // ファイルアップロード
        $image_path = '';
        if (!empty($tmp_name) && !empty($name)) {
            $extension  = mb_substr($name, mb_strrpos($name, '.'));
            $save_name  = $id . md5($tmp_name) . $extension;

            $path_suffix = $this->name . '/';
            $upload_dir  = Configure::read('UploadDir') . $path_suffix;
            $local_dir   = Configure::read('UploadSavePath') . $path_suffix;
            if (!is_dir($local_dir)) { mkdir($local_dir, 0777, true); }

            $local_dir  = $local_dir . $save_name;

            if (move_uploaded_file($tmp_name, $local_dir)) {
                $image_path = $save_name;
            }
        }
        return $image_path;
    }

/**
 * fileDelete method
 *
 * @return string
 */
    protected function fileDelete($name, $dirname = null) {
        // ファイルアップロード
        if (!empty($name)) {
            $conname = $this->name;
            if (!is_null($dirname)) {
                $conname = $dirname;
            }
            $path_suffix = $conname . '/';
            $local_dir   = Configure::read('UploadSavePath') . $path_suffix;

            if (file_exists($local_dir . $name)) {
                unlink($local_dir . $name);
            }
        }
        return true;
    }

/**
 * geoLocationFromText method
 *
 * @return string
 */
    protected function geoLocationFromText($lat, $lng) {
        // 緯度・経度からエリア位置情報を生成
        $location = '';
        if (strlen($lat) > 0 && strlen($lng) > 0) {
            $locationArray = array();
            $locationArray[] = $lat;
            $locationArray[] = $lng;
            $location = implode(',' ,$locationArray);
        }
        return $location;
    }

/**
 * getLocationToLatLngText method
 *
 * @return string
 */
    protected function getLocationToLatLngText($location) {
        //エリア位置情報から緯度・経度を生成
        $LatLngArray = array();
        if (strlen($location) > 0) {
            $LatLngArray = explode(',', $location);
        }
        return $LatLngArray;
    }



/**
 * getLatLngToLocationText method
 *
 * @return string
 */
    protected function getLatLngToLocationText($lat, $lng) {
        // 緯度・経度からエリア位置情報を生成
        $location = '';
        if (strlen($lat) > 0 && strlen($lng) > 0) {
            $locationArray = array();
            $locationArray[] = $lat;
            $locationArray[] = $lng;
            $location = implode(',' ,$locationArray);
        }
        return $location;
    }

/**
 * nextUpdate method
 *
 * @return string
 */
    protected function nextUpdate ($alert_id) {
        $next_update = '';
        if (!empty($alert_id) && $alert_id!=0) {
            $alerts      = Configure::read('AlertTerm');
            $term        = $alerts[$alert_id]['term'];
            $next_update = date("Y-m-d H:i:s", time() + $term);
        }
        return $next_update;
    }


    public function appError($error) {
        $this->redirect('/admin/', '301');
    }



}
