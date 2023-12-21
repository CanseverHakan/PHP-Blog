<?php
require_once './db.php';

function userConnected()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

session_start();

?>