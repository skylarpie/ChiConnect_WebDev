<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       Login.php
    Date Created:   March 22, 2024
    Description:    This is the page that is used for all of our logins.
-->

<?php
require_once('database.php');
$db = db_connect();
session_start();

//  First we check to make sure the form was submitted using the post method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['login']) && isset($_POST['pass'])){
        $login = $_POST["login"];
        $pass  = $_POST["pass"];

        $login_query = "SELECT * FROM Users WHERE UserName = '$login'";

        $login_result = mysqli_query($db, $login_query);

        // Check if query execution was successful
        if ($login_result !== false){

            if (mysqli_num_rows($login_result) > 0) {

                // If the username exists in the database
                $fetch_result = mysqli_fetch_assoc($login_result);

                //Keep track of the user id
                $id = $fetch_result['UserID'];

                //Now we need to validate the user password
                $password_match_query = "SELECT password FROM Users WHERE UserName = '$login'";
                $password_result      = mysqli_query($db, $password_match_query);

                if ($password_result !== false){

                    if (mysqli_num_rows($password_result) > 0) {               

                        $fetch_pass_result = mysqli_fetch_assoc($password_result);
                        $pass_DB = $fetch_pass_result['password'];
                        if ($pass === $pass_DB){

                            //Add user and there password as a session variable
                            $_SESSION['valid_user_id'] = $id; 
                            $_SESSION['valid_user_pass'] = $pass; 

                            //Redirect to our index page after a successful login
                            header ("Location: ..\public\index.php");  
                        }
                        else {
                            //Incorrect user password
                            header("Location: Login_page.php?error='Incorrect User Password'");
                        }
                    }
                    else {
                        //Incorrect user password
                        header("Location: Login_page.php?error='There is no password for this user in the database");
                    }
                }
                else {
                    header("Location: Login_page.php?error='SQL Password Query Failed'");
                }
            } else {
                // This user does not exist 
                header("Location: Login_page.php?error='This username does not exist'");
            }
        } else {
            // Redirect the user back to the login page if there is no matching username
        
            header("Location: Login_page.php?SQL Login Query Failed");
        }

    }
    
        
}
else{
    
}



?>