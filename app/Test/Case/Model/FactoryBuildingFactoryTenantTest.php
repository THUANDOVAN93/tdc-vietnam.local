<?php
App::uses('FactoryBuildingFactoryTenant', 'Model');

/**
 * FactoryBuildingFactoryTenant Test Case
 *
 */
class FactoryBuildingFactoryTenantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factory_building_factory_tenant',
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
		$this->FactoryBuildingFactoryTenant = ClassRegistry::init('FactoryBuildingFactoryTenant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactoryBuildingFactoryTenant);

		parent::tearDown();
	}

}
