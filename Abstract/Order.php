<?php

namespace Bundle\PaymentGatewayBundle\Abstract;

use Bundle\PaymentGatewayBundle\Abstract\Item;

abstract class Order {

	abstract public function addItem(Item $item);
	abstract public function removeItem(Item $item);
	abstract public function getItems();
	abstract public function setItems($items);

}
