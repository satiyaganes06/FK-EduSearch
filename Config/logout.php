<?php
// logout.php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Destroy the session
    session_unset();
    session_destroy();

    // Redirect to the login page or any other page you prefer
    header('Location: ../../../../View/Module 1/Login/General User Login/userLogin.php');
    exit();
}
?>
