<?php
App::uses('OfficeCategory', 'Model');

/**
 * OfficeCategory Test Case
 *
 */
class OfficeCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.office_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OfficeCategory = ClassRegistry::init('OfficeCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OfficeCategory);

		parent::tearDown();
	}

}
