<?php

// starting session
session_start();

// importing the connection file thus the config.php file
require "../php/config.php";

// checking if any of the input fields are empty
if(empty($_POST['firstname'])){
    echo "Firstname input field is empty";
}
else if (empty($_POST['lastname'])){
    echo "Lastname input field is empty";
}
else if(empty($_POST['email'])){
    echo "Email input field is empty";
}
else if (empty($_POST['password'])){
    echo "Password input field is empty";
} 
else{  // if none of the input fields are empty

    // storing the data from each input field into variables
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashing the password so that it can't be easily known in the database, this way is very secure
    $id = $_SESSION['user_id'];

    // checking for thr validity of the email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        // updating the user's data in the database
        $update = $conn->prepare("UPDATE `users` SET `firstname` = :firstname, `lastname` = :lastname, `email` = :email, `password` = :password WHERE `id` = :id");
        $update->execute([
            ":firstname" =>$firstname,
            ":lastname" => $lastname,
            ":email" => $email,
            ":password" => $password,
            ":id" => $id,
        ]);

        // checking if the update was a success
        if($update->rowCount() > 0){

            // redirecting the page to the view.php when the update goes through
            echo "success";
        }
        else{

            // error message
            echo "update was unsuccessful, try again";
        }
    } 
    else{ // email is invalid
        echo "Email - '$email' is invalid";
    }  
}