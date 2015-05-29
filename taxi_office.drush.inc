<?php

function taxi_office_drush_command() {
	return array(
			'taxi-noice'        => array(
					'description' => 'Noice mzfk',
			),
			'taxi-noice-shutup' => array(
					'description' => 'Shut up mzfk',
			),
	);
}

function drush_taxi_office_taxi_noice() {
	$dispatchers = _taxi_office_get_dispatcher_uids();
	$drivers = _taxi_office_get_driver_uids();
	$cars = _taxi_office_get_cars_ids();
	$second_names = array(
			'Иванова',
			'Петрова',
			'Сидорова',
			'Коза',
			'Матвева',
			'Макакина',
	);
	$thrid_names = array(
			'Ивановна',
			'Петровна',
			'Сидоровна',
			'Матвевна',
	);
	$famity = array(
			'Холост',
			'Замуж',
			'Вдова',
	);
	echo 'Noice dispatchers' . PHP_EOL;
	echo '-----------------' . PHP_EOL;
	for ($i = $dispatchers[0]; $i <= $dispatchers[1]; $i++) {
		$exist = (bool)(db_select('users', 'u')
				->condition('uid', $i)
				->countQuery()
				->execute()
				->fetchField());
		if (!$exist) {
			$field = array(
					'uid'    => $i,
					'name'   => 'dispatcher-' . $i,
					'mail'   => 'dispatcher-' . $i . '@taxi.com',
					'pass'   => 'dispatcher-' . $i,
					'status' => 1,
					'init'   => 'email address',
					'roles'  => array(
							DRUPAL_AUTHENTICATED_RID => 'authenticated user',
					),
			);
			user_save('', $field);
			$values = array(
					'uid'         => $i,
					'type'        => 'dispatcher',
					'name'        => 'dispatcher-' . $i,
					'second_name' => array_rand($second_names),
					'surname'     => array_rand($thrid_names),
					'family'      => array_rand($famity),
					'hire_date'   => time(),
			);
			$dispatcher = entity_create('person', $values);
			entity_save('person', $dispatcher);
			echo 'Created dispatcher #' . $i . PHP_EOL;
		}
	}
	echo PHP_EOL . 'Noice drivers' . PHP_EOL;
	echo '-------------' . PHP_EOL;
	for ($i = $drivers[0]; $i < $drivers[1]; $i++) {
		$exist = (bool)(db_select('users', 'u')
				->condition('uid', $i)
				->countQuery()
				->execute()
				->fetchField());
		if (!$exist) {
			$field = array(
					'uid'    => $i,
					'name'   => 'driver-' . $i,
					'mail'   => 'driver-' . $i . '@taxi.com',
					'pass'   => 'driver-' . $i,
					'status' => 1,
					'init'   => 'email address',
					'roles'  => array(
							DRUPAL_AUTHENTICATED_RID => 'authenticated user',
					),
			);
			user_save('', $field);
			$values = array(
					'uid'         => $i,
					'type'        => 'driver',
					'name'        => 'driver-' . $i,
					'second_name' => array_rand($second_names),
					'surname'     => array_rand($thrid_names),
					'family'      => array_rand($famity),
					'hire_date'   => time(),
			);
			$dispatcher = entity_create('person', $values);
			entity_save('person', $dispatcher);
			echo 'Created driver #' . $i . PHP_EOL;
		}
	}
	echo PHP_EOL . 'Noice cars' . PHP_EOL;
	echo '----------' . PHP_EOL;
	$bodys = array(
			'Пикапчег',
			'Седанчег',
			'Купешечка',
			'Кабриолетик',
			'НИВЕРСАЛ'
	);
	$owner = array(
			'Дай погонять',
			'Мое!!!',
	);
	$sizes = array(
			'A', 'B', 'C', 'D'
	);
	for ($i = $cars[0]; $i <= $cars[1]; $i++) {
		$exist = (bool)(db_select('taxi_office_cars', 'cars')
				->condition('cid', $i)
				->countQuery()
				->execute()
				->fetchField());
		if (!$exist) {
			$values = array(
					'cid'      => $i,
					'rating'   => round(1, 5),
					'body'     => array_rand($bodys),
					'owner'    => array_rand($owner),
					'vin'      => '12312345646' . $i,
					'num'      => 'a' . $i . '12kk',
					'kinds'    => '123213',
					'car_size' => array_rand($sizes),
					'model'    => 'qwe',
					'year'     => 2015,
			);
			$car = entity_create('car', $values);
			entity_save('car', $car);
			echo 'Created car #' . $i . PHP_EOL;
		}
	}
	echo PHP_EOL . 'Noice cabs' . PHP_EOL;
	echo '----------' . PHP_EOL;
	$diff = $cars[0] - $drivers[0];
	for ($i = $cars[0]; $i <= $cars[1]; $i++) {
		$driver_id = $i - $diff;
		$record = (object)array(
				'pid'      => $driver_id,
				'cid'      => $i,
				'status'   => 'qwe',
				'position' => 'ytr',
		);
		drupal_write_record('taxi_office_cab', $record);
		echo 'Created cab #' . $i . PHP_EOL;
	}
	echo 'Done' . PHP_EOL;
}

/**
 * @return array
 */
function _taxi_office_get_cars_ids() {
	return array(1, 20);
}

/**
 * @return array
 */
function _taxi_office_get_driver_uids() {
	return array(40, 60);
}

/**
 * @return array
 */
function _taxi_office_get_dispatcher_uids() {
	return array(30, 35);
}


function drush_taxi_office_taxi_noice_shutup() {
	$dispatchers = _taxi_office_get_dispatcher_uids();
	$drivers = _taxi_office_get_driver_uids();
	$cars = _taxi_office_get_cars_ids();
	echo 'Delete dispatcher' . PHP_EOL;
	for ($i = $dispatchers[0]; $i <= $dispatchers[1]; $i++) {
		user_delete($i);
		entity_delete('person', $i);
	}
	echo 'Delete drivers' . PHP_EOL;
	for ($i = $drivers[0]; $i < $drivers[1]; $i++) {
		user_delete($i);
		entity_delete('person', $i);
	}
	echo 'Delete cars' . PHP_EOL;
	for ($i = $cars[0]; $i <= $cars[1]; $i++) {
		entity_delete('car', $i);
	}
	echo 'Delete cabs' . PHP_EOL;
	$diff = $cars[0] - $drivers[0];
	echo $diff . PHP_EOL;
	for ($i = $cars[0]; $i <= $cars[1]; $i++) {
		$driver_id = $i - $diff;
		db_delete('taxi_office_cab')->condition('cid', $i)
																->condition('pid', $driver_id)
																->execute();
	}
	echo 'Done' . PHP_EOL;
}