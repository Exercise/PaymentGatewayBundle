<?php

namespace Bundle\PaymentGatewayBundle\Service;

class AddressTest extends \PHPUnit_Framework_TestCase {
	
	protected $address;

	protected function setUp() {
		parent::setUp();
		$this->address = new Address();
	}

	protected function tearDown() {
		parent::tearDown();
		$this->address = null;
	}

	public function testGetSetFirstName() {
		$this->assertNull($this->address->getFirstName());
		$firstName = 'test first name';
		$this->address->setFirstName($firstName);
		$this->assertEquals($firstName, $this->address->getFirstName());
	}

	public function testGetSetLastName() {
		$this->assertNull($this->address->getLastName());
		$lastName = 'test last name';
		$this->address->setLastName($lastName);
		$this->assertEquals($lastName, $this->address->getLastName());
	}

	public function testGetSetCompanyName() {
		$this->assertNull($this->address->getCompanyName());
		$companyName = 'Snowhima';
		$this->address->setCompanyName($companyName);
		$this->assertEquals($companyName, $this->address->getCompanyName());
	}

	public function testGetSetStreet1() {
		$this->assertNull($this->address->getStreet1());
		$street1 = 'test street 1';
		$this->address->setStreet1($street1);
		$this->assertEquals($street1, $this->address->getStreet1());
	}

	public function testGetSetAddress2() {
		$this->assertNull($this->address->getStreet2());
		$street2 = 'test street 2';
		$this->address->setStreet2($street2);
		$this->assertEquals($street2, $this->address->getStreet2());
	}

	public function testGetSetCity() {
		$this->assertNull($this->address->getCity());
		$city = 'nyc';
		$this->address->setCity($city);
		$this->assertEquals($city, $this->address->getCity());
	}

	public function testGetSetState() {
		$this->assertNull($this->address->getState());
		$state = 'NY';
		$this->address->setState($state);
		$this->assertEquals($state, $this->address->getState());
	}

	public function testGetSetPostalCode() {
		$this->assertNull($this->address->getPostalCode());
		$postalCode = '07747';
		$this->address->setPostalCode($postalCode);
		$this->assertEquals($postalCode, $this->address->getPostalCode());
	}

	public function testGetSetCountry() {
		$this->assertEquals(Address::DEFAULT_COUNTRY, $this->address->getCountry());
		$country = Address::DEFAULT_COUNTRY;
		$this->address->setCountry($country);
		$this->assertEquals($country, $this->address->getCountry());
	}

	public function testGetSetPhone() {
		$this->assertNull($this->address->getPhone());
		$phone = '(555) 555-5555';
		$this->address->setPhone($phone);
		$this->assertEquals($phone, $this->address->getPhone());
	}

	public function testGetSetPhoneExtensionExtension() {
		$this->assertNull($this->address->getPhoneExtension());
		$phoneExtension = 'x1234';
		$this->address->setPhoneExtension($phoneExtension);
		$this->assertEquals($phoneExtension, $this->address->getPhoneExtension());
	}

	public function testGetStateConstraintChoices() {
		$states = $this->address->getStateConstraintChoices();
		$this->assertType('array', $states);
		$this->assertEquals($states, $this->address->getStateConstraintChoices(Address::DEFAULT_COUNTRY));

		foreach ($states as $code) {
			$this->assertType('string', $code);
		}
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testGetStateConstraintChoicesException() {
		$this->address->getStateConstraintChoices('not_a_country');
	}

	public function testGetStateFieldChoices() {
		$states = $this->address->getStateFieldChoices();
		$this->assertType('array', $states);
		$this->assertEquals($states, $this->address->getStateFieldChoices(Address::DEFAULT_COUNTRY));

		foreach ($states as $code => $label) {
			$this->assertType('string', $code);
			$this->assertThat($label, $this->logicalOr($this->isType('string'), $this->isType('array')));
			if (is_array($label)) {
				foreach ($label as $nested_code => $nested_label) {
					$this->assertType('string', $nested_code);
					$this->assertType('string', $nested_label);
				}
			}
		}
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testGetStateFieldChoicesException() {
		$this->address->getStateFieldChoices('not_a_country');
	}

}
