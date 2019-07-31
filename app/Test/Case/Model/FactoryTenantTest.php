<?php
App::uses('FactoryTenant', 'Model');

/**
 * FactoryTenant Test Case
 *
 */
class FactoryTenantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factory_tenant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactoryTenant = ClassRegistry::init('FactoryTenant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactoryTenant);

		parent::tearDown();
	}

}
