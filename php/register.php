<?php

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

    // checking for thr validity of the email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        // checking if the registered email already exists in the database
        // 1. fetching data of this email
        $checkEmail = $conn->query("SELECT `email` FROM `users` WHERE `email` = '$email'"); 
        $checkEmail->execute();

        // 2. checking if it exists
        if($checkEmail->rowCount() > 0){
            echo "Email - '$email' already exist!";
        }
        else{ 

            // when there is no such email in the database then we go ahead to prepare the new register's details to the database
            $insert = $conn->prepare("INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`) VALUES (:firstname, :lastname, :email, :password)");
            $insert->execute([
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":email" => $email,
                ":password" =>$password,
            ]);

            // after successfully inserting the new data into the database then we redirect the new user to the login page 
            if($insert){
                echo "success"; // when this message is sent to the register.js file, it will redirect the user to the login gage
            }
            else{
                echo "Sorry an error occurred! Try again";
            } 
        }
    } 
    else{ // email is invalid
        echo "Email - '$email' is invalid";
    }  
}