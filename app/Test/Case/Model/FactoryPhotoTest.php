<?php
App::uses('FactoryPhoto', 'Model');

/**
 * FactoryPhoto Test Case
 *
 */
class FactoryPhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factory_photo',
		'app.factory_building'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactoryPhoto = ClassRegistry::init('FactoryPhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactoryPhoto);

		parent::tearDown();
	}

}
