<?php

namespace Bundle\PaymentGatewayBundle\Service\AuthorizeNet;

use Bundle\PaymentGatewayBundle\Interface\AbstractAddress;
use Bundle\PaymentGatewayBundle\Interface\AbstractOrder;
use Bundle\PaymentGatewayBundle\Interface\AbstractPaymentGateway;
use Bundle\PaymentGatewayBundle\Interface\AbstractPaymentMethod;

class PaymentGateway implements AbstractPaymentGateway {
	
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

	public function setAddress(AbstractAddress $address) {
		$this->address = $address;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setPaymentMethod(AbstractPaymentMethod $method) {
		$this->paymentMethod = $method;
	}

	public function getPaymentMethod() {
		return $this->paymentMethod;
	}

	public function setOrder(Abstract $order) {
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
