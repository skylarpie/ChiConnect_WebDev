<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       create_user.php
    Date Created:   March 22, 2024
    Description:    This page is used to create a user for our website.
-->


<?php
require_once('database.php');
$db = db_connect();
session_start();

//  First we check to make sure the form was submitted using the post method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST['login']) && isset($_POST['pass'])){
    
        // Assign the input data from the signup form into php variables
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $login = $_POST["login"];  // This is the username
        $pass  = $_POST["pass"];

       
        //Test to see if this username has already been used.        
        $login_query = "SELECT * FROM Users WHERE UserName = '$login'";
        $login_result = mysqli_query($db, $login_query);
        //Test to see if there is match for the username
        if ($login_result !== false){
            
            if (mysqli_num_rows($login_result) > 0) {
                
                header("Location: Signup.php?error='Username already used.  Select a different username'");
        
            }
            else{
                //Generate sql code
                $insert  = "INSERT INTO Users (FName, LName, email, UserName, password) VALUES ";
                $insert .="('$fname', '$lname', '$email', '$login', '$pass')";

                // Query the DB with the connection and our SQL
                // Note: For insert statements, the value returned is true or false
                $result = mysqli_query($db, $insert);
                
                if ($result) {
                    // Keep track of the auto generated id from the insert statement
                    // this is the userid
                    $id = mysqli_insert_id($db);


                    //Add user and there password as a session variable
                    $_SESSION['valid_user_id'] = $id; 
                    $_SESSION['valid_user_pass'] = $pass; 

                    //Redirect to our index page after a successful signup
                    //maybe we fix this

                    //*
                    header ("Location: ..\public\index.php?id=$id");
                }
                else {

                //output an error if something went wrong
                // Redirect the user back to the login page if there is no matching username
            
                header("Location: Signup.php?error='SQL Login Query Failed'");

                    echo "Error: " . mysqli_error($db);
                }
            }
        }
    }
}
else {
    // Redirect the user back to the signup page if a post request was not used
    header("Location: Signup.php?error='Post Request was not used'");
}

?>