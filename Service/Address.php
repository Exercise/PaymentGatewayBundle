<?php

namespace Bundle\PaymentGatewayBundle\Service;

class Address {

	const DEFAULT_COUNTRY = 'us';

	static protected $stateChoices = array(
		'us' => array(
			'States' => array(
				'AL' => 'Alabama',
				'AK' => 'Alaska',
				'AZ' => 'Arizona',
				'AR' => 'Arkansas',
				'CA' => 'California',
				'CO' => 'Colorado',
				'CT' => 'Connecticut',
				'DE' => 'Delaware',
				'DC' => 'District of Columbia',
				'FL' => 'Florida',
				'GA' => 'Georgia',
				'HI' => 'Hawaii',
				'ID' => 'Idaho',
				'IL' => 'Illinois',
				'IN' => 'Indiana',
				'IA' => 'Iowa',
				'KS' => 'Kansas',
				'KY' => 'Kentucky',
				'LA' => 'Louisiana',
				'ME' => 'Maine',
				'MD' => 'Maryland',
				'MA' => 'Massachusetts',
				'MI' => 'Michigan',
				'MN' => 'Minnesota',
				'MO' => 'Missouri',
				'MS' => 'Mississippi',
				'MT' => 'Montana',
				'NE' => 'Nebraska',
				'NV' => 'Nevada',
				'NH' => 'New Hampshire',
				'NJ' => 'New Jersey',
				'NM' => 'New Mexico',
				'NY' => 'New York',
				'NC' => 'North Carolina',
				'ND' => 'North Dakota',
				'OH' => 'Ohio',
				'OK' => 'Oklahoma',
				'OR' => 'Oregon',
				'PA' => 'Pennsylvania',
				'RI' => 'Rhode Island',
				'SC' => 'South Carolina',
				'SD' => 'South Dakota',
				'TN' => 'Tennessee',
				'TX' => 'Texas',
				'UT' => 'Utah',
				'VT' => 'Vermont',
				'VA' => 'Virginia',
				'WA' => 'Washington',
				'WV' => 'West Virginia',
				'WI' => 'Wisconsin',
				'WY' => 'Wyoming',
			),
			'Territories' => array(
				'AS' => 'American Samoa',
				'FM' => 'Federated States of Micronesia',
				'GU' => 'Guam',
				'MH' => 'Marshall Islands',
				'MP' => 'Northern Mariana Islands',
				'PW' => 'Palau',
				'PR' => 'Puerto Rico',
				'VI' => 'Virgin Islands',
			),
			'Armed Forces' => array(
				'AA' => 'Armed Forces Americas (except Canada)',
				'AE' => 'Armed Forces Europe (and Canada)',
				'AP' => 'Armed Forces Pacific',
			),
		),
	);

	protected $firstName;
	protected $lastName;
	protected $companyName;
	protected $street1;
	protected $street2;
	protected $city;
	protected $state;
	protected $postalCode;
	protected $country = self::DEFAULT_COUNTRY;
	protected $phone;
	protected $phoneExtension;

	public function setFirstName($firstName) {
		$this->firstName = isset($firstName) ? (string) $firstName : null;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function setLastName($lastName) {
		$this->lastName = isset($lastName) ? (string) $lastName : null;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setCompanyName($companyName) {
		$this->companyName = isset($companyName) ? (string) $companyName : null;
	}

	public function getCompanyName() {
		return $this->companyName;
	}

	public function setStreet1($street1) {
		$this->street1 = isset($street1) ? (string) $street1 : null;
	}

	public function getStreet1() {
		return $this->street1;
	}

	public function setStreet2($street2) {
		$this->street2 = isset($street2) ? (string) $street2 : null;
	}

	public function getStreet2() {
		return $this->street2;
	}

	public function setCity($city) {
		$this->city = isset($city) ? (string) $city : null;
	}

	public function getCity() {
		return $this->city;
	}

	public function setState($state) {
		$this->state = isset($state) ? (string) $state : null;
	}

	public function getState() {
		return $this->state;
	}

	public function setPostalCode($postalCode) {
		$this->postalCode = isset($postalCode) ? (string) $postalCode : null;
	}

	public function getPostalCode() {
		return $this->postalCode;
	}

	public function setCountry($country) {
		$this->country = isset($country) ? (string) $country : null;
	}

	public function getCountry() {
		return $this->country;
	}

	public function setPhone($phone) {
		$this->phone = isset($phone) ? (string) $phone : null;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function setPhoneExtension($phoneExtension) {
		$this->phoneExtension = isset($phoneExtension) ? (string) $phoneExtension : null;
	}

	public function getPhoneExtension() {
		return $this->phoneExtension;
	}

	static public function getStateConstraintChoices($country = self::DEFAULT_COUNTRY) {
		if (!isset(self::$stateChoices[$country])) {
			throw new \InvalidArgumentException('Unsupported country: ' . $country);
		}

		$choices = array();

		foreach (self::$stateChoices[$country] as $k => $v) {
			if (is_array($v)) {
				$choices = array_merge($choices, array_keys($v));
			} else {
				$choices[] = $k;
			}
		}

		return $choices;
	}

	public static function getStateFieldChoices($country = self::DEFAULT_COUNTRY) {
		if (!isset(self::$stateChoices[$country])) {
			throw new \InvalidArgumentException('Unsupported country: ' . $country);
		}

		return self::$stateChoices[$country];
	}

	public static function getStateName($code, $country = self::DEFAULT_COUNTRY) {
		if (!isset(self::$stateChoices[$country])) {
			throw new \InvalidArgumentException('Unsupported country: ' . $country);
		}

		foreach (self::$stateChoices[$country] as $group) {
			if (isset($group[$code])) {
				return $group[$code];
			}
		}

		return "";
	}

}
