<?php

namespace Bundle\PaymentGatewayBundle\Service;

use Bundle\PaymentGatewayBundle\Service\Address;
use Bundle\PaymentGatewayBundle\Service\Order;
use Bundle\PaymentGatewayBundle\Service\PaymentMethod;

interface PaymentGatewayInterface {

	public function connect();
	public function disconnect();
	public function authorize();
	public function capture();
	public function cancel();
	
	public function getAddress();
	public function getAmount();	
	public function getOrder();	
	public function getPaymentMethod();

	public function setAddress(Address $address);
	public function setAmount($amount);
	public function setOrder(Order $order);
	public function setPaymentMethod(PaymentMethod $address);		

}
