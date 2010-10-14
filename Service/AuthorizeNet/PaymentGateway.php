<?php

namespace Bundle\PaymentGatewayBundle\Service\AuthorizeNet;

use Bundle\PaymentGatewayBundle\Abstract\Address;
use Bundle\PaymentGatewayBundle\Abstract\Order;
use Bundle\PaymentGatewayBundle\Abstract\PaymentGateway as AbstractPaymentGateway;
use Bundle\PaymentGatewayBundle\Abstract\PaymentMethod;

class PaymentGateway extends AbstractPaymentGateway {
	
	CONST VERSION_KEY        = "x_version";
	CONST DELIM_DATA_KEY     = "x_delim_data";
	CONST DELIM_CHAR_KEY     = "x_delim_char";
	CONST RELAY_RESPONSE_KEY = "x_relay_response";

	private $address;
	private $paymentMethod;
	private $order;
	private $amount;
	
	private $configs = array(
		"version"              => "3.1",
		"delim_data"           => TRUE,
		"delim_char"           => "|",
		"relay_response"       => FALSE,
		"curl_header"          => 0, // set to 0 to eliminate header info from response
		"curl_return_transfer" => 1, // Returns response data instead of TRUE(1)
		"curl_ssl_verify_peer" => FALSE,
	);

	private $curl;
	private $response;
	
	public function __construct(array $configs = array()) {
		$this->configs = array_merge($this->configs, $configs);
	}

	private function connect() {
		$this->curl = curl_init($this->getPostUrl());
		curl_setopt($this->curl, \CURLOPT_HEADER, $this->getCurlOptHeader());
		curl_setopt($this->curl, \CURLOPT_RETURNTRANSFER, $this->getCurlOptReturnTransfer());
		curl_setopt($this->curl, \CURLOPT_SSL_VERIFYPEER, $this->getCurlOptSslVerifyPeer());
	}

	private function disconnect() {
		curl_close($this->getCurl());
	}

	public function authorize() {
		$this->connect();
		curl_setopt($this->curl, \CURLOPT_POSTFIELDS, $this->getPostStringForAuthorize());
	
		$this->disconnect();
	}

	public function capture() {
		$this->connect();
		curl_setopt($this->curl, \CURLOPT_POSTFIELDS, $this->getPostStringForCapture());

		$this->disconnect();
	}

	public function cancel() {
		$this->connect();
		curl_setopt($this->curl, \CURLOPT_POSTFIELDS, $this->getPostStringForCancel());		

		$this->disconnect();
	}

	public function setAddress(Address $address) {
		$this->address = $address;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setPaymentMethod(PaymentMethod $method) {
		$this->paymentMethod = $method;
	}

	public function getPaymentMethod() {
		return $this->paymentMethod;
	}

	public function setOrder(Order $order) {
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

	public function getApiLoginId() {
		if (array_key_exists('apiLoginId', $this->config)) {
			return $this->config['apiLoginId'];
		}
	}

	public function setApiLoginId($apiLoginId) {
		return $this->config['apiLoginId'] = (string) $apiLoginId;
	}

	public function getTransactionKey() {
		if (array_key_exists('transactionKey', $this->config)) {
			return $this->config['transactionKey'];
		}
	}

	public function setTransactionKey($transactionKey) {
		return $this->config['transactionKey'] = (string) $transactionKey;
	}
	
	public function getVersion() {
		if (array_key_exists('version', $this->config)) {
			return $this->config['version'];
		}
	}

	public function setVersion($version) {
		return $this->config['version'] = (string) $version;
	}

	public function getDelimData() {
		if (array_key_exists('delimData', $this->config)) {
			return $this->config['delimData'];
		}
	}

	public function setDelimData($delimData) {
		return $this->config['delimData'] = (bool) $delimData;
	}

	public function getDelimChar() {
		if (array_key_exists('delimChar', $this->config)) {
			return $this->config['delimChar'];
		}
	}

	public function setDelimChar($delimChar) {
		return $this->config['delimChar'] = (string) $delimChar;
	}

	public function getRelayResponse() {
		if (array_key_exists('relayResponse', $this->config)) {
			return $this->config['relayResponse'];
		}
	}

	public function setRelayResponse($relayResponse) {
		return $this->config['relayResponse'] = (bool) $relayResponse;
	}
	
	public function getPostUrl() {
		if (array_key_exists('postUrl', $this->config)) {
			return $this->config['postUrl'];
		}
	}

	public function setPostUrl($postUrl) {
		return $this->config['postUrl'] = (string) $postUrl;
	}

	public function getCurl() {
		return $this->curl;
	}

	public function getResponse() {
		return $this->response;
	}

	private function curlExec() {
		$this->response = curl_exec($this->getCurl());
	}

}
