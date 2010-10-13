<?php

namespace Bundle\PaymentGatewayBundle\Interface;

use Bundle\PaymentGatewayBundle\Interface\AbstractOrder;

abstract class AbstractItem {

	abstract public function getOrder();
	abstract public function setOrder(AbstractOrder $order);

}
