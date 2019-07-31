<?php
App::uses('FrontController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class FrontContactController extends FrontController {

	public $name = 'FrontContact';
	public $uses = array(
		'ResidenceBuilding',
		'OfficeBuilding',
		'FactoryBuilding',
		'ContactResidence',
		'ContactOffice',
		'ContactFactory',
		'FactoryProperty',
	);

	public function beforeFilter() {
		parent::beforeFilter();

		$this->building = "residence";
		$this->tenantForms = null;
		$this->factorySubCategories = null;

		// フォーム種別の取得
		if (isset($this->params['building'])) {
			$this->building = $this->params['building'];
		}
		if ($this->building == "office") {
			$this->tenantForms = Configure::read('TenantForm');
			$this->set('tenantForms', $this->tenantForms);
		}
		if ($this->building == "factory") {
			$this->factorySubCategories = $this->FactoryProperty->FactorySubCategory->find('list');
			$this->set('factorySubCategories', $this->factorySubCategories);
		}
	}

	// お問い合わせ(入力)
	public function index() {
		$id = null;
		$back = false;

		// フォーム種別の取得
		if ($this->building == "factory") {
			$factorySubCategories1 = array();
			$factorySubCategories2 = array();
			foreach ($this->factorySubCategories as $key => $value) {
				if ($key == "5") {
					$factorySubCategories1[$key] = $value;
				}
				else {
					$factorySubCategories2[$key] = $value;
				}
			}
			$this->set(compact('factorySubCategories1'));
			$this->set(compact('factorySubCategories2'));
		}

		// 物件名の取得
		if (isset($this->params['id'])) {
			$id = $this->params['id'];
			if ($this->building == "residence") {
				$building_data = $this->ResidenceBuilding->findByIdAndVisible($id, '1');
				if (count($building_data) > 0) {
					$this->request->data['ContactResidence']['buildings_name'] = $building_data['ResidenceBuilding']['name'];
				}
			}
			elseif ($this->building == "office") {
				$building_data = $this->OfficeBuilding->findByIdAndVisible($id, '1');
				if (count($building_data) > 0) {
					$this->request->data['ContactOffice']['buildings_name'] = $building_data['OfficeBuilding']['name'];
				}
			}
			elseif ($this->building == "factory") {
				$building_data = $this->FactoryBuilding->findByIdAndVisible($id, '1');
				if (count($building_data) > 0) {
					$this->request->data['ContactFactory']['buildings_name'] = $building_data['FactoryBuilding']['name'];
				}
			}
		}

		// 入力内容の修正時
		if (isset($this->params['back'])) {
			$back = ($this->params['back'] == "back");
		}
		if ($back) {
			//セッションから入力情報を取得
			$this->request->data = $this->Session->read('FrontContactController.InputValue');
		}

		//画面表示
		$this->PageRender->render($this->building.'_index');
	}

	// お問い合わせ(確認)
	public function confirm() {
		if (!($this->request->is('post'))) {
			return $this->index();
		}

		// フォーム種別の取得
		if ($this->building == "factory") {
			$factorySubCategories1 = array();
			$factorySubCategories2 = array();
			foreach ($this->factorySubCategories as $key => $value) {
				if ($key == "5") {
					$factorySubCategories1[$key] = $value;
				}
				else {
					$factorySubCategories2[$key] = $value;
				}
			}
			$this->set(compact('factorySubCategories1'));
			$this->set(compact('factorySubCategories2'));
		}

		//セッションから入力情報を取得
		$data = $this->Session->read('FrontContactController.InputValue');
		$this->request->data = Set::merge($data, $this->request->data);

		//入力チェック
		if ($this->building == "residence") {
			$this->ContactResidence->set($this->request->data);
			$valid = $this->ContactResidence->validates();
			if (!$valid) {
				$this->set('$contactError', true);
				$this->set('contact', $this->request->data['ContactResidence']);
				$validError['ContactResidence'] = $this->ContactResidence->validationErrors;
				$this->set('validErrors', $validError);
				return $this->index();
			}

			//確認画面表示用に編集
			$this->set('contact', $this->request->data['ContactResidence']);
		}
		elseif ($this->building == "office") {
			$this->ContactOffice->set($this->request->data);
			$valid = $this->ContactOffice->validates();
			if (!$valid) {
				$this->set('$contactError', true);
				$this->set('contact', $this->request->data['ContactOffice']);
				$validError['ContactOffice'] = $this->ContactOffice->validationErrors;
				$this->set('validErrors', $validError);
				return $this->index();
			}

			//確認画面表示用に編集
			$this->set('contact', $this->request->data['ContactOffice']);
		}
		elseif ($this->building == "factory") {
			$this->ContactFactory->set($this->request->data);
			$valid = $this->ContactFactory->validates();
			if (!$valid) {
				$this->set('$contactError', true);
				$this->set('contact', $this->request->data['ContactFactory']);
				$validError['ContactFactory'] = $this->ContactFactory->validationErrors;
				$this->set('validErrors', $validError);
				return $this->index();
			}

			// ラジオボタンの選択によって不要な値をクリア
			if (isset($this->request->data['ContactFactory']['factory_sub_category']) && $this->request->data['ContactFactory']['factory_sub_category'] == "5") {
				$this->request->data['ContactFactory']['floor_space_building'] = "";
				$this->request->data['ContactFactory']['weight_limit'] = "";
				$this->request->data['ContactFactory']['building_height'] = "";
			}
			else {
				$this->request->data['ContactFactory']['floor_space_site'] = "";
			}

			//確認画面表示用に編集
			$this->set('contact', $this->request->data['ContactFactory']);
		}

		//入力情報をセッションへ登録
		$this->Session->write('FrontContactController.InputValue', $this->request->data);

		//画面表示
		$this->PageRender->render($this->building . '_confirm');
	}

	// お問い合わせ(完了)
	public function complete() {
		if (!($this->request->is('post'))) {
			return $this->index();
		}

		// セッションから入力を取得
		$data = $this->Session->read('FrontContactController.InputValue');
		if(!$data) {
			return $this->index();
		}

		//メールの送信
		if ($this->request->is('post')) {
			$admin_email = "info@tdc-thai.com";
			
			$category = "";
			if ($this->building == "residence") {
				$category = "Residence";
				$category_txt = "住まい";
			}
			elseif ($this->building == "office") {
				$category = "Office";
				$category_txt = "事務所";
			}
			elseif ($this->building == "factory") {
				$category = "Factory";
				$category_txt = "工場・工業用地";
			}

			$ary_vars = array (
				'contact' => $this->request->data['Contact'.$category],
				'tenantForms' => $this->tenantForms,
				'factorySubCategories' => $this->factorySubCategories,
			);

			try {
				// 管理者宛
				$email = new CakeEmail('contact'); //$contactの設定を読み込みます。
				$email->template('contact_'.$this->building.'_admin');
				$email->viewVars($ary_vars); //送信内容をテンプレートファイルに渡します
				$email->from($this->request->data['Contact'.$category]['email']);
				$email->to($admin_email);
				$email->subject($category_txt.'のお問い合わせ');
				if($email->send()){
	//				echo "送信できた";
				}

				// お客様宛
				$email = new CakeEmail('contact'); //$contactの設定を読み込みます。
				$email->template('contact_'.$this->building.'_customer');
				$email->viewVars($ary_vars); //送信内容をテンプレートファイルに渡します
				$email->from($admin_email);
				$email->to($this->request->data['Contact'.$category]['email']);
				$email->subject('【TDC】'.$category_txt.'お問い合わせありがとうございます。');
				if($email->send()){
	//				echo "送信できた";
				}
			} catch (Exception $e) {
	//			echo "例外キャッチ：", $e->getMessage();
			}
		}

		//セッションキー再発行(F5対応)
		$this->Session->write('FrontContactController.InputValue', null);

		//画面表示
		$this->PageRender->render($this->building . '_complete');
	}
}
?>