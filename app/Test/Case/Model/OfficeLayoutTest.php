<?php
App::uses('OfficeLayout', 'Model');

/**
 * OfficeLayout Test Case
 *
 */
class OfficeLayoutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.office_layout'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OfficeLayout = ClassRegistry::init('OfficeLayout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OfficeLayout);

		parent::tearDown();
	}

}
