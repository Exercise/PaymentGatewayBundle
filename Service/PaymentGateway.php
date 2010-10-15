<?php

namespace Bundle\PaymentGatewayBundle\Service;

use Bundle\PaymentGatewayBundle\Service\Address;
use Bundle\PaymentGatewayBundle\Service\Order;
use Bundle\PaymentGatewayBundle\Service\PaymentMethod;
use Bundle\PaymentGatewayBundle\Service\PaymentGatewayInterface;

class PaymentGateway implements PaymentGatewayInterface {

	public function connect() {
	
	}

	public function disconnect() {

	}

	public function authorize() {

	}

	public function capture() {

	}
	
	public function cancel() {

	}

	public function setAddress(Address $address) {
		$this->address = $address;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setPaymentMethod(PaymentMethod $method) {
		$this->paymentMethod = $method;
	}

	public function getPaymentMethod() {
		return $this->paymentMethod;
	}

	public function setOrder(Order $order) {
		$this->order = $order;
	}

	public function getOrder() {
		return $this->order;
	}

	public function setAmount($amount) {
		$this->amount = $amount;
	}

	public function getAmount() {
		return $this->amount;
	}

}
