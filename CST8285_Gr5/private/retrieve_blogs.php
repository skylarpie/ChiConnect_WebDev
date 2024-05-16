<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       index.php
    Date Created:   March 22, 2024
    Description:    This is retrieve_blogs.php, it handles the coding for retrieving blogs
-->


<?php

require_once('database.php');

// Connect to the database
$db = db_connect();

// Prepare SQL query to retrieve blogs along with their associated pictures
$stmt = $db->prepare("
SELECT blogs.BlogID, blogs.BlogTitle, blogs.AuthorID, blogs.BlogContent, authors.AuthorName, pictures.RelativePath, tags.TagName
FROM blogs
JOIN authors ON blogs.AuthorID = authors.AuthorID
LEFT JOIN pictures ON blogs.BlogID = pictures.BlogID
LEFT JOIN tags ON blogs.TagID = tags.TagID
");

// Execute the prepared statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Fetch all the blog data
$blogs = $result->fetch_all(MYSQLI_ASSOC);

// Close the statement and database connection
$stmt->close();
$db->close();

// Return the array of blogs
return $blogs;
?>
