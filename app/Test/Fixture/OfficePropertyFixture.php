<?php
/**
 * OfficePropertyFixture
 *
 */
class OfficePropertyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'office_building_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'visible' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'sale_or_rent' => array('type' => 'integer', 'null' => false, 'default' => null),
		'floor' => array('type' => 'integer', 'null' => false, 'default' => null),
		'office_layout_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'floor_space' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '7,3'),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null),
		'notes' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'drowing' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'office_building_id' => 1,
			'visible' => 1,
			'sale_or_rent' => 1,
			'floor' => 1,
			'office_layout_id' => 1,
			'floor_space' => 1,
			'price' => 1,
			'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'drowing' => 'Lorem ipsum dolor sit amet'
		),
	);

}
