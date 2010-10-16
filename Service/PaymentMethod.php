<?php

namespace Bundle\PaymentGatewayBundle\Service;

abstract class PaymentMethod {

	abstract public function getNumber();
	abstract public function setNumber($number);

}
