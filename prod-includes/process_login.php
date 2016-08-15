<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

var_dump($_POST['username']);
var_dump($_POST['p']);
var_dump($_POST['password']);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.

    if (login($username, $password) === true) {
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php?error=1');
    }
} else {
    header('Location: ../index.php');
}

?>
