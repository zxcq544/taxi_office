<?php

$schema['taxi_office_cars'] = array(
		'description' => 'The base table of taxi_office_cars',
		'fields'      => array(
				'cid'         => array(
						'description' => 'Primary key',
						'type'        => 'serial',
						'not null'    => TRUE,
						'unsigned'    => TRUE,
				),
				'rating'      => array(
						'description' => 'Rating',
						'type'        => 'int',
						'length'      => 3,
						'not null'    => TRUE,
						'unsigned'    => TRUE,
						'default'     => 0
				),
				'body'        => array(
						'type'     => 'varchar',
						'length'   => 255,
						'not null' => FALSE,
				),
				'pension_off' => array(
						'description' => 'дата выыхода на пенсию unix timestamp',
						'type'        => 'int',
						'not null'    => FALSE,
						'unsigned'    => TRUE,
						//				   'default'=>
				),
				'owner'       => array(
						'description' => 'Owner',
						'type'        => 'varchar',
						'not null'    => TRUE,
						'length'      => 100
				),
				'vin'         => array(
						'type'     => 'varchar',
						'length'   => 20,
						'not null' => TRUE
				),
				'num'         => array(
						'type'     => 'varchar',
						'length'   => 50,
						'not null' => FALSE
				),
				'color'       => array(
						'type'     => 'varchar',
						'length'   => 100,
						'not null' => FALSE,
				),
				'kinds'       => array(
						'description' => 'Виды кузова',
						'type'        => 'varchar',
						'not null'    => TRUE,
						'unsigned'    => TRUE,
				),
				'car_size'    => array(
						'type'     => 'varchar',
						'length'   => 100,
						'not null' => TRUE,
				),
				'model'       => array(
						'type'     => 'varchar',
						'length'   => 255,
						'not null' => TRUE,
				),
				'year'        => array(
						'description' => 'Год выпуска машины',
						'type'        => 'int',
						'length'      => 4,
						'not null'    => TRUE,
						'unsigned'    => TRUE,
				),
				'phid'        => array(
						'description' => 'сылка на фото',
						'type'        => 'int',
						'not null'    => FALSE,
						'unsigned'    => TRUE,
				),

		),
		'primary key' => array('cid'),

);
?>