<?php

namespace Bundle\PaymentGatewayBundle\Service;

use Bundle\PaymentGatewayBundle\Service\Item;

abstract class Order {

	abstract public function addItem(Item $item);
	abstract public function removeItem(Item $item);
	abstract public function getItems();
	abstract public function setItems($items);

}
