<?php

namespace Bundle\PaymentGatewayBundle\Service;

use Bundle\PaymentGatewayBundle\Service\Order;

abstract class Item {

	abstract public function getOrder();
	abstract public function setOrder(Order $order);

}
