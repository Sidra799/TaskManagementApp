<?php

//start session on web page


//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('717733051973-lpr95fpmlqs4a2d8fng0uilj2j7pg4f9.apps.googleusercontent.com');
echo 'In config';
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('8FCm6EmZX54KlxU31j2JqJrF');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://pnp.local.com/googleLoginAction');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>  