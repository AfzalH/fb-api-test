<?php
require_once __DIR__ . '/vendor/autoload.php';
use Facebook\Facebook;
session_start();
$fb = new Facebook([
	'app_id'=>'137232439715277',
	'app_secret'=>'8ff4bfcdf06ae146809cba0bb5c91080',
	'default_graph_version' => 'v2.3'
]);
$loginHelper = $fb->getRedirectLoginHelper();
$token = $loginHelper->getAccessToken();
if($token) $_SESSION['fb_token'] = $token->getValue();
$fb->setDefaultAccessToken($_SESSION['fb_token']);

$resp = $fb->get('me/albums');
$details = $resp->getDecodedBody();
dump($details);
