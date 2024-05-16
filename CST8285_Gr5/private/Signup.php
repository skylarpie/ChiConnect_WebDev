<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       Signup.php
    Date Created:   March 22, 2024
    Description:    This page is used to gather user input to register for our website. 
-->


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <?php $title = "SignUp"; ?>
    <script src="js/script.js" defer></script>
</head>

<body>
  <div class="Container">
      <?php include_once("header.php"); ?>
          <div class="form_container">
              <h1>ChiConnect Signup Page</h1>
              <hr>
              <form action="create_user.php" method="post" onsubmit="return validate();">        
              <?php //Determine if the url has an error message
                 if(isset($_GET['error'])) {

                 // Retrieve the error value from the url
                 $error = $_GET['error'];
                 echo "<h2 class='warning'> '$error' </h2>"; 
                 } 
              ?>
                <div class="fnamefield">
                  <label for="email">First Name</label>
                  <input type="text" name="fname" id="fname" placeholder="Your First Name">
                </div>

                <div class="lnamefield">
                  <label for="email">Last Name</label>
                  <input type="text" name="lname" id="lname" placeholder="Your Last Name">
                </div>
    
                <div class="emailfield">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="on">
                </div>
    
                <div class="loginField">
                    <label for="login">User Name</label>
                    <input type="text" name="login" id="login" placeholder="User name">
                </div>
    
                <div class="passwordField">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" placeholder="Password">
                </div>
            
                <div class="password2Field">
                    <label for="pass2">Re-type Password</label>
                    <input type="password" id="pass2" placeholder="Password">
                </div>
    
                <div class="checkboxTerms">
                    <input type="checkbox" name="terms" id="terms">
                    <a href="Terms.php" class = "terms_link">I agree to the terms and conditions</a>
                </div>
    
                <button type="submit" class="submit">Sign-Up</button>
                <button type="reset" class ="reset" value="Clear Form" id="reset" >Reset</button>

              </form>
          </div>
      
      <div class="item5">
          <?php include_once("footer.php"); ?>
      </div>
  </div>
</body>

</html>
