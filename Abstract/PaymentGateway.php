<?php

namespace Bundle\PaymentGatewayBundle;

use Bundle\PaymentGatewayBundle\Abstract\Address;
use Bundle\PaymentGatewayBundle\Abstract\Order;
use Bundle\PaymentGatewayBundle\Abstract\PaymentMethod;

abstract class PaymentGateway {

	abstract private function connect();
	abstract private function disconnect();
	
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
