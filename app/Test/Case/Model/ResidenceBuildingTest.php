<?php
App::uses('ResidenceBuilding', 'Model');

/**
 * ResidenceBuilding Test Case
 *
 */
class ResidenceBuildingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.residence_building',
		'app.residence_category',
		'app.area',
		'app.residence_photo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResidenceBuilding = ClassRegistry::init('ResidenceBuilding');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResidenceBuilding);

		parent::tearDown();
	}

}
