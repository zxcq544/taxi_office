<?php

//todo создать поле адрес прописки для персоны, адрес фактический для driver, время начала работы для диспетчера,  время оканчания для диспетчера, внутренний номер телефона диспетчера
//todo поле блокирован для водителя

function __person_schema(&$schema) {
	$schema['taxi_office_persons'] = array(
			'description' => 'The base table of taxi_office_persons',
			'fields'      => array(
					'uid'                  => array(
							'description' => 'user reference',
							'type'        => 'int',
							'not null'    => TRUE,
							'unsigned'    => TRUE,
					),
					'name'                 => array(
							'type'     => 'varchar',
							'length'   => 100,
							'default'  => NULL,
							'not null' => FALSE
					),
					'second_name'          => array(
							'type'     => 'varchar',
							'length'   => 100,
							'default'  => NULL,
							'not null' => FALSE
					),
					'surname'              => array(
							'type'     => 'varchar',
							'length'   => 100,
							'default'  => NULL,
							'not null' => FALSE
					),
					'family'               => array(
							'description' => '?семейное положение',
							'type'        => 'varchar',
							'length'      => 100,
							'not null'    => FALSE
					),
					'phone'                => array(
							'type'     => 'varchar',
							'length'   => 100,
							'default'  => NULL,
							'not null' => FALSE
					),

					'passport_number'      => array(
							'description' => 'номер паспорта',
							'type'        => 'varchar',
							'length'      => 100,
							'not null'    => FALSE
					),
					'passport_series'      => array(
							'description' => 'Серия паспорта',
							'type'        => 'varchar',
							'length'      => 100,
							'not null'    => FALSE
					),
					'passport_issued'      => array(
							'description' => 'Кем выдан',
							'type'        => 'varchar',
							'length'      => 255,
							'not null'    => FALSE
					),
					'passport_code'        => array(
							'description' => 'Код подразделения',
							'type'        => 'varchar',
							'length'      => 255,
							'not null'    => FALSE
					),
					'passport_issued_date' => array(
							'description' => 'unix timestamp',
							'type'        => 'int',
							'default'     => NULL,
							'not null'    => FALSE,
							'unsigned'    => FALSE
					),
					'birthday'             => array(
							'description' => 'unix timestamp',
							'type'        => 'int',
							'default'     => NULL,
							'not null'    => FALSE,
							'unsigned'    => FALSE
					),
					'type'                 => array(
							'type'     => 'varchar',
							'length'   => 20,
							'not null' => TRUE
					),
					'hire_date'            => array(
							'description' => 'unix time stamp дата найма',
							'type'        => 'int',
							'not null'    => TRUE,
							'unsigned'    => FALSE,
					),
					'fire_date'            => array(
							'description' => 'unix time stamp дата увольнения',
							'type'        => 'int',
							'default'     => NULL,
							'not null'    => FALSE,
							'unsigned'    => FALSE,
					),
					'callsign'             => array(
							'type'     => 'varchar',
							'length'   => 255,
							'default'  => NULL,
							'not null' => FALSE
					),
					'mobile'               => array(
							'type'     => 'varchar',
							'length'   => 100,
							'default'  => NULL,
							'not null' => FALSE,
					),


			),
			'primary key' => array('uid'),
	);
}