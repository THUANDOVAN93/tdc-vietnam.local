<?php
App::uses('AdminController', 'Controller');
/**
 * Stations Controller
 *
 * @property Station $Station
 */
class StationsController extends AdminController {

/**
 * paginate
 *
 * @var array
 */
    public $paginate = array(
        'sort' => 'id'
    );

/**
 * Uses
 *
 * @var array
 */
    public $uses = array('Station', 'Line');

/**
 * beforeFilter
 *
 * @return void
 */
    public function beforeFilter() {
        parent::beforeFilter();
        if (empty($this->roleAdmin)) {
            $this->Session->setFlash(Configure::read('Admin.Message.AuthFailed'), 'alert', array('class' => 'alert-error'),'auth-alert');
            $this->redirect('/admin/');
        }

        $this->set('title_for_layout', sprintf(Configure::read('Admin.Message.Title'), '駅管理'));
    }

/**
 * getLocalFilePath method
 *
 * @return string
 */
    private function getLocalFilePath($id) {
        // マップ画像のファイルパスを取得する
        $result = $this->Station->findById($id);
        $url_path = $result['Station']['map'];
        if (!empty($url_path)) {
            $url_path = Configure::read('UploadSavePath') . $this->name .'/' . $url_path;
        }
        return $url_path;
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Station->recursive = 0;
        $this->set('stations', $this->paginate());
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {

        if ($this->request->is('post')) {

            $this->Station->create();

            // ファイルアップロード
            $image_path = $this->fileUpload($this->request->data['Station']['map']['tmp_name'], $this->request->data['Station']['map']['name']);
            unset($this->request->data['Station']['map']);
            $this->request->data['Station']['map'] = $image_path;

            if ($this->Station->save($this->request->data)) {
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {

                // 位置情報を再設定
                $stationData = $this->request->data;
                $stationData['Station']['lat_disabled'] = $stationData['Station']['lat'];
                $stationData['Station']['lng_disabled'] = $stationData['Station']['lng'];
                $this->request->data = $stationData;

                $validErrors = $this->Station->validationErrors;

                // 入力エラーの為、アップロードをキャンセル
                if (!empty($image_path)) {

                    //画像を削除
                    $fileName = $this->request->data['Station']['map'];
                    $filePath = Configure::read('UploadSavePath') . $this->name . '/' . $fileName;
                    if (!empty($filePath) && is_file($filePath)) {
                        unlink($filePath);
                    }
                    $validErrors['map'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                }

                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        }
        $lines = $this->Station->Line->find('list');
        $this->set(compact('lines'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {

        $this->Station->id = $id;
        if (!$this->Station->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            // ファイルアップロード
            $image_path = $this->fileUpload($this->request->data['Station']['new_map']['tmp_name'], $this->request->data['Station']['new_map']['name']);
            unset($this->request->data['Station']['new_map']);
            if (!empty($image_path)) {
                //ファイル上書き
                $this->request->data['Station']['map'] = $image_path;
            }

            // 古い画像のファイルパスを取得
            $filepath = $this->getLocalFilePath($id);

            if ($this->Station->save($this->request->data)) {
                //古い画像を削除
                if (!empty($image_path)) {
                    if (!empty($filepath) && is_file($filepath)) {
                        unlink($filepath);
                    }
                }
                $this->Session->setFlash(Configure::read('Admin.Message.DbUpdateSuccess'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {

                // 位置情報を再設定
                $stationData = $this->request->data;
                $stationData['Station']['lat_disabled'] = $stationData['Station']['lat'];
                $stationData['Station']['lng_disabled'] = $stationData['Station']['lng'];
                $this->request->data = $stationData;

                $validErrors = $this->Station->validationErrors;

                // 入力エラーの為、アップロードをキャンセル
                if (!empty($image_path)) {

                    //画像を削除
                    $fileName = $this->request->data['Station']['map'];
                    $filePath = Configure::read('UploadSavePath') . $this->name . '/' . $fileName;
                    if (!empty($filePath) && is_file($filePath)) {
                        unlink($filePath);
                    }

                    //DBのファイル名を表示
                    $dbData = $this->Station->findById($id);
                    $this->request->data['Station']['map'] = $dbData['Station']['map'];

                    $validErrors['map'][0] = Configure::read('Admin.Message.ValidateErrorPhotoCancel');
                }

                $this->set('validErrors', $validErrors);
                $this->Session->setFlash(Configure::read('Admin.Message.ValidateError'), 'alert', array('class' => 'alert alert-error'));
            }
        } else {

            //初期表示
            $stationData = $this->Station->read(null, $id);
            $stationData['Station']['lat_disabled'] = $stationData['Station']['lat'];
            $stationData['Station']['lng_disabled'] = $stationData['Station']['lng'];

            $this->request->data = $stationData;
        }

        $lines = $this->Station->Line->find('list');
        $this->set(compact('lines'));
    }

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {

        if (!$this->request->is('post')) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        $this->Station->id = $id;
        if (!$this->Station->exists()) {
            $this->Session->setFlash(Configure::read('Admin.Message.AccessDataNotFound'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('action' => 'index'));
        }

        // マップ画像のファイルパスを取得する
        $filepath = $this->getLocalFilePath($id);

        try {
            $result = $this->Station->delete();
        } catch (PDOException $e) {
            $result = false;
            if ($e->getCode() == Configure::read('MySql.ErrorCode.ForeignKey')) {
                $data = $this->Station->read('name');
                $dataName = $data['Station']['name'];
                $this->Session->setFlash(sprintf(Configure::read('Admin.Message.DbDeleteFailedForeignKey'), $dataName), 'alert', array('class' => 'alert alert-error'));
                $this->redirect(array('action' => 'index'));
            }
        }

        if ($result) {
            // ファイル削除
            if (!empty($filepath) && is_file($filepath)) {
                unlink($filepath);
            }

            $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteSuccess'), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(Configure::read('Admin.Message.DbDeleteFailed'), 'alert', array('class' => 'alert alert-error'));
        $this->redirect(array('action' => 'index'));
    }
}
