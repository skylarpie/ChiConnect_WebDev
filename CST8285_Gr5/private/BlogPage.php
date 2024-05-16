<!-- 
   Student:        John Hallam, Kat Traviss,  Kyla Pineda
   Student Number: 040 590 979, 040 575 976,  041 041 039
   Filename:       BlogPage.php
   Date Created:   March 22, 2024
   Description:    This page displays a specific blog post.
-->


<?php
require_once('database.php');
$db = db_connect();
// Get the BlogID from the URL parameter
$blog_id = isset($_GET['blog_id']) ? $_GET['blog_id'] : null;
// Sanitize input to prevent SQL injection
$blog_id = mysqli_real_escape_string($db, $blog_id);
// Query to retrieve the specific blog post based on the BlogID
$sql_blog = "SELECT Blogs.*, authors.AuthorName, pictures.RelativePath
             FROM Blogs 
             JOIN authors ON Blogs.authorID = authors.AuthorID 
             JOIN pictures ON Blogs.BlogID = pictures.BlogID
             WHERE Blogs.BlogID = '$blog_id'";
$result_blog = mysqli_query($db, $sql_blog);

// Fetch the blog post details along with the author's name
$blog = mysqli_fetch_assoc($result_blog);

// Query to retrieve comments for the specific blog post
$sql_comments = "SELECT Comments.*, Users.UserName 
                 FROM Comments 
                 JOIN Users ON Comments.userID = Users.UserID 
                 WHERE blogID = '$blog_id'";
$result_comments = mysqli_query($db, $sql_comments);

// Close database connection (not needed in this context)
// mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "Blog Page"; ?>
    <script src="js/comment.js"></script>
</head>
<body>
    <div class="Container">
        <?php include "header.php"; ?>
        <div class="blogPage_container">
            <h2><?php echo $blog['BlogTitle']; ?></h2>
            <p><?php echo $blog['BlogContent']; ?></p>
            <?php if (!empty($blog['RelativePath'])): ?>
                 <?php if (!empty($blog['RelativePath'])): ?>
                    <img alt="Blog Image" class="blog_mage" src="<?php echo $blog['RelativePath']; ?>">
                <?php endif; ?>
                <?php endif; ?>
            <p>Written by: <?php echo $blog['AuthorName']; ?></p>
            <!-- Add comment form -->
            <!-- Comments Section -->
            <!-- Display existing comments -->
            <div class="comments_section">
                <?php while ($comment = mysqli_fetch_assoc($result_comments)) { ?>
                    <div class="comment_container" id="comment_<?php echo $comment['CommentID']; ?>">
                        <div class="comment_user">
                            <p class="comment_username"><?php echo $comment['UserName']; ?>:</p>
                        </div>
                        <div class="comment_content"><?php echo $comment['commentContent']; ?></div>
                        <div class="comment_actions">
                            <?php if(isset($_SESSION['valid_user_id']) && $_SESSION['valid_user_id'] == $comment['userID']) { ?>
                                <!-- Edit Button -->
                                <button class="edit-comment-button" onclick="toggleEditComment(<?php echo $comment['CommentID']; ?>)">
                                    <img src="../public/images/edit.png" alt="Edit" class="edit-icon">
                                </button>
                                <!-- Delete Button -->
                                <button class="delete-comment-button" onclick="deleteComment(<?php echo $comment['CommentID']; ?>)">
                                    <img src="../public/images/delete.png" alt="Delete" class="delete-icon">
                                </button>
                            <?php } ?>
                        </div>
                        <!-- Edit Comment Form (initially hidden) -->
                        <div class="edit-comment-form" style="display: none;">
                            <form id="edit_comment_form_<?php echo $comment['CommentID']; ?>" method="post" onsubmit="return submitEditComment(<?php echo $comment['CommentID']; ?>)">
                                <textarea name="edited_comment_content"><?php echo $comment['commentContent']; ?></textarea>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($_SESSION['valid_user_id'])): ?>
                <form id="commentForm" action="create_comment.php" method="post" onsubmit="return validateCommentForm()">
                    <textarea name="comment_content" placeholder="Enter your comment"></textarea>
                    <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
                    <button type="submit">Submit</button>
                </form>
            <?php endif; ?>
            </div>

        </div>
        <div class="item5">
            <?php include_once("footer.php"); ?>
        </div>
    </div>
    <script src="js/comment.js"></script>
</body>
</html>
