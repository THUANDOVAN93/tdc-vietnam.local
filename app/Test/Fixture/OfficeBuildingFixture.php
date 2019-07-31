<?php
/**
 * OfficeBuildingFixture
 *
 */
class OfficeBuildingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'alert_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => null),
		'office_category_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'geolocation' => array('type' => 'text', 'null' => true, 'default' => null),
		'station1_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'station2_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'station3_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'access' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'complated' => array('type' => 'integer', 'null' => true, 'default' => null),
		'height' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_floor' => array('type' => 'integer', 'null' => true, 'default' => null),
		'elevator' => array('type' => 'integer', 'null' => true, 'default' => null),
		'lift' => array('type' => 'integer', 'null' => true, 'default' => null),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'around' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'proprietary' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nearby' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'recommend' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'popluar' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'newly' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'together' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'canteen' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'store' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'cafe' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'shared_pantry' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'restaurant' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'fitness' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'parking' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'security' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'meeting_room' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'internet' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'air_conditioner' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'electricity' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'water_supply' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telephone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'management_cost' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'facilities' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'alert_id' => 1,
			'priority' => 1,
			'office_category_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'area_id' => 1,
			'geolocation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'station1_id' => 1,
			'station2_id' => 1,
			'station3_id' => 1,
			'access' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'complated' => 1,
			'height' => 1,
			'total_floor' => 1,
			'elevator' => 1,
			'lift' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'around' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'proprietary' => 'Lorem ipsum dolor sit amet',
			'nearby' => 1,
			'recommend' => 1,
			'popluar' => 1,
			'newly' => 1,
			'together' => 'Lorem ipsum dolor sit amet',
			'canteen' => 1,
			'store' => 1,
			'cafe' => 1,
			'shared_pantry' => 1,
			'restaurant' => 1,
			'fitness' => 1,
			'parking' => 'Lorem ipsum dolor sit amet',
			'security' => 'Lorem ipsum dolor sit amet',
			'meeting_room' => 'Lorem ipsum dolor sit amet',
			'internet' => 'Lorem ipsum dolor sit amet',
			'air_conditioner' => 'Lorem ipsum dolor sit amet',
			'electricity' => 'Lorem ipsum dolor sit amet',
			'water_supply' => 'Lorem ipsum dolor sit amet',
			'telephone' => 'Lorem ipsum dolor sit amet',
			'management_cost' => 'Lorem ipsum dolor sit amet',
			'facilities' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2013-01-17 15:01:40',
			'updated' => '2013-01-17 15:01:40'
		),
	);

}
