<?php

function __car_entity(&$entity){
	$entity['car'] = array(
			'label'            => 'Машина',
			'plural label'     => 'Машины',
			'label callback'   => 'entity_class_label',
			'uri callback'     => 'entity_class_uri',
			'access callback'  => 'car_access',
			'bundles key'      => array(),
			'entity keys'      => array(
					'id' => 'cid',
			),
			'bundles'          => array(
					'car' => array(
							'label'        => 'Машина',
							'plural label' => 'Машины',
							'description'  => '',
							'admin'        => array(
									'path' => 'admin/cars'
							)
					)
			),
			'description'      => '',
			'entity class'     => 'CarEntity',
			'controller class' => 'CarEntityController',
			'fieldable'        => TRUE,
			'admin ui'         => array(
					'menu wildcard'    => '%car',
					'path'             => 'admin/cars',
					'controller class' => 'CarUIController'
			),
			'base table'       => 'taxi_office_cars',
			'view modes'       => array(
					'full'   => array(
							'label'           => t('Full'),
							'custom settings' => TRUE,
					),
					'teaser' => array(
							'label'           => t('Teaser'),
							'custom settings' => TRUE,
					),
			),
			'module'           => 'taxi_office',
	);
}