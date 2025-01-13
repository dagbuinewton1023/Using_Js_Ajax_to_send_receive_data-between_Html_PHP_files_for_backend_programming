<?php

// starting session
session_start();

// importing the connection to the database
require "../php/config.php";


// getting the user's id
if (isset($_GET['id'])) {

    // creating a variable for the user id
    $id = $_GET['id'];

    // checking if the user exists in the database
    $fetch = $conn->query("SELECT `id` FROM `users` WHERE `id` = '$id'");
    $fetch->execute();

    // if the user already exists then lets log the user out
    if ($fetch->rowCount() > 0) {

        session_unset();
        session_destroy();

        // echo "logout successful";
        // redirecting the user to the login page
        header("location: ../pages/login.php");

    } else {

        // nothing should happen
        return;
    }
}
else{
    
    // redirecting the user to the login page
    header("location: ../pages/login.php");
}

