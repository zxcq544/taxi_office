<?php

function __call_entity(&$entity) {
	$entity['call'] = array(
			'label'            => 'Звонок',
			'plural label'     => 'Звонки',
			'description'      => 'ВХодящие звонки',
			'label callback'   => 'entity_class_label',
			'uri callback'     => 'entity_class_uri',
			'access callback'  => 'taxi_office_call_access',
			'bundles key'      => array(),
			'entity keys'      => array('id' => 'id'),
			'bundles'          => array(),
			'entity class'     => 'CallEntity',
			'controller class' => 'CallEntityController',
			'fieldable'        => FALSE,
			'admin ui'         => array(
					'path'             => 'admin/calls',
					'controller class' => 'EntityDefaultUIController'
			),
			'base table'       => 'taxi_office_calls',
			'view modes'       => array(),
			'module'           => 'taxi_office',
	);
}