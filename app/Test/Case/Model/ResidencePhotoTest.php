<?php
App::uses('ResidencePhoto', 'Model');

/**
 * ResidencePhoto Test Case
 *
 */
class ResidencePhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.residence_photo',
		'app.residence_building',
		'app.residence_category',
		'app.area'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResidencePhoto = ClassRegistry::init('ResidencePhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResidencePhoto);

		parent::tearDown();
	}

}
