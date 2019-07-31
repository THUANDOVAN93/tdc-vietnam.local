<?php
App::uses('ResidenceCategory', 'Model');

/**
 * ResidenceCategory Test Case
 *
 */
class ResidenceCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.residence_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResidenceCategory = ClassRegistry::init('ResidenceCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResidenceCategory);

		parent::tearDown();
	}

}
