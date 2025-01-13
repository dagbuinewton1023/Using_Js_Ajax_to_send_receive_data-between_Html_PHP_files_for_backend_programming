"use strict";

// getting the update button and the error block
const updateForm = document.querySelector(".form form");
const updateBtn = document.querySelector(".form form button")
const error = document.querySelector(".form form i");


// preventing the form from refreshing
if(updateForm){
    updateForm.onsubmit = (e)=>{
        e.preventDefault();
    }
}

// when the update button is clicked
if(updateBtn){
    updateBtn.addEventListener("click", ()=>{

        // creating the xmlhttprequest
        const request = new XMLHttpRequest();

        // opening the request to the php/update.php file
        request.open("POST", "../php/update.php", true);

        // loading the request
        request.onload = ()=>{

            // when the request is ready
            if(request.readyState === XMLHttpRequest.DONE){

                // when there is no error in the request
                if(request.status === 200){

                    // puttig the feedback in a variable
                    const updateResponse = request.responseText;

                    if(updateResponse === "success"){

                        // redirecting the user to the view.php page
                        window.location.href = "http://localhost/PHP_AJAX/pages/view.php";
                    }
                    else{

                        // display the error encounted
                        error.textContent = updateResponse;
                        error.style.display = "block";
                    }
                }
            }
        }

        // create a variable to send the form data
        let updateFormData = new FormData(updateForm);

        // sending the request
        request.send(updateFormData);
    })
}
