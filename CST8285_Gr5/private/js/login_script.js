/*
    Student:        John Hallam, Kat Traviss,  Kyla Pineda
    Student Number: 040 590 979, 040 575 976,  041 041 039
    filename:       login_script.js
    Date Created:   March 22, 2024
    Description:    This javascript file is for ChiConnect registration page.
*/

let loginInput      = document.querySelector("#login");
let loginInputError = document.createElement('p');

loginInputError.setAttribute("class", "warning");
document.querySelectorAll(".loginField")[0].append(loginInputError);

let passwordInput      = document.querySelector("#pass");
let passwordInputError = document.createElement('p');
passwordInputError.setAttribute("class", "warning");
document.querySelectorAll(".passwordField")[0].append(passwordInputError);

let resetButton = document.querySelector("#reset");


//Global Variables


let defaultMessage="";

let loginErrorEmpty      = "x Please enter your user name";
let loginErrorTooLong    = "x Please use less than 25 characters"; 
let passwordTooShort     = "x Password must be at least 8 characters long maximum 25";


function validatePassword(){

    let passwordMessage = defaultMessage;
    
    if (passwordInput.value.length < 8 || passwordInput.value.length > 25 ) {
        passwordMessage = passwordTooShort;
        passwordInput.setAttribute("class", "warning");
        
    }

    return passwordMessage;
}



function validateLogin(){
        let loginMessage = defaultMessage;
    
        if (loginInput.value.length === 0){
            loginMessage = loginErrorEmpty;
            loginInput.setAttribute("class", "warning");
        } 
            
        if(loginInput.value.length > 25){
                loginMessage = loginErrorTooLong;
                loginInput.setAttribute("class", "warning");
            }
        
        return loginMessage;
    }



function validate(){
    let validSubmission     = true;
    
    let loginValidation     = validateLogin();
    let passwordValidation  = validatePassword();
   
    
   if (loginValidation !== defaultMessage){
        loginInputError.textContent = loginValidation;
        validSubmission = false;
    }

    if (passwordValidation !== defaultMessage){
        passwordInputError.textContent = passwordValidation;
        validSubmission = false;
    }

    return validSubmission;
};


passwordInput.addEventListener("change", function(){
    
    if (validatePassword() === defaultMessage){
        passwordInputError.textContent = defaultMessage;
        passwordInput.setAttribute("class", "normal");
    }
});

loginInput.addEventListener("change", function(){
    
    if (validateLogin() === defaultMessage){

        loginInputError.textContent = defaultMessage;
        loginInput.setAttribute("class", "normal");
    }
});


resetButton.addEventListener("click", function(){
    
    
    loginInputError.textContent = defaultMessage;
    loginInput.setAttribute("class", "normal");
    
    passwordInputError.textContent = defaultMessage;
    passwordInput.setAttribute("class", "normal");

    //Removes PHP warning message
    removeWarningMessage();
});

//This function removes the PHP generated error if it exists
function removeWarningMessage() {
    let warningMessage = document.querySelector('h2.warning');
    
    //Testing for truthy result.  Ie. anything other than 0, null, NaN, false or an empty string
    if (warningMessage) {
    warningMessage.remove();
    }
}