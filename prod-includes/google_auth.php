<?php

require_once "psl-config.php";
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


function login_check() {
    if (!empty($_SESSION['oauth_token'])) {
        try {
            // We got an access token, let's now get the owner details
            $token = $_SESSION['oauth_token'];
            global $provider;
            $ownerDetails = $provider->getResourceOwner($token);
            if ($ownerDetails !== null) {
                return true;
            }
        } catch (TypeError $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }
    }

    return false;
}
