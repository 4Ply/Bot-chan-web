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

<div id="spinner" class="container" hidden>

</div>


<?php

if (login_check()) { ?>
    <div id="logout" class="logout-btn">
        <a id="btn-logout" class="waves-effect waves-light btn orange">Logout</a>
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
    header('Location: ' . '');
}

?>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/material.spinner.min.js"></script>
<script type="text/javascript" src="js/ui.js"></script>
<script type="text/javascript" src="js/home.js"></script>

</body>
</html>
