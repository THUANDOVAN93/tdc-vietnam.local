<?php
App::uses('ResidenceLayout', 'Model');

/**
 * ResidenceLayout Test Case
 *
 */
class ResidenceLayoutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.residence_layout'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResidenceLayout = ClassRegistry::init('ResidenceLayout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResidenceLayout);

		parent::tearDown();
	}

}
