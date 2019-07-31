<?php
App::uses('FactoryProperty', 'Model');

/**
 * FactoryProperty Test Case
 *
 */
class FactoryPropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factory_property',
		'app.factory_building',
		'app.factory_category',
		'app.area',
		'app.factory_photo',
		'app.factory_tenant',
		'app.factory_building_factory_tenant',
		'app.factory_sub_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactoryProperty = ClassRegistry::init('FactoryProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactoryProperty);

		parent::tearDown();
	}

}
