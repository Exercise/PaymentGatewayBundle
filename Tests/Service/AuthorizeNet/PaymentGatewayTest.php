<?php

namespace Bundle\PaymentGatewayBundle\Service\AuthorizeNet;

class PaymentGatewayTest extends \PHPUnit_Framework_TestCase {

	protected $paymentGateway;
	protected $config = array(
		"version"              => "3.1",
		"delim_data"           => TRUE,
		"delim_char"           => "|",
		"relay_response"       => FALSE,
		"curl_header"          => 0,
		"curl_return_transfer" => 1,
		"curl_ssl_verify_peer" => FALSE,
	);

	public function setUp() {
		parent::setUp();	
		$this->paymentGateway = new PaymentGateway();
	}

	public function tearDown() {		
		parent::tearDown();
		$this->paymentGateway = null;
		$this->config = null;
	}
	
	public function testConstructor() {
		$this->assertEquals($this->config, $this->paymentGateway->getConfig());
	}

	public function testGetSetApiLoginId() {
		$this->assertNull($this->paymentGateway->getApiLoginId());
		$value = '111111';
		$this->paymentGateway->setApiLoginId($value);
		$this->assertEquals($value, $this->paymentGateway->getApiLoginId());
		$config = array(
			'apiLoginId' => '222222',
		);
		$gateway = new PaymentGateway($config);
		$this->assertEquals($config['apiLoginId'], $gateway->getApiLoginId());
	}

	public function testGetSetTransactionKey() {
		$this->assertNull($this->paymentGateway->getTransactionKey());
		$value = '111111';
		$this->paymentGateway->setTransactionKey($value);
		$this->assertEquals($value, $this->paymentGateway->getTransactionKey());
		$config = array(
			'transactionKey' => '222222',
		);
		$gateway = new PaymentGateway($config);
		$this->assertEquals($config['transactionKey'], $gateway->getTransactionKey());
	}


}
