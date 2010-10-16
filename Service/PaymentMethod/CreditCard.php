<?php

namespace Bundle\PaymentGatewayBundle\Service\PaymentMethod;

use Bundle\PaymentGatewayBundle\Service\PaymentMethod;

class CreditCard extends PaymentMethod {

	protected $expireMonth;
	protected $expireYear;
	protected $number;
	protected $owner;
	protected $type;
	protected $verification;

	public function setExpireMonth($expireMonth) {
		$this->expireMonth = (int) $expireMonth;
	}

	public function getExpireMonth() {
		return $this->expireMonth;
	}

	public function setExpireYear($expireYear) {
		$this->expireYear = (int) $expireYear;
	}

	public function getExpireYear() {
		return $this->expireYear;
	}

	public function setNumber($number) {
		$this->number = (string) $number;
	}

	public function getNumber() {
		return $this->number;
	}

	public function setOwner($owner) {
		$this->owner = (string) $owner;
	}

	public function getOwner() {
		return $this->owner;
	}	

	public function setType($type) {
		$this->type = (string) $type;
	}

	public function getType() {
		return $this->type;
	}

	public function setVerification($verify) {
		$this->verification = (string) $verify;
	}

	public function getVerification() {
		return $this->verification;
	}
	
}
