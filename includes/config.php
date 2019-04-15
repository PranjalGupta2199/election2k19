<?php

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("helpers.php");

    $mysqli = new mysqli("localhost", "root", "", "elections");

    // enable sessions
    session_start();

    if((basename(__FILE__, '.php')=="login"||basename(__FILE__, '.php')=="logout")){
        redirect("login.php");
    }
    // require authentication for all pages except /login.php and /logout.php
    // if (!in_array($_SERVER["PHP_SELF"], ["login.php", "logout.php"]))
    // {
    //     if (empty($_SESSION["id"]))
    //     {
    //         redirect("login.php");
    //     }
    // }

?>
