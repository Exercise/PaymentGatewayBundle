<?php

namespace Bundle\PaymentGatewayBundle\Interface;

use Bundle\PaymentGatewayBundle\Interface\AbstractItem;

abstract class AbstractOrder {

	abstract public function addItem(AbstractItem $item);
	abstract public function removeItem(AbstractItem $item);
	abstract public function getItems();
	abstract public function setItems($items);

}
