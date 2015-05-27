<?php

/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 10:45
 */
class OrderEntityController extends EntityAPIController {
	public function create(array $values = array()) {
		$values = array(
				'created'     => time(),
				'update_date' => time()
		);
		return parent::create($values);
	}


	const ORDER_PERM_CREATE = "create order";
	const ORDER_PERM_VIEW   = "view order";
	const ORDER_PERM_EDIT   = "edit order";
	const ORDER_PERM_DELETE = "delete order";

}

