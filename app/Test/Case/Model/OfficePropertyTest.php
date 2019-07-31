<?php
App::uses('OfficeProperty', 'Model');

/**
 * OfficeProperty Test Case
 *
 */
class OfficePropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.office_property',
		'app.office_building',
		'app.office_category',
		'app.area',
		'app.station',
		'app.line',
		'app.office_photo',
		'app.office_layout'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OfficeProperty = ClassRegistry::init('OfficeProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OfficeProperty);

		parent::tearDown();
	}

}
