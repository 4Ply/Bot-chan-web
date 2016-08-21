<?php

require_once "prod-includes/google_auth.php";

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
if (login_check()) {
    header('Location: ' . 'home');
} else {
    ?>

    <div id="login" class="container login content">
        <div id="signin-button"></div>
        <a href="#" onclick="signOut();">Sign out</a>
        <div id="some-content">

        </div>

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
<script type="text/javascript" src="js/ui.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>
</html>
