<?php

include_once 'prod-includes/db_connect.php';
include_once 'prod-includes/functions.php';

sec_session_start();

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

<div id="spinner" class="container">

</div>

<div id="welcome" class="container" hidden>
    <div>
        <h1>
            <span id="welcome-title" class="h1 header red-text">I am a bot</span>
            <span id="smiley" class="smiley header orange-text"> :)</span>
        </h1>
    </div>

    <a id="btn-join" class="waves-effect waves-light btn red">Use me</a>
</div>

<?php


if (login_check() == true) {
    ?>

    <div id="logout" class="logout-btn">
        <a id="btn-logout" href="prod-includes/logout.php" class="waves-effect waves-light btn orange">Logout</a>
    </div>

    <div id="wip" class="container wip content">
        <h1>
            <span id="wip-title" class="h1 header red-text">Oops!</span>
            <br/>
            <span id="wip-subtitle" class="h2 header orange-text">This site is not ready yet!</span>
            <br/>
            <span id="wip-subtitle" class="h4 header green-text">But you are logged in, awesome!</span>
        </h1>
    </div>

    <?php
} else {
    ?>

    <div id="login" class="container login content">
        <div id="signin-button"></div>
        <a href="#" onclick="signOut();">Sign out</a>

        <form id="login-form" action="prod-includes/process_login.php" method="post" name="login_form">
            <h1>
                <span id="login-title" class="h1 header red-text">Login</span>
            </h1>
            <div class="row container-basic">
                <div class="input-field col l4 offset-l4 s12 m6 offset-m3">
                    <input id="username" type="text" class="validate red-text">
                    <label for="username">Username</label>
                </div>
                <div class="input-field col l4 offset-l4 s12 m6 offset-m3">
                    <input id="password1" type="password" class="validate red-text">
                    <label for="password1">Password</label>
                </div>
            </div>

            <a id="btn-login" class="waves-effect waves-light btn blue"
               onclick="formhash($('#login-form'), $('#password1'), $('#username').val());">
                Login
            </a>
            <a id="btn-register" class="waves-effect waves-light btn orange">Register</a>
        </form>

    </div>

    <?php
}

?>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/material.spinner.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/sha512.js"></script>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="js/login_listener.js"></script>
<script src="https://apis.google.com/js/platform.js?onload=onGAPILoaded" async defer></script>
<script type="text/javascript" src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>

</body>
</html>
