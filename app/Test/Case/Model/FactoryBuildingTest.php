<?php
App::uses('FactoryBuilding', 'Model');

/**
 * FactoryBuilding Test Case
 *
 */
class FactoryBuildingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factory_building',
		'app.factory_category',
		'app.area',
		'app.factory_photo',
		'app.factory_tenant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactoryBuilding = ClassRegistry::init('FactoryBuilding');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactoryBuilding);

		parent::tearDown();
	}

}
