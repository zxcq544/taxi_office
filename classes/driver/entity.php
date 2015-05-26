<?php
///**
// * Created by PhpStorm.
// * User: eduard
// * Date: 26.05.15
// * Time: 17:00
// */
//
//function __driver_entity(&$entity) {
//	$entity['driver'] = array(
//			'label'            => "Водитель",
//			'plural label'     => "Водители",
//			'label callback'   => 'entity_class_label',
//			'uri callback'     => 'entity_class_uri',
//			'access callback'  => 'driver_access',
////			'bundles key'      => array('bundle' => 'bundle'),
//			'entity keys'      => array(
//					'id' => 'did',
//			),
//			'bundles'          => array(
//					'driver' => array(
//							'label'        => 'Водитель',
//							'plural label' => 'Водители',
//							'description'  => '',
//							'admin'        => array(
//									'path' => 'admin/drivers'
//							)
//					)
//			),
//			'description'      => '',
//			'entity class'     => 'DriverEntity',
//			'controller class' => 'DriverEntityController',
//			'fieldable'        => TRUE,
//
//			'admin ui'         => array(
//					'menu wildcard'    => '%',
//					'path'             => 'admin/',
//					'controller class' => 'DriverUIController'
//			),
//			'base table'       => 'taxi_office_drivers',
//			'view modes'       => array(
//					'full'   => array(
//							'label'           => t('Full'),
//							'custom settings' => TRUE,
//					),
//					'teaser' => array(
//							'label'           => t('Teaser'),
//							'custom settings' => TRUE,
//					),
//			),
//			'module'           => 'taxi_office',
//	);
//
//}