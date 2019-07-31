<?php
App::uses('OfficePhoto', 'Model');

/**
 * OfficePhoto Test Case
 *
 */
class OfficePhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.office_photo',
		'app.office_building'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OfficePhoto = ClassRegistry::init('OfficePhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OfficePhoto);

		parent::tearDown();
	}

}
