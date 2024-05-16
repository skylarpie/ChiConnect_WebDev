<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       Login_page.php
    Date Created:   March 22, 2024
    Description:    This is the page that is used for all of our logins.
-->

<!DOCTYPE html>
<html lang = 'en'>
<head> 
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    
    <?php $title = "SignUp"; ?> 
    <script src ="js/login_script.js" defer></script>
</head>
  <body>
    <div class="Container"> 
      <?php include_once("header.php"); ?>
        <div class="form_container">
          <h1>ChiConnect Login Page</h1>
          <?php 
          
            //Determine if the url has an error message
            if(isset($_GET['error'])) {

              // Retrieve the error value from the url
              $error = $_GET['error'];
              echo "<h2 class='warning'> '$error' </h2>"; 
            } 
          ?>
          <hr>
          <form action="login.php" method="post" onsubmit="return validate();">
          
              <div class="loginField">
                  <label for="login">User Name</label>
                  <input type="text" name="login" id="login" placeholder="User name">
              </div>

              <div class="passwordField">
                  <label for="pass">Password</label>
                  <input type="password" name="pass" id="pass" placeholder="Password">
              </div>

              <button type="submit" class="submit">Login</button>
              <button type="reset" class ="reset" value="Clear Form" id="reset" >Reset</button>

          </form>
        </div>
      <div class = "item5">
        <?php include_once("footer.php"); ?>
      </div>
    </div>
        
  </body>
</html>

