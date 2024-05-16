<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       index.php
    Date Created:   March 22, 2024
    Description:    This is Search, it handles the coding for allowing users to search Blogs
-->

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Blogs</title> 
</head>

<?php
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();
?>

<body>
  <div class="Container">
    <?php include "header.php"; ?>
    <div class="search_container">
      <div class="item6"> <!-- Search engine -->
        <form action="search.php" method="post">
          <label for="search">Search:</label>
          <input type="text" id="search" name="q" placeholder="Search...">
          
          <label for="tagFilter">Filter by Tag:</label>
          <select id="tagFilter" name="tag" >
              <option value="">Select Tag</option>
              <?php
              // Populate the dropdown with tag options
              $sql_tags = "SELECT * FROM tags";
              $result_tags = mysqli_query($db, $sql_tags);
              while ($row_tag = mysqli_fetch_assoc($result_tags)) {
                  $tag_id = $row_tag['TagID'];
                  $tag_name = $row_tag['TagName'];
                  // Mark the selected tag as 'selected' in the dropdown
                  $selected = ($_POST['tag'] == $tag_id) ? 'selected' : ''; // Change $_GET to $_POST
                  echo "<option value='$tag_id' $selected>$tag_name</option>";
              }
              ?>
          </select>
          
          <button type="submit" name="searchButton">Search</button>
        </form>
      </div>

      <div class="search_results">
        <h1>Blogs</h1>
        <div class="blog_posts">
          <?php
          if (isset($_POST['searchButton'])) {
            $searchQuery = isset($_POST['q']) ? $_POST['q'] : null;
            $tagID = isset($_POST['tag']) ? $_POST['tag'] : null;

            if (!empty($searchQuery) && !empty($tagID)) {
              // Both keyword and tag provided
              include "tagsearch.php";
            } elseif (!empty($tagID)) {
              // Only tag provided
              include "tagsearch.php";
            } elseif (!empty($searchQuery)) {
              // Only keyword provided
              include "searchbar.php";
            } else {
              echo "No search criteria provided.";
            }
          }
          ?>
        </div>
      </div>
    </div>
    <div class="item5">
      <?php include_once("footer.php"); ?>
    </div> 
  </div>
</body>
</html>
