<?php

namespace Bundle\PaymentGatewayBundle\Service\AuthorizeNet;

use Bundle\PaymentGatewayBundle\Abstract\Address;
use Bundle\PaymentGatewayBundle\Abstract\Order;
use Bundle\PaymentGatewayBundle\Abstract\PaymentGateway as AbstractPaymentGateway;
use Bundle\PaymentGatewayBundle\Abstract\PaymentMethod;

class PaymentGateway extends AbstractPaymentGateway {
	
	private $address;
	private $paymentMethod;
	private $order;
	private $amount;
	
	public function __construct() {

	}

	private function connect() {

	}

	private function disconnect() {

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
