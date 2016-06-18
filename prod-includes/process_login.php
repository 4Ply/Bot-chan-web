<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

var_dump($_POST['username']);
var_dump($_POST['p']);
var_dump($_POST['password']);


if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.

    if (login($username, $password) === true) {
        // Login success
        header('Location: ../index.php');
    } else {
        // Login failed
        header('Location: ../login.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}

?>
