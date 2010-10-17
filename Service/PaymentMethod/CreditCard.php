<?php

namespace Bundle\PaymentGatewayBundle\Service\PaymentMethod;

use Bundle\PaymentGatewayBundle\Service\PaymentMethod;

class CreditCard extends PaymentMethod {

	const TYPE_VISA             = 'VI';
	const TYPE_MASTERCARD       = 'MC';
	const TYPE_AMERICAN_EXPRESS = 'AE';
	const TYPE_DISCOVER         = 'DI';

	static protected $typeChoices = array(
			self::TYPE_VISA             => 'VISA',
			self::TYPE_MASTERCARD       => 'MasterCard',
			self::TYPE_AMERICAN_EXPRESS => 'American Express',
			self::TYPE_DISCOVER         => 'Discover',
			);

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

	public static function isTypeValid($type) {
		return array_key_exists($type, static::$typeChoices);
	}

	public function setType($type) {
		$type = (string) $type;
		if (FALSE === $this->isTypeValid($type)) {
			throw new \InvalidArgumentException($type.' is not a valid Rule Type.');
		}
		return $this->type = $type;
	}

	public function getType() {
		return $this->type;
	}

	public function getTypeText() {
		$type = $this->getType();
		if (isset(self::$typeChoices[$type])) {
			return self::$typeChoices[$type];
		}
	}

	static public function getTypeConstraintChoices() {
		return array_keys(self::$typeChoices);
	}

	public static function getTypeFieldChoices() {
		return self::$typeChoices;
	}

	public function setVerification($verify) {
		$this->verification = (string) $verify;
	}

	public function getVerification() {
		return $this->verification;
	}

}
