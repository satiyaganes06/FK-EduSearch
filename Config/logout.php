<?php
// logout.php
session_start();

if(session_destroy()){  
    // Redirecting To Home Page
    header('Location: ../View/Module1/Login/GeneralUserLogin/userLogin.php');

}
?>
