<?php

require_once ('codebird/codebird.php');

// Set a proper JSON header
header('Content-type: application/json');


/*----------------------------
	Twitter API settings
-----------------------------*/


// Consumer key
$twitter_consumer_key = '436874745531748352';

// Consumer secret. Don't share it with anybody!
$twitter_consumer_secret = '';

// Access token
$twitter_access_token = '';

// Access token secrent. Also don't share it!
$twitter_token_secret = '';

 
/*----------------------------
	Initialize codebird
-----------------------------*/


// Application settings
\Codebird\Codebird::setConsumerKey($twitter_consumer_key, $twitter_consumer_secret);

$cb = \Codebird\Codebird::getInstance();

// Your account settings
$cb->setToken($twitter_access_token, $twitter_token_secret);


/*----------------------------
	Handle the API request
-----------------------------*/


// Is the handle array passed?
if(!isset($_POST['handles']) || !is_array($_POST['handles'])){
	exit;
}

// Does a cache exist?

$cache = md5(implode($_POST['handles'])).'.cache';

if(file_exists($cache) && time() - filemtime($cache) < 15*60){
	// There is a cache file, and it is fresher than 15 minutes. Use it!

	echo file_get_contents($cache);
	exit;
}

// There is no cache file. Build it!

$twitter_names = array();

foreach($_POST['handles'] as $handle){

	if(!preg_match('/^[a-z0-9\_]+$/i', $handle)){
		// This twitter name is not valid. Skip it.
		continue;
	}

	$twitter_names[] = 'from:'.$handle;
}


$search_string = implode(' OR ', $twitter_names);

// Issue a request for the Twitter search API using the codebird library
$reply = (array) $cb->search_tweets("q=$search_string&count=50");
$result = json_encode($reply);

// Create/update the cache file
file_put_contents($cache, $result);

// Print the result
echo $result;
