<?php
require_once __DIR__ . '/vendor/autoload.php';
use Facebook\Facebook;
$allalbums = array();
$fb        = new Facebook(
	[
		'app_id'                => '177197009081544',
		'app_secret'            => '64a6d7830db5893985cbe0475ce5a9db',
		'default_graph_version' => 'v2.4',
		'default_access_token'  => '177197009081544|64a6d7830db5893985cbe0475ce5a9db'
	]
);
//get first page
$fb->get( 'rolandgarros/albums' );
$nextpage = true;
while($nextpage){
	$something = $fb->getLastResponse();
	$items = $something->getDecodedBody()['data'];
	if(count($items)) $allalbums = array_merge($allalbums,$items);

	//get next page
	$nextpage = $fb->next($something->getGraphEdge());
}

header('content-type: Application/json');

echo json_encode($allalbums);