<?php

namespace Bundle\PaymentGatewayBundle\Service\AuthorizeNet;

class PaymentGatewayTest extends \PHPUnit_Framework_TestCase {

	protected $paymentGateway;
	protected $configs = array(
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

}
