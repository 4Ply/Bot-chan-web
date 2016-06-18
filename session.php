<?php

include_once 'prod-includes/functions.php';

sec_session_start();

if (isset($_SESSION['views']))
    $_SESSION['views'] = $_SESSION['views'] + 1;
else
    $_SESSION['views'] = 1;

echo "views = " . $_SESSION['views'];

?>
