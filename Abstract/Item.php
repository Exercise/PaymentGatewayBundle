<?php

namespace Bundle\PaymentGatewayBundle\Abstract;

use Bundle\PaymentGatewayBundle\Abstract\Order;

abstract class Item {

	abstract public function getOrder();
	abstract public function setOrder(Order $order);

}
