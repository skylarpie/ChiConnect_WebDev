<!--
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       index.php
    Date Created:   March 22, 2024
    Description:    This is delete_comment, it handles the coding for deletting comments
-->


<?php
// Connect to the database
require_once('database.php');
$db = db_connect();

// Check if comment ID is present in the POST data
if (isset($_POST['comment_id'])) {
    // Assign the comment ID to a variable
    $comment_id = $_POST['comment_id'];

    // Prepare and execute the SQL DELETE query using prepared statements
    $sql_delete_comment = "DELETE FROM Comments WHERE CommentID = ?";
    $stmt = mysqli_prepare($db, $sql_delete_comment);
    mysqli_stmt_bind_param($stmt, "i", $comment_id);
    $result_delete = mysqli_stmt_execute($stmt);

    // Check if the deletion was successful
    if ($result_delete) {
        // Return a success message
        echo "Comment deleted successfully!";
    } else {
        // Return an error message
        echo "Error deleting comment: " . mysqli_error($db);
    }

    // Close statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($db);
} else {
    // If comment ID is not provided in the POST data
    echo "Comment ID not provided!";
}
?>
