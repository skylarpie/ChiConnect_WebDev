<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       index.php
    Date Created:   March 22, 2024
    Description:    This is the index page.  It it is the homepage for our website.
-->


<!DOCTYPE html>
<html lang = 'en'>
  <head> 
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">

      <?php $title = "Index"; ?>
  </head>
  <body>
    <div class="Container"> 
      <?php include_once("../private/header.php"); ?>
      <div id = "index_container">
        <div class="item3">  <!-- About link? -->
            <h2 class="AboutHeader"> A little about us...</h2>
              <p class="IndexAbout">
                ChiConnect is a vibrant and dedicated community centered around Chihuahuas, 
                catering to passionate Chihuahua owners and enthusiasts worldwide. We are 
                committed to fostering a supportive and informative environment where Chihuahua 
                lovers can connect, share experiences, and learn from each other.
              </p>
              <p class="IndexAbout">
                <h2 class="AboutHeader"> What Sets Us Apart</h2>
                  <ul>
                      <li><strong>Dedicated Community:</strong> ChiConnect offers a welcoming space where 
                      Chihuahua owners can come together to exchange advice, tips, and stories about their 
                      beloved pets.</li>
                      <li><strong>Expert Guidance:</strong> Our platform provides access to expert guidance on 
                      Chihuahua care, health, training, and behavior, ensuring that owners have the knowledge 
                      they need to provide the best possible care for their furry companions.</li>
                      <li><strong>Exclusive Content:</strong> From informative articles and how-to guides to 
                      entertaining videos and engaging discussions, ChiConnect offers a wealth of exclusive 
                      content tailored specifically for Chihuahua enthusiasts.</li>
                      <li><strong>Product Recommendations:</strong> We curate a selection of high-quality 
                      products and services designed with Chihuahuas in mind, helping owners find the best toys, 
                      accessories, and healthcare solutions for their pets.</li>
                  </ul>
              </p>
        </div>

        <div class="item4">  <!-- Photo -->
            <h3> Chihuahuas of the week </h3>
            <hr>
            <img class="SleepyDog" src="images/Sleepy.jpg" alt="Sleepy Dog" width="500" height="333">
            <p class="PhotoParagraph"> Rui </p>
          
            <hr>

            <img class="SleepyDog" src="images/Bench.jpg" alt="Sleepy Dog" width="500" height="333">
            <p class="PhotoParagraph"> Rui </p>
            <hr>
            <img class="SleepyDog" src="images/Apple.jpg" alt="Sleepy Dog" width="500" height="333">
            <p class="PhotoParagraph"> Rui </p>
            <hr>
        </div>
      </div>

      <?php include_once("../private/footer.php"); ?>
    </div>

    


  </body>
</html>

