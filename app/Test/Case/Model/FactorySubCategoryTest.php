<?php
App::uses('FactorySubCategory', 'Model');

/**
 * FactorySubCategory Test Case
 *
 */
class FactorySubCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factory_sub_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FactorySubCategory = ClassRegistry::init('FactorySubCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FactorySubCategory);

		parent::tearDown();
	}

}
