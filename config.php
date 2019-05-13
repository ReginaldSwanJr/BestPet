<?php
/*
 * Basic Site Settings and API Configuration
 */

// Database configuration
define('DB_HOST', 'us-cdbr-iron-east-02.cleardb.net');
define('DB_USERNAME', 'bff21851fe2a89');
define('DB_PASSWORD', '414a61ea');
define('DB_NAME', 'heroku_9d1320fc1dd85f6');
define('DB_USER_TBL', 'users');

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');

// Google API configuration
define('GOOGLE_CLIENT_ID', '830418697261-cije69ldj6c3lls13v0jo6qfr2119r4l.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '0bDuCrj7zD8mSWGs9bteyZZt');
//define('GOOGLE_REDIRECT_URL', 'https://cpsc4125-rswan.c9users.io/best_pet/Login.php');
define('GOOGLE_REDIRECT_URL', 'https://bestpet.herokuapp.com/Login.php');

// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('BestPet_Google_login');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);