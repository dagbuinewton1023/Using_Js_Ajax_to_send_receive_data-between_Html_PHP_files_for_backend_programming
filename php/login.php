<?php

// starting a session
session_start();

// importing the connection to the database
require "../php/config.php";

// when the email input field is empty
if(empty($_POST['email'])){
    echo "Email field is empty";
}
else if (empty($_POST['password'])){
    echo "Password field is empty";
}
else{
    // if none of the input fields is empty, store the login form details into variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    // checking if the email is valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        // if the email is valid then lets procede to fecth it from the database
        $fetch = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $fetch->execute();
        $loginUser = $fetch->fetch(PDO::FETCH_ASSOC);

        //  the email exists
        if($fetch->rowCount() > 0){

            // checking if the password matches with the database password
            if(password_verify($password, $loginUser['password'])){

                // if the password is correct we redirect the user to the mini homepage by send a "success" message
                echo "success";

                // creating a user session
                $_SESSION['user_id'] = $loginUser['id'];
            }
            else{

                // when password is wrong
                echo "Email or Password is incorrect.";
            }
        }
        else{
            // email doesn't exist
            echo "Sorry you don't have an account, Register Now";
        }
    }
    else{
        // when the email is invalid
        echo "Email - $email is invalid";
    }
}
