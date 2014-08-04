<?php
session_start();
// Now the current user is authorized
// now access the fresh token for the authorized user.
define("CONSUMER_KEY", "r7mljienmz131nn");
define("CONSUMER_SECRET", "fswnunehbvwvdpi");

$oauth = new OAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_AUTHORIZATION);

$oauth->setToken($_SESSION['token']['oauth_token'], $_SESSION['token']['oauth_token_secret']);

$access_url = sprintf("https://api.dropbox.com/1/oauth/access_token?oauth_token=%s&oauth_token_secret=%s", $_SESSION['token']['oauth_token'], $_SESSION['token']['oauth_token_secret']);

$access_token = $oauth->getAccessToken($access_url, null, $_SESSION['token']['oauth_token']);

$oauth->setToken($access_token['oauth_token'], $access_token['oauth_token_secret']);

var_dump($access_token);
die();
//var_dump($new_token);
$metadata = $oauth->fetch('https://api.dropbox.com/1/metadata/auto/compiler');
var_dump($metadata);
