<?php

session_start();
unset($_SESSION['oauth_token']);

header('Location: ' . '.');
