<?php
App::uses('FactoryCategory', 'Model');

/**
 * FactoryCategory Test Case
 *
 */
class FactoryCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factory_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactoryCategory = ClassRegistry::init('FactoryCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactoryCategory);

		parent::tearDown();
	}

}
