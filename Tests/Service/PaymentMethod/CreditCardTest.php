<?php

namespace Bundle\PaymentGatewayBundle\Service\PaymentMethod;

class CreditCardTest extends \PHPUnit_Framework_TestCase {

	protected $creditCard;

	protected function setUp() {
		parent::setUp();
		$this->creditCard = new CreditCard();
	}

	protected function tearDown() {
		parent::tearDown();
		$this->creditCard = null;
	}

	public function testGetSetExpireMonth() {
		$this->assertNull($this->creditCard->getExpireMonth());
		$value = 10;
		$this->creditCard->setExpireMonth($value);
		$this->assertEquals($value, $this->creditCard->getExpireMonth());
	}

	public function testGetSetExpireYear() {
		$this->assertNull($this->creditCard->getExpireYear());
		$value = 1999;
		$this->creditCard->setExpireYear($value);
		$this->assertEquals($value, $this->creditCard->getExpireYear());
	}

	public function testGetSetNumber() {
		$this->assertNull($this->creditCard->getNumber());
		$value = '11111111';
		$this->creditCard->setNumber($value);
		$this->assertEquals($value, $this->creditCard->getNumber());
	}

	public function testGetSetOwner() {
		$this->assertNull($this->creditCard->getOwner());
		$value = 'Matthew Fitzgerald';
		$this->creditCard->setOwner($value);
		$this->assertEquals($value, $this->creditCard->getOwner());
	}

	public function testGetSetType() {
		$this->assertNull($this->creditCard->getType());
		$type = CreditCard::TYPE_VISA;
		$this->creditCard->setType($type);
		$this->assertEquals($type, $this->creditCard->getType());
	}

	public function testTypeConstraintAndFieldChoices() {

		$constraintChoices = CreditCard::getTypeConstraintChoices();
		$this->assertType('array', $constraintChoices);

		$fieldChoices = CreditCard::getTypeFieldChoices();
		$this->assertType('array', $fieldChoices);

		$this->assertEquals(count($constraintChoices), count($fieldChoices));
		$this->assertEquals($constraintChoices, array_keys($fieldChoices));
	}

	public function testGetSetVerification() {
		$this->assertNull($this->creditCard->getVerification());
		$value = '999';
		$this->creditCard->setVerification($value);
		$this->assertEquals($value, $this->creditCard->getVerification());
	}

}
