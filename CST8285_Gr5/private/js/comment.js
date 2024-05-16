
// Function to toggle between add/edit comment view and display comment view
function toggleCommentView(commentId) {
    var commentContainer = document.getElementById(commentId);
    if (!commentContainer) {
        console.error("Comment container not found with ID:", commentId);
        return;
    }

    var editForm = commentContainer.querySelector('.edit-comment-form');
    if (!editForm) {
        console.error("Edit comment form not found within comment container:", commentId);
        return;
    }

    var displayContent = commentContainer.querySelector('.comment_content');
    if (!displayContent) {
        console.error("Comment content not found within comment container:", commentId);
        return;
    }

    var editButton = commentContainer.querySelector('.edit-comment-button');
    if (!editButton) {
        console.error("Edit comment button not found within comment container:", commentId);
        return;
    }

    if (editForm.style.display === 'none' || editForm.style.display === '') {
        // Switch to edit/add comment view
        editForm.style.display = 'block';
        displayContent.style.display = 'none';
        editButton.textContent = 'Cancel'; // Change button text to 'Cancel'
    } else {
        // Switch back to display comment view
        editForm.style.display = 'none';
        displayContent.style.display = 'block';
        editButton.textContent = 'Edit'; // Change button text back to 'Edit'
    }
}


// Example of event listener for edit comment button
// Assuming edit buttons have class 'edit-comment-button'
var editButtons = document.querySelectorAll('.edit-comment-button');
editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var commentContainer = this.closest('.comment_container');
        if (!commentContainer) {
            console.error("Parent comment container not found for edit button:", this);
            return;
        }
        var commentId = commentContainer.id;
        toggleCommentView(commentId);
    });
});

// Function to delete a comment
function deleteComment(commentId) {
    // You can confirm deletion with the user before proceeding
    if (confirm("Are you sure you want to delete this comment?")) {
        // Send an AJAX request to delete_comment.php with the comment ID
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_comment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // If deletion is successful, you may want to update the UI or reload the page
                    // For example, you can remove the deleted comment from the DOM
                    var commentContainer = document.getElementById("comment_" + commentId);
                    if (commentContainer) {
                        commentContainer.parentNode.removeChild(commentContainer);
                    }
                } else {
                    // Handle errors if any
                    console.error("Failed to delete comment: " + xhr.responseText);
                }
            }
        };
        xhr.send("comment_id=" + commentId);
    }
}

function validateCommentForm() {
    var commentContent = document.querySelector("#commentForm textarea[name='comment_content']").value.trim();
    var errorMessageContainer = document.querySelector("#commentForm .error-message");

    // Check if the comment content is empty
    if (commentContent === "") {
        errorMessageContainer.textContent = "Please enter your comment.";
        return false; // Prevent form submission
    } else {
        errorMessageContainer.textContent = ""; // Clear error message
        return true; // Allow form submission
    }
}