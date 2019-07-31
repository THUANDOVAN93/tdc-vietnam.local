<?php
/**
 * FactoryBuildingFactoryTenantFixture
 *
 */
class FactoryBuildingFactoryTenantFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'factory_building_factory_tenant';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'factory_building_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'factory_tenant_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'factory_building_id' => 1,
			'factory_tenant_id' => 1
		),
	);

}
