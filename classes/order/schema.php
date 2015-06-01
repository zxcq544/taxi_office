<?php
//TODO FieldAPI - arrival_address, destination_address
function __order_schema(&$schema) {
	$schema['taxi_office_orders'] = array(
			'description' => 'The base table of taxi_office_orders',
			'fields'      => array(
					'oid'              => array(
							'description' => 'Primary key',
							'type'        => 'serial',
							'not null'    => TRUE,
							'unsigned'    => TRUE,
					),
					'cabid'            => array(
							'description' => ' Reference cab',
							'type'        => 'int',
							'not null'    => TRUE,
							'unsigned'    => TRUE,
					),
					'description'      => array(
							'type'     => 'varchar',
							'length'   => 255,
							'not null' => FALSE,
					),
					'wakeup_date'      => array(
							'description' => 'wakeup date UNIX timestamp',
							'type'        => 'int',
							'not null' => FALSE,
							'unsigned'    => TRUE,
							'default'  => NULL,
					),
					'update_date'      => array(
							'description' => 'Update date UNIX timstamp',
							'type'        => 'int',
							//					   'length'=>,
							'not null'    => TRUE,
							'unsigned'    => TRUE,
					),
					'order_client_id'  => array(
							'description' => 'Reference client id',
							'type'        => 'int',
							//					   'length'=>,
							'not null'    => FALSE,
							'unsigned'    => TRUE,
							//					   'default'=>
					),
					'estimated_charge' => array(
							'description' => '',
							'type'        => 'numeric',
							'not null'    => TRUE,
							'unsigned'    => FALSE,
							'scale'       => 2,
							'precision'   => 32,
					),
					'sit_date'         => array(
							'description' => 'sit date unix timestamp',
							'type'        => 'int',
							'not null' => FALSE,
							'unsigned'    => TRUE,
							'default'  => NULL
					),
					'phone'            => array(
							'type'     => 'varchar',
							'length'   => 50,
							'not null' => FALSE,
					),
					'status'           => array(
							'description' => 'Reference order status ',
							'type'        => 'varchar',
							'length'      => 100,
							'not null'    => TRUE,
					),
					'charge'           => array(
							'description' => 'Charge',
							'type'        => 'numeric',
							'not null'    => TRUE,
							'unsigned'    => FALSE,
							'scale'       => 2,
							'precision'   => 32,
					),
					'tries'            => array(
							'description' => 'Tries',
							'type'        => 'int',
							'not null'    => TRUE,
							'unsigned'    => TRUE,
							'default'     => 0,
					),
					'created'          => array(
							'description' => 'Created date UNIX timestamp',
							'type'        => 'int',
							'not null'    => TRUE,
							'unsigned'    => TRUE,
					),
					'arrival_date'     => array(
							'description' => 'Arrival date',
							'type'        => 'int',
							'unsigned'    => TRUE,
					),
					'cashless'         => array(
							'description' => 'cashless',
							'type'        => 'int',
							'length'      => 1,
							'not null'    => TRUE,
							'unsigned'    => TRUE,
							'default'     => 0,
					),
					'did'              => array(
							'description' => 'Dispatcher id',
							'type'        => 'int',
							'not null'    => FALSE,
							'unsigned'    => TRUE,
					),
					'close_date'       => array(
							'description' => 'Close date unix timestamp',
							'type'        => 'int',
							'not null'    => FALSE,
							'unsigned'    => TRUE,
					),
					//					'destination'      => array(
					//							'description' => 'Destination address',
					//							'type'        => 'varchar',
					//							'length'      => 255,
					//							'not null'    => TRUE,
					//					),
					'legal_card'       => array(
							'type'     => 'varchar',
							'length'   => 255,
							'not null' => TRUE,
					),

			),
			'primary key' => array('oid'),
			//			'unique keys'=>array(),
	);
}