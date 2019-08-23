<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
include_once "vendor/autoload.php";
include_once "googlebusiness.php";
 
define('APPLICATION_NAME', 'User Query - Google My Business API');
 
define('CREDENTIALS_PATH', 'client.json');
 
define('CLIENT_SECRET_PATH', '/path/to/client_secrets.json');
 
$redirect_uri = 'https://www.unitext.sk';
 
$client = new Google_Client();
 
$client->setApplicationName('unitext');
 
$client->setAuthConfigFile('client.json');
 
$client->addScope("https://www.googleapis.com/auth/plus.business.manage");
 
$client->setRedirectUri($redirect_uri);
 
// For retrieving the refresh token
 
$client->setAccessType("offline");
 
$client->setApprovalPrompt("force");
 
// /************************************************
 
// We are going to create the Google My Business API
 
// service, and query it.
 
// ************************************************/
 
$mybusinessService = new Google_Service_Mybusiness($client);
 
$credentialsPath = CREDENTIALS_PATH;
 
if (isset($_GET['code'])) {
 
  // Exchange authorization code for an access token.
 
  $accessToken = $client->authenticate($_GET['code']);
 
  // Store the credentials to disk.
 
  if (!file_exists(dirname($credentialsPath))) {
 
    mkdir(dirname($credentialsPath), 0700, true);
 
  }
 
  file_put_contents($credentialsPath, $accessToken);
 
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
 
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
 
}
 
// // Load previously authorized credentials from a file.
 
if (file_exists($credentialsPath)) {
 
  $accessToken = file_get_contents($credentialsPath);
 var_dump($accessToken);
  $client->setAccessToken($accessToken);
 
  // Refresh the token if it's expired.
 
  if ($client->isAccessTokenExpired()) {
 
    $client->refreshToken($client->getRefreshToken());
 
    file_put_contents($credentialsPath, $client->getAccessToken());
 
  }
 
} else {
 
  // Request authorization from the user.
 
  $authUrl = $client->createAuthUrl();
 
}
 
// // For testing purposes, selects the very first account in the accounts array
 
// $accounts = $mybusinessService->accounts;
 
// $accountsList = $accounts->listAccounts()->getAccounts();
 
// $account = $accountsList[0];
 
// // For testing purposes, selects the very first location in the locations array
 
// $locations = $mybusinessService->accounts_locations;
 
// $locationsList = $locations->listAccountsLocations($account->name)->getLocations();
 
// $location = $locationsList[0];
 
// // Lists all reviews for the specified location
 
// $reviews = $mybusinessService->accounts_locations_reviews;
 
// $listReviewsResponse = $reviews->listAccountsLocationsReviews($location->name);
 
// $reviewsList = $listReviewsResponse->getReviews();
 
// print '<pre>' . json_encode($reviewsList, JSON_PRETTY_PRINT) . '</pre>';
 
// print '<pre>' . json_encode($listReviewsResponse, JSON_PRETTY_PRINT) . '</pre>';
?>