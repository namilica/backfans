<?php
require 'vendor/autoload.php';
require 'DiscordAuth.php';
require 'DiscordResourceOwner.php';
$provider = new DiscordAuth([
	'clientId' => '1047047643496460308',
	'clientSecret' => 'mt72oBg6UcUObjPBWgn250NZBJ3I2KUT',
	'urlAuthorize'            => 'https://discord.com/api/oauth2/authorize',
	'urlAccessToken'          => 'https://discord.com/api/oauth2/authorize',
	'urlResourceOwnerDetails' => 'https://discord.com/api/users/@me',
	'scopeSeparator' => ' '	,
	'scopes' => ['identify', 'email'],
	'redirectUri' => 'http://pitocat.xyz:8535/login.php',
]);
session_start();
if (!isset($_GET['code'])) {
	$authorizationUrl = $provider->getAuthorizationUrl();
	$_SESSION['oauth2state'] = $provider->getState();
	header('Location: ' . $authorizationUrl);
	exit;
} elseif (empty($_GET['state']) || $_GET['state'] !== $_SESSION['oauth2state']) {
	if (isset($_SESSION['oauth2state'])) {
		unset($_SESSION['oauth2state']);
	}
	echo $_SESSION['oauth2state'];
	echo "<br>";
	echo $_GET['state'];
	echo "<br>";
	exit('Invalid state');
} else {
	$accessToken = $provider->getAccessToken('authorization_code', ['code'=>$_GET['code']]);
	$resourceOwner = $provider->getResourceOwner($accessToken);
	$_SESSION['user']=$resourceOwner->toArray();
	if (in_array($_SESSION['user']['id'], ['1047046791624929321','486538035069190145','501622295173922816','702126820891557969','614372301550387211','396141306931445763'])) {
		$_SESSION['login'] = true;
		header("Location: /");
	} else {
		header("Location: /logout.php");
	}
	die();
}
?>
