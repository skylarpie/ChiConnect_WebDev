


let fNameUserInput = document.querySelector("#fname");
let lNameUserInput = document.querySelector("#lname");

let fNameInputError = document.createElement('p');
let lNameInputError = document.createElement('p');

fNameInputError.setAttribute("class", "warning");
lNameInputError.setAttribute("class", "warning");

document.querySelectorAll(".fnamefield")[0].append(fNameInputError);
document.querySelectorAll(".lnamefield")[0].append(lNameInputError);

let emailUserInput = document.querySelector("#email");

//Displaying the error message we create a new paragraph element
//And we designate it as a class with value of warning

let emailInputError = document.createElement('p');
emailInputError.setAttribute("class", "warning");

//Add (append) the new element to the div parent of the email field
document.querySelectorAll(".emailfield")[0].append(emailInputError);

let loginInput      = document.querySelector("#login");
let loginInputError = document.createElement('p');

loginInputError.setAttribute("class", "warning");
document.querySelectorAll(".loginField")[0].append(loginInputError);

let passwordInput      = document.querySelector("#pass");
let passwordInputError = document.createElement('p');
passwordInputError.setAttribute("class", "warning");
document.querySelectorAll(".passwordField")[0].append(passwordInputError);

let password2Input      = document.querySelector("#pass2");
let password2InputError = document.createElement('p');
password2InputError.setAttribute("class", "warning");
document.querySelectorAll(".password2Field")[0].append(password2InputError);
let passwordMatchError = document.createElement('p');
passwordMatchError.setAttribute("class", "warning");
document.querySelectorAll(".password2Field")[0].append(passwordMatchError);

let termInput  = document.querySelector("#terms");
let termsError = document.createElement('p');
termsError.setAttribute("class", "warning");
document.querySelectorAll(".checkboxTerms")[0].append(termsError);

let resetButton = document.querySelector("#reset");



//Global Variables

let fNameErrorMessage    = "x Please enter your first name. Maximum 25 characters";
let lNameErrorMessage    = "x Please enter your last name. Maximum 25 characters";
let emailErrorMessage    = "x Please enter a valid email address. Maximum 75 characters";
let defaultMessage       = "";

let loginErrorEmpty      = "x Please enter your user name";
let loginErrorTooLong    = "x Enter a username. Maximum 25 characters"; 
let passwordTooShort     = "x Password must be at least 8 characters long. Maximum 25 characters";
let passwordMatchMessage = "x Passwords must match and not be empty";
let TermsCondError       = "x Terms and Conditions must be accepted";

function validateTerms(){
    let termsMessage = defaultMessage;
    terms
    if (termInput.checked !== true){
        termsMessage = TermsCondError;
    }
    return termsMessage;
}

function validatePassword(){

    let passwordMessage = defaultMessage;
    
    if (passwordInput.value.length < 8) {
        passwordMessage = passwordTooShort;
        passwordInput.setAttribute("class", "warning");
    }

    if (passwordInput.value.length > 25) {
        passwordMessage = passwordTooShort;
        passwordInput.setAttribute("class", "warning");
    }

    return passwordMessage;
}
function validatePasswordTwo(){

    let password2Message = defaultMessage;
    
    if (password2Input.value.length < 8) {
        password2Message = passwordTooShort;
        password2Input.setAttribute("class", "warning");
    }

    if (password2Input.value.length > 25) {
        password2Message = passwordTooShort;
        password2Input.setAttribute("class", "warning");
    }

    return password2Message;
}

function validatePasswordMatch(){
    let matchMessage = defaultMessage;

    if ((passwordInput.value !== password2Input.value) || passwordInput.value.length === 0 || password2Input.value.length === 0 ){
        matchMessage = passwordMatchMessage;
        passwordInput.setAttribute("class", "warning");
        password2Input.setAttribute("class", "warning");
    }
    return matchMessage;
}



function validateEmailField(){
    let emailAddress = emailUserInput.value;
    let regexp =/\S+@\S+\.\S+/;  //Testing to make sure there are no white space characters.


    
    //Checking if the user inputed email address is of the acceptable format
    if (regexp.test(emailAddress)){
        error = defaultMessage;
    } else {
        error = emailErrorMessage;
        emailUserInput.setAttribute("class", "warning");
    }

    if (emailUserInput.value.length > 75){
        error = emailErrorMessage;
        emailUserInput.setAttribute("class", "warning");
    }
    return error;

    }


    function validateLogin(){
        let loginMessage = defaultMessage;
    
        if (loginInput.value.length === 0){
            loginMessage = loginErrorEmpty;
            loginInput.setAttribute("class", "warning");
        } 
            
        if(loginInput.value.length > 26){
                loginMessage = loginErrorTooLong;
                loginInput.setAttribute("class", "warning");
            }
        
        return loginMessage;
    }

    function validateFName(){
        let fNameMessage = defaultMessage;

        
        if (fNameUserInput.value.length === 0){
            fNameMessage = fNameErrorMessage;
            fNameUserInput.setAttribute("class", "warning");
        }

        if (fNameUserInput.value.length > 25){
            fNameMessage = fNameErrorMessage;
            fNameUserInput.setAttribute("class", "warning");
        }

        return fNameMessage;
    }

    function validateLName(){
        let lNameMessage = defaultMessage;
        
        if (lNameUserInput.value.length === 0){
            lNameMessage = fNameErrorMessage;
            lNameUserInput.setAttribute("class", "warning");
        }

        if (lNameUserInput.value.length > 25){
            lNameMessage = fNameErrorMessage;
            lNameUserInput.setAttribute("class", "warning");
        }

        return lNameMessage;
    }

function validate(){
    let validSubmission     = true;
    let fNameValidation     = validateFName();
    let lNameValidation     = validateLName();
    let emailValidation     = validateEmailField();
    let loginValidation     = validateLogin();
    let passwordValidation  = validatePassword();
    let password2Validation = validatePasswordTwo();
    let matchPassword       = validatePasswordMatch();
    let termsChecked        = validateTerms();

    if (emailValidation !== defaultMessage) {
        emailInputError.textContent = emailValidation;
        validSubmission = false;        
    }

    if (loginValidation !== defaultMessage){
        loginInputError.textContent = loginValidation;
        validSubmission = false;
    }

    if (passwordValidation !== defaultMessage){
        passwordInputError.textContent = passwordValidation;
        validSubmission = false;
    }

    if (password2Validation !== defaultMessage){
        password2InputError.textContent = password2Validation;
        validSubmission = false;
    }

    if (matchPassword !== defaultMessage){
        passwordMatchError.textContent =  matchPassword;
        validSubmission = false;
    }

    if (termsChecked !== defaultMessage){
        termsError.textContent = termsChecked;
        validSubmission = false;
    }

    if (fNameValidation !== defaultMessage){
        fNameInputError.textContent = fNameErrorMessage;
        validSubmission = false;
    }

    if (lNameValidation !== defaultMessage){
        lNameInputError.textContent = lNameErrorMessage;
        validSubmission = false;
    }
   

    return validSubmission;
};




emailUserInput.addEventListener("change", function (){

    if (validateEmailField() === defaultMessage){
        emailInputError.textContent = defaultMessage;
        emailUserInput.setAttribute("class", "normal");
    }
});

passwordInput.addEventListener("change", function(){
    
    if (validatePassword() === defaultMessage){
        passwordInputError.textContent = defaultMessage;
        passwordInput.setAttribute("class", "normal");
    }
});

password2Input.addEventListener("change", function(){
    if (validatePasswordTwo() === defaultMessage){
        password2InputError.textContent = defaultMessage;
    }

    if (validatePasswordMatch() === defaultMessage){
        passwordMatchError.textContent = defaultMessage;
        password2Input.setAttribute("class", "normal");
    }


});

termInput.addEventListener("change", function(){
    if (validateTerms() === defaultMessage){
        termsError.textContent = defaultMessage;
    }
});

loginInput.addEventListener("change", function(){
    
    if (validateLogin() === defaultMessage){

        loginInputError.textContent = defaultMessage;
        loginInput.setAttribute("class", "normal");
    }
});

fNameUserInput.addEventListener("change", function(){
    
    if (validateFName() === defaultMessage){

        fNameInputError.textContent = defaultMessage;
        fNameUserInput.setAttribute("class", "normal");
    }
});


lNameUserInput.addEventListener("change", function(){
    
    if (validateLName() === defaultMessage){

        lNameInputError.textContent = defaultMessage;
        lNameUserInput.setAttribute("class", "normal");
    }
});



resetButton.addEventListener("click", function(){
    
    
    loginInputError.textContent = defaultMessage;
    loginInput.setAttribute("class", "normal");
    fNameInputError.textContent = defaultMessage;
    fNameUserInput.setAttribute("class", "normal");
    lNameInputError.textContent = defaultMessage;
    lNameUserInput.setAttribute("class", "normal");
    emailInputError.textContent = defaultMessage;
    emailUserInput.setAttribute("class", "normal");
    passwordInputError.textContent = defaultMessage;
    passwordInput.setAttribute("class", "normal");
    passwordMatchError.textContent = defaultMessage;
    password2Input.setAttribute("class", "normal");
    password2InputError.textContent = defaultMessage;
    termsError.textContent = defaultMessage;

    //Removes PHP warning message
    removeWarningMessage();
    
});

// Add this script section to your existing script.js file
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

    if (editForm.style.display === 'none') {
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

//This function removes the PHP generated error if it exists
function removeWarningMessage() {
    let warningMessage = document.querySelector('h2.warning');
    
    //Testing for truthy result.  Ie. anything other than 0, null, NaN, false or an empty string
    if (warningMessage) {
    warningMessage.remove();
    }
}