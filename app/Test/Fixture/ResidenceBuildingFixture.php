<?php
/**
 * ResidenceBuildingFixture
 *
 */
class ResidenceBuildingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'residence_category_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'geolocation' => array('type' => 'text', 'null' => true, 'default' => null),
		'access' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'complated' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_floor' => array('type' => 'integer', 'null' => true, 'default' => null),
		'total_room' => array('type' => 'integer', 'null' => true, 'default' => null),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'around' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nearby' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'recommend' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'popluar' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'newly' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'alert' => array('type' => 'integer', 'null' => true, 'default' => null),
		'priority' => array('type' => 'integer', 'null' => true, 'default' => null),
		'pool' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'gym' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'sauna' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'tennis_court' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'playground' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'laundry' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'store' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'kitchen' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'washer' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'maid_room' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'keep_pet' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'security' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'parking' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'internet' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'satellite_broadcasting' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'service' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'electricity' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'water_supply' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telephone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cookstove' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'management_cost' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'facilities' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'residence_category_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'area_id' => 1,
			'geolocation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'access' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'complated' => 1,
			'total_floor' => 1,
			'total_room' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'around' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'nearby' => 1,
			'recommend' => 1,
			'popluar' => 1,
			'newly' => 1,
			'created' => '2013-01-08 16:58:33',
			'updated' => '2013-01-08 16:58:33',
			'alert' => 1,
			'priority' => 1,
			'pool' => 1,
			'gym' => 1,
			'sauna' => 1,
			'tennis_court' => 1,
			'playground' => 1,
			'laundry' => 1,
			'store' => 1,
			'kitchen' => 1,
			'washer' => 1,
			'maid_room' => 1,
			'keep_pet' => 1,
			'security' => 1,
			'parking' => 1,
			'internet' => 1,
			'satellite_broadcasting' => 1,
			'service' => 'Lorem ipsum dolor sit amet',
			'electricity' => 'Lorem ipsum dolor sit amet',
			'water_supply' => 'Lorem ipsum dolor sit amet',
			'telephone' => 'Lorem ipsum dolor sit amet',
			'cookstove' => 'Lorem ipsum dolor sit amet',
			'management_cost' => 'Lorem ipsum dolor sit amet',
			'facilities' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
