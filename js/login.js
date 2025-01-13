"use strict";

// creating DOM elements for the form, button and the error block
const loginForm = document.querySelector(".form form");
const loginBtn = document.querySelector(".form form button");
const error = document.querySelector(".form form i");

// preventing the login from refreshing when the login button is clicked
if(loginForm){
    loginForm.onsubmit = (e) =>{
        e.preventDefault();
    }
}

// when the login button is clicked
if(loginBtn){
    loginBtn.addEventListener("click", ()=>{

        // creating the AJAX xmlhttpt request
        const request = new XMLHttpRequest();

        // when the request is opened
        request.open("POST", "../php/login.php", true);

        // when the request is loading 
        request.onload = ()=>{

            // when the request is ready
            if(request.readyState === XMLHttpRequest.DONE){

                // when there is no error
                if(request.status === 200){

                    // storing the response in a vairable
                    let loginResponse = request.responseText;

                    if(loginResponse === "success"){

                        // redirecting the user to the index page
                        window.location.href = "http://localhost/PHP_AJAX/pages/index.php"
                    }
                    else{

                        // if there is an alert of error message
                        error.textContent = loginResponse;
                        error.style.display = "block";
                    };

                };
            };

        };

        // creating the login form data
        let loginFormData = new FormData(loginForm)

        // sending the form details to the login.php file
        request.send(loginFormData)

    });
}