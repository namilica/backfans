<?php
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class DiscordResourceOwner implements ResourceOwnerInterface{
	use ArrayAccessorTrait;
	protected $response;
	function __construct(array $response=array()){
		$this->response = $response;
	}
	function getId(){
		return $this->response['id'];
	}
	function toArray(){
		return $this->response;
	}
}
