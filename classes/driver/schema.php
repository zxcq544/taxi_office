<?php
///**
// * Created by PhpStorm.
// * User: eduard
// * Date: 26.05.15
// * Time: 17:00
// */
////todo address field для водителя
//function __driver_schema(&$schema) {
//	$schema['taxi_office_drivers'] = array(
//			'description' => 'The base table of taxi_office_drivers',
//			'fields'      => array(
//					'uid'  => array(
//							'description' => 'Reference uid',
//							'type'        => 'int',
//							'not null'    => TRUE,
//							'unsigned'    => TRUE,
//					),
//					'phid' => array(
//							'description' => 'file photo reference',
//							'type'        => 'int',
//							'not null'    => FALSE,
//							'unsigned'    => TRUE,
//					),
//					'blocked'=>array(
//					   'type'=>'int',
//					   'length'=>1,
//					   'not null'=> TRUE,
//					   'unsigned'=> TRUE,
//					),
//					'enabled' => array(
//							'type'     => 'int',
//							'length'   => 1,
//							'not null' => TRUE,
//							'unsigned' => TRUE,
//					),
//			),
//			'primary key' => array(),
//			'unique keys' => array(),
//	);
//}