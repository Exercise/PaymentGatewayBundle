<?php

namespace Bundle\PaymentGatewayBundle;

use Bundle\PaymentGatewayBundle\Document\AbstractAddress;
use Bundle\PaymentGatewayBundle\Document\AbstractMethod;

abstract class PaymentGateway {

	abstract private function connect();
	abstract private function disconnect();
	
	abstract public function authorize();
	abstract public function charge();

	abstract public function setBillingAddress(AbstractAddress $address);
	abstract public function getBillingAddresses();
	
	abstract public function setShippingAddress(AbstractAddress $address);
	abstract public function getShippingAddress();
	
	abstract public function setMethod(AbstractMethod $method);
	abstract public function getMethod();
	
	abstract public function setAmount($amount);
	abstract public function getAmount();

}
