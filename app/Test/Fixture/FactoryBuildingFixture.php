<?php
/**
 * FactoryBuildingFixture
 *
 */
class FactoryBuildingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'alert_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => null),
		'factory_category_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'boi_zone' => array('type' => 'integer', 'null' => false, 'default' => null),
		'giz' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'epz' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'fz' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'iate' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'developer' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'geolocation' => array('type' => 'text', 'null' => true, 'default' => null),
		'altitude' => array('type' => 'integer', 'null' => true, 'default' => null),
		'complated' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'develop_area' => array('type' => 'integer', 'null' => true, 'default' => null),
		'from_bangkok' => array('type' => 'integer', 'null' => true, 'default' => null),
		'from_suvarnabhumi' => array('type' => 'integer', 'null' => true, 'default' => null),
		'from_laemchabang' => array('type' => 'integer', 'null' => true, 'default' => null),
		'from_donmueang' => array('type' => 'integer', 'null' => true, 'default' => null),
		'from_khlongtoei' => array('type' => 'integer', 'null' => true, 'default' => null),
		'from_maptaphut' => array('type' => 'integer', 'null' => true, 'default' => null),
		'recommend' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'popluar' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'newly' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'bank' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'hotel' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'apart' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'restaurant' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'golfpark' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'hospital' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'shopping_center' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'telephone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'internet' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'electricity' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'waterworks' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sewer' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'plant' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'reservoir' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'natural_gas' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'steam' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'highway' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'management_cost' => array('type' => 'integer', 'null' => true, 'default' => null),
		'facilities' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'next_update' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'factory_category_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'boi_zone' => 1,
			'giz' => 1,
			'epz' => 1,
			'fz' => 1,
			'iate' => 1,
			'developer' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'area_id' => 1,
			'geolocation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'altitude' => 1,
			'complated' => 'Lorem ipsum dolor sit amet',
			'develop_area' => 1,
			'from_bangkok' => 1,
			'from_suvarnabhumi' => 1,
			'from_laemchabang' => 1,
			'from_donmueang' => 1,
			'from_khlongtoei' => 1,
			'from_maptaphut' => 1,
			'recommend' => 1,
			'popluar' => 1,
			'newly' => 1,
			'bank' => 1,
			'hotel' => 1,
			'apart' => 1,
			'restaurant' => 1,
			'golfpark' => 1,
			'hospital' => 1,
			'shopping_center' => 1,
			'telephone' => 'Lorem ipsum dolor sit amet',
			'internet' => 'Lorem ipsum dolor sit amet',
			'electricity' => 'Lorem ipsum dolor sit amet',
			'waterworks' => 'Lorem ipsum dolor sit amet',
			'sewer' => 'Lorem ipsum dolor sit amet',
			'plant' => 'Lorem ipsum dolor sit amet',
			'reservoir' => 'Lorem ipsum dolor sit amet',
			'natural_gas' => 'Lorem ipsum dolor sit amet',
			'steam' => 'Lorem ipsum dolor sit amet',
			'highway' => 'Lorem ipsum dolor sit amet',
			'management_cost' => 1,
			'facilities' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-01-18 23:36:48',
			'updated' => '2013-01-18 23:36:48',
			'next_update' => '2013-01-18 23:36:48'
		),
	);

}
