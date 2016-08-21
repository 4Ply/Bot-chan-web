<?php

require_once "prod-includes/psl-config.php";
require_once "vendor/autoload.php";
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$provider = new League\OAuth2\Client\Provider\Google([
    'clientId' => G_AUTH_CLIENT_ID,
    'clientSecret' => G_AUTH_CLIENT_SECRET,
    'redirectUri' => OAUTH_URL,
    'hostedDomain' => OAUTH_HOST
]);

if (!empty($_GET['error'])) {

    // Got an error, probably user denied access
    exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));

} elseif (empty($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;

} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    // State is invalid, possible CSRF attack in progress
    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {
        // We got an access token, let's now get the owner details
        $ownerDetails = $provider->getResourceOwner($token);

        $_SESSION['oauth_token'] = $token;

        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Bot-chan | At your service.</title>
            <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <link rel="stylesheet" type="text/css" href="css/font.css">

            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.2"/>
            <meta name="google-signin-client_id"
                  content="914669485111-da1dk2lhmsir5do7o6v47jmvkb3mue58.apps.googleusercontent.com">
        </head>

        <body class="body">

        <div id="spinner" class="container" style="padding-bottom: 10%">

        </div>

        <div id="welcome" class="container">
            <div>
                <h1>
                    <span id="welcome-title" class="h3 header red-text">Verifying authentication</span>
                </h1>
            </div>
        </div>

        </body>

        <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/material.spinner.min.js"></script>

        <script type="application/javascript">
            $('#spinner').spinner({radius: 25});

            window.setTimeout(function () {
                window.location.href = 'home';
            }, 1500);
        </script>

        </html>

        <?php
    } catch (Exception $e) {
        // Failed to get user details
        exit('Something went wrong: ' . $e->getMessage());
    }
}
