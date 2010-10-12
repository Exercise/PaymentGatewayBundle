<?php

namespace Bundle\PaymentGatewayBundle;

use Bundle\PaymentGatewayBundle\Interface\AbstractAddress;
use Bundle\PaymentGatewayBundle\Interface\AbstractPaymentMethod;

abstract class AbstractPaymentGateway {

	abstract private function connect();
	abstract private function disconnect();
	
	abstract public function authorize();
	abstract public function capture();
	abstract public function cancel();

	abstract public function setAddress(AbstractAddress $address);
	abstract public function getAddress();

	abstract public function setPaymentMethod(AbstractPaymentMethod $method);
	abstract public function getPaymentMethod();

	abstract public function setOrder(AbstractOrder $order);
	abstract public function getOrder();
	
	abstract public function setAmount($amount);
	abstract public function getAmount();

}
