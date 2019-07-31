<?php
App::uses('OfficeBuilding', 'Model');

/**
 * OfficeBuilding Test Case
 *
 */
class OfficeBuildingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.office_building',
		'app.alert',
		'app.office_category',
		'app.area',
		'app.station1',
		'app.station2',
		'app.station3',
		'app.office_photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OfficeBuilding = ClassRegistry::init('OfficeBuilding');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OfficeBuilding);

		parent::tearDown();
	}

}
