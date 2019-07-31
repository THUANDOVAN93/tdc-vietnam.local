<?php
App::uses('AppModel', 'Model');
/**
 * FactoryBuildingFactoryTenant Model
 *
 * @property FactoryBuilding $FactoryBuilding
 * @property FactoryTenant $FactoryTenant
 */
class FactoryBuildingFactoryTenant extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'factory_building_factory_tenant';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FactoryBuilding' => array(
			'className'  => 'FactoryBuilding',
			'foreignKey' => 'factory_building_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'FactoryTenant' => array(
			'className'  => 'FactoryTenant',
			'foreignKey' => 'factory_tenant_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)
	);
}
