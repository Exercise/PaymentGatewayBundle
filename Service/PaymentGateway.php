<?php

namespace Bundle\PaymentGatewayBundle\Service;

use Bundle\PaymentGatewayBundle\Service\Address;
use Bundle\PaymentGatewayBundle\Service\Order;
use Bundle\PaymentGatewayBundle\Service\PaymentMethod;

abstract class PaymentGateway {

	abstract protected function connect();
	abstract protected function disconnect();
	
	abstract public function authorize();
	abstract public function capture();
	abstract public function cancel();

	abstract public function setAddress(Address $address);
	abstract public function getAddress();

	abstract public function setPaymentMethod(PaymentMethod $method);
	abstract public function getPaymentMethod();

	abstract public function setOrder(Order $order);
	abstract public function getOrder();
	
	abstract public function setAmount($amount);
	abstract public function getAmount();

}
