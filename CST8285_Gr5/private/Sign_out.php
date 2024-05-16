<?php
session_start();
// store to test if they *were* logged in
unset($_SESSION['valid_user_id']); //delete session variable
unset($_SESSION['valid_user_pass']); //delete session variable
session_unset();

session_destroy(); //kill the session

//Redirect to our index page after signout
header ("Location: ..\public\index.php"); 
?>