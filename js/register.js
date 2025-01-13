"use strict";

// getting hte form and register button DOM elements
const registerForm = document.querySelector(".form form");
const registerBtn = document.querySelector(".form form button");

// getting the error block
const error = document.querySelector(".form form i");

// preventing the form from refreshing when the register button is clicked
if(registerForm){
    registerForm.onsubmit = (e)=>{
        e.preventDefault();
    }
}



// when the register button is clicked
if(registerBtn){
    registerBtn.addEventListener("click", ()=>{


        // creating the request
        const request = new XMLHttpRequest();

        // opening the request to the source where the PHP register code is and it is set to "POST" bececause we are sending data to the source
        request.open("POST", "../php/register.php", true);

        // loading our request to the register.php file
        request.onload = ()=>{

            // checking if the request is done
            if(request.readyState === XMLHttpRequest.DONE){

                // checking if there is no error in the request, if the status is "200" then it means we are good to go but if the status is "400" then there's an error
                if(request.status === 200){

                    // creating a variable the will store the feedback form the register.php file thus a response text 
                    let registerData = request.responseText;

                    // when the response text is "success" then it means the user has successfully signed up
                    if(registerData === "success"){

                        // redirecting the user to the login page after successfully registering 
                        location.href = "http://localhost/PHP_AJAX/pages/login.php";
                    }
                    else{

                        // display the error or alert occured in the process of signing up
                        error.textContent = registerData;
                        error.style.display = "block";
                    }
                }
            }
        }


        // creating a form data variable
        let formData = new FormData(registerForm);

        // sending the form data to the register.php file
        request.send(formData);
    })
}