<?php
App::uses('AppHelper', 'View/Helper');
class CommonHelper extends AppHelper {
	public function doubleVal($val) {
		return ceil((double)$val);
	}
}