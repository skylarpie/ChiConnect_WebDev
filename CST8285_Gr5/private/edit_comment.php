<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       index.php
    Date Created:   March 22, 2024
    Description:    This is delete_comment, it handles the coding for deletting comments
-->


<?php
require_once('database.php');
$db = db_connect();
session_start();

// Check if comment_id and edited_comment_content are provided in the POST data
if(isset($_POST['comment_id']) && isset($_POST['edited_comment_content'])) {
    // Get the comment ID and edited comment content from the POST data
    $comment_id = $_POST['comment_id'];
    $edited_comment_content = $_POST['edited_comment_content'];

    // Update the comment content in the database based on the comment_id
    $sql_update_comment = "UPDATE Comments SET commentContent = ? WHERE CommentID = ?";
    $stmt = mysqli_prepare($db, $sql_update_comment);
    mysqli_stmt_bind_param($stmt, "si", $edited_comment_content, $comment_id);
    $result_update = mysqli_stmt_execute($stmt);

    if ($result_update) {
        echo "Comment updated successfully!";
    } else {
        echo "Error updating comment: " . mysqli_error($db);
    }

    // Close statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($db);
} else {
    echo "Comment ID or edited comment content not provided!";
}
?>
