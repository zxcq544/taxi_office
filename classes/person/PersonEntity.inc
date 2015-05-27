<?php

/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 16:07
 */
class PersonEntity extends Entity {

	public function getFullName() {
		$name = '';
		$name .= empty($this->second_name) ? '' : ($this->second_name . ' ');
		$name .= empty($this->name) ? '' : ($this->name . ' ');
		$name .= empty($this->surname) ? '' : ($this->surname . ' ');
		return $name;
	}
}