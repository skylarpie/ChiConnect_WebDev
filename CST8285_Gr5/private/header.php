<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       header.php
    Date Created:   March 22, 2024
    Description:    This is the header file that is used on all of our webpages.
-->

<?php 
    require_once('database.php');
    $db = db_connect();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/stylesheet/CSS.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <header id="header_container">
        <div id="item1">
            <h1 id="IndexHeader">ChiConnect</h1>
        </div>
        <div id="item2">
            <div id="links_title">
            </div>
            <nav class="NAV">
                <a href="../public/index.php">Home</a><br>
                <a href="../private/Blog.php">Blogs</a><br>

                <?php 
          
                    //Determine if the url has an error message
                    if (isset($_SESSION['valid_user_id'])){

                        $user_id = $_SESSION['valid_user_id'];

                        //lookup user name
                        $login_id_query = "SELECT FName, LName FROM Users WHERE UserID = '$user_id'";

                        $login_id_result = mysqli_query($db, $login_id_query); 
                        
                        if ($login_id_result !== false){
                            
                            if (mysqli_num_rows($login_id_result) > 0) {
                                
                                // If the username exists in the database
                                $fetch_id_result = mysqli_fetch_assoc($login_id_result);
                    
                                //Keep track of the user id
                                 $first_name = $fetch_id_result['FName'];
                                 $last_name  = $fetch_id_result['LName'];

                                 echo "<a href='../private/Sign_out.php'>Sign out</a><br>";
                                 echo "Hello, " . $first_name . " " . $last_name;
                            }                            
                        }
                        
                    } 
                    else {
                        echo "<a href='../private/Signup.php'>Sign up</a><br>";
                        echo "<a href='../private/Login_page.php'>Log in</a><br>";
                    }
                ?>
            </nav>
        </div>
        <div id="item3">
            <nav class="NAV">
                <a href ="../private/Search.php" >Blog Search</a><br>
            </nav>
        </div>
    </header>

