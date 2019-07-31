<?php 
/*
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $areas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'location' => array('type' => 'text', 'null' => true, 'default' => null),
		'map' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $cake_sessions = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'expires' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	public $factory_building_factory_tenant = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'factory_building_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'factory_tenant_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $factory_buildings = array(
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
	public $factory_categories = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $factory_photos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'path' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'caption' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'factory_building_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	public $factory_properties = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'factory_building_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'visible' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'factory_sub_category_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'floor' => array('type' => 'integer', 'null' => false, 'default' => null),
		'floor_space' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,3'),
		'site_area' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,3'),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null),
		'notes' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'arrangement_plan' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'drowing' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	public $factory_sub_categories = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $factory_tenants = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $lines = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $office_buildings = array(
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
		'management_cost' => array('type' => 'integer', 'null' => true, 'default' => null),
		'facilities' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'next_update' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $office_categories = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $office_layouts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $office_photos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'path' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'caption' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'office_building_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	public $office_properties = array(
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
	public $residence_buildings = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'residence_category_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'geolocation' => array('type' => 'text', 'null' => true, 'default' => null),
		'access' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'station1_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'station2_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'station3_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
		'next_update' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'alert_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
		'management_cost' => array('type' => 'integer', 'null' => true, 'default' => null),
		'facilities' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $residence_categories = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $residence_layouts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $residence_photos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'path' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'caption' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'residence_building_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	public $residence_properties = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'residence_building_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'residence_layout_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'visible' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'sale_or_rent' => array('type' => 'integer', 'null' => false, 'default' => null),
		'floor' => array('type' => 'integer', 'null' => false, 'default' => null),
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
	public $roles = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'role_admin' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'role_manager' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'role_staff' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $stations = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'line_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'location' => array('type' => 'text', 'null' => true, 'default' => null),
		'map' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
	public $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);
}
*/