<?php
App::uses('ResidenceProperty', 'Model');

/**
 * ResidenceProperty Test Case
 *
 */
class ResidencePropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.residence_property',
		'app.residence_building',
		'app.residence_category',
		'app.area',
		'app.alert',
		'app.station',
		'app.line',
		'app.residence_photo',
		'app.residence_layout'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResidenceProperty = ClassRegistry::init('ResidenceProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResidenceProperty);

		parent::tearDown();
	}

}
