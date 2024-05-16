<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       Blog.php
    Date Created:   March 22, 2024
    Description:    This is the blog page that displays 8 randomly picked blogs
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <?php $title = "Blog"; ?>
  
</head>
<body>
  <div class="Container">
    <?php include_once("header.php"); ?>
    <div class="blog_container">
      <?php
        $blogs = include_once("retrieve_blogs.php");
        shuffle($blogs); // Shuffle the array of blogs
        $blogs = array_slice($blogs, 0, 8); // get the first 8 blogs
        
        foreach ($blogs as $blog) {
          // Extract the first portion of the blog content
          $length = strpos($blog['BlogContent'], ".", 0);
          $length = $length + 1;
          $sub_content = substr($blog['BlogContent'], 0, $length);
      ?>
          <div class="each_blog">
            <!-- Display the title of the blog as a clickable link -->
            <a href="BlogPage.php?blog_id=<?php echo $blog['BlogID']; ?>" class="blog_link">
              <?php echo $blog['BlogTitle']; ?>
            </a>
            <!-- Display the author name -->
            <p>by <?php echo $blog['AuthorName']; ?></p>
            <!-- Display the partial content -->
            <p> <?php echo $sub_content; ?>..</p>
            <!-- Display the image if available -->
            <?php if (!empty($blog['RelativePath'])): ?>
              <img src="<?php echo $blog['RelativePath']; ?>" alt="Blog Image" class="blog_image">
              <?php else: ?>
                <p>No image available for this blog.</p>
              <?php endif; ?>
          </div>
        <hr>

      <?php
        }
      ?>
    </div>
    <div class="item5">
      <?php include_once("footer.php"); ?>
    </div>
  </div>
</body>
</html>
