<?php
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;

class DiscordAuth extends AbstractProvider {
	use BearerAuthorizationTrait;
	function getBaseAuthorizationUrl() {
		$auth_url = 'https://discord.com/oauth2/authorize';
		return $auth_url;
	}
	function getBaseAccessTokenUrl(array $params){
		$token_url = 'https://discord.com/api/oauth2/token';
		return $token_url;
	}
	function getResourceOwnerDetailsUrl($token){
		$owner_url = 'https://discord.com/api/users/@me';
		return $owner_url;
	}
	function getScopeSeparator(){
		return ' ';
	}
	function getDefaultScopes(){
		return [
			'identify',
			'email'
		];
	}
	function checkResponse($response, $data){
	}
	function createResourceOwner(array $response, $token){
		return new DiscordResourceOwner($response);
	}
}
