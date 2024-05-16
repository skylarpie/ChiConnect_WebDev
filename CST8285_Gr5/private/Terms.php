<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       Terms.php
    Date Created:   March 22, 2024
    Description:    This is our terms of content page.
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
      <div class="login_container forms">
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
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sollicitudin vestibulum nisl in condimentum. Proin luctus molestie tincidunt. Duis non mauris tempus, posuere sapien a, volutpat metus. Proin vulputate tristique augue ac euismod. Maecenas a dui ac metus vestibulum tempor. Nunc suscipit, erat at lobortis facilisis, lorem diam feugiat mi, id auctor enim augue ac metus. Nunc in felis tempor, tristique tellus et, euismod leo. Ut congue eros sed enim finibus, vitae mattis elit tincidunt. Nunc efficitur pretium feugiat.</p>

         <p>Vestibulum sit amet aliquam sapien. Nulla vulputate ac metus quis condimentum. Vestibulum turpis eros, venenatis ac feugiat eget, fringilla sed nunc. Nullam enim purus, bibendum in leo ac, feugiat elementum sapien. Praesent iaculis turpis hendrerit leo pharetra, quis hendrerit lacus ornare. Vivamus sit amet ante dui. Phasellus maximus enim vulputate dui tempus, id fringilla neque egestas. Fusce molestie sit amet felis id eleifend.</p>

         <p>Cras leo erat, ultricies ac justo in, gravida pharetra nulla. Nullam gravida lacinia dolor a tempus. Nunc at malesuada dolor, vel viverra neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras dignissim aliquam massa, porttitor porta nibh tempor auctor. Nam libero nunc, feugiat porttitor tristique ut, porttitor vel sem. Suspendisse potenti. Sed auctor eu dolor eget ullamcorper. Nulla condimentum dapibus nisi, ut pretium velit malesuada vitae. Vestibulum faucibus mattis enim, sed laoreet nibh rutrum eu. Pellentesque ut mauris non lacus dignissim lacinia nec id diam. Phasellus id neque et nisi vehicula tempor. Mauris at magna tristique, ullamcorper turpis id, semper ligula. Proin at diam quis ipsum commodo consectetur. Sed tempor est ut nulla volutpat lacinia. Donec tincidunt facilisis accumsan.</p>

         <p>Aliquam velit leo, bibendum ut fermentum id, aliquet a nisi. Praesent mauris lacus, porttitor ut metus ut, pharetra sagittis augue. Phasellus id lacus nisl. Sed neque risus, interdum ut tristique vel, interdum ac justo. Mauris in mollis ipsum, a vehicula massa. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus nec nunc nec ipsum imperdiet rhoncus. Sed mollis elementum nulla ac pulvinar. Nunc suscipit auctor ex, in iaculis urna aliquet ut.</p>

         <p>Curabitur sed dignissim nisl, sed pellentesque sapien. Duis varius lectus sem, non scelerisque ipsum condimentum ut. Etiam sed lacus laoreet, laoreet tortor fringilla, congue ligula. Suspendisse ex nunc, lobortis sed tincidunt eu, ullamcorper vitae diam. Duis leo arcu, euismod vel leo et, suscipit finibus libero. Nullam a nunc vitae ex semper dictum. Vivamus nec augue vitae mauris fringilla dictum. Nunc ut elementum nisl, sit amet rhoncus lacus. Curabitur rutrum lacus a lacus ultrices vestibulum.</p>
        </div>
      </div>
      <div class = "item5">
        <?php include_once("footer.php"); ?>
      </div>
    </div>
        
  </body>
</html>

