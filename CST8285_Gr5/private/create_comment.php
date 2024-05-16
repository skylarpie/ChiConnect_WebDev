<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       create_comment.php
    Date Created:   March 22, 2024
    Description:    This page is used to create comments for our blog posts
-->

<?php
// Include necessary files and start session if needed
require_once('database.php');
$db = db_connect();
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $comment_content = $_POST['comment_content'];
    $blog_id = $_POST['blog_id'];
    $user_id = $_SESSION['valid_user_id']; // Assuming you have the user ID stored in the session

    // Validate form data (basic example)
    if (empty($comment_content)) {
        // Handle empty comment content
        header("Location: blogpage.php?blog_id=$blog_id&error=empty_comment");
        exit();
    }

    // Sanitize data to prevent SQL injection 
    $comment_content = mysqli_real_escape_string($db, $comment_content);
    $blog_id = mysqli_real_escape_string($db, $blog_id);
    $user_id = mysqli_real_escape_string($db, $user_id);

    // Insert comment into database
    $sql = "INSERT INTO Comments (blogID, userID, commentContent) VALUES ('$blog_id', '$user_id', '$comment_content')";
    if (mysqli_query($db, $sql)) {
        // Comment inserted successfully
        header("Location: blogpage.php?blog_id=$blog_id"); // Redirect back to the blog page
        exit();
    } else {
        // Error handling
        header("Location: blogpage.php?blog_id=$blog_id&error=db_error");
        exit();
    }
} else {
    // Handle if the form was not submitted properly
    header("Location: blogpage.php?error=invalid_request");
    exit();
}
?>
