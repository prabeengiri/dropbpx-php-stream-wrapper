<?php
session_start();
include __DIR__ . "/stream.php";
include __DIR__ . "/lib/OAuthSimple.php";
stream_wrapper_register("dropbox", "\DropBox\Stream");
fopen('dropbox://test.txt', "r+");

define("CONSUMER_KEY", "r7mljienmz131nn");
define("CONSUMER_SECRET", "fswnunehbvwvdpi");

$oauth = new OAuth(CONSUMER_KEY, CONSUMER_SECRET);
$request_token_response = $oauth->getRequestToken('https://api.dropbox.com/1/oauth/request_token');
var_dump($request_token_response);

$_SESSION['token'] = $request_token_response;


$authorize = sprintf("https://www.dropbox.com/1/oauth/authorize?oauth_token=%s&oauth_callback=%s", $request_token_response['oauth_token'], "http://localhost/php_test/dropbpx-php-stream-wrapper/token.php");
header("Location:$authorize");

// Now the current user is authorized
// now access the fresh token for the authorized user.
$new_token = $oauth->getRequestToken('https://api.dropbox.com/1/oauth/access_token');
var_dump($new_token);