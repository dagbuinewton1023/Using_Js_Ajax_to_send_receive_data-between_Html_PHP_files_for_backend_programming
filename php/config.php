<?php

// This file will establish our connection to the database for this mini project, 
// Without this file we can prepare or query data from the DB so its very important is the first file that is created in the whole project

// defining the credentials to access the database
try{
    define("HOST", "localhost"); //localhost

    define("DBNAME", "php_ajax"); // the name of our database

    define("USER", "root"); // by default this is our user unless you have your own username

    define("PASS", ""); //by default the password is set empty unless your database has a password to it


    // creating the connection
    $conn = new PDO("mysql:host=" . HOST. ";dbname=" . DBNAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}

// getting and error message if any in the course of your work
catch(PDOException $errorMessage){
     $errorMessage->getMessage();
}


// NB: THERE ARE SO MANY WAYS OF ESTABLISHING CONNECTION TO THE DB BUT STICK TO JUST ONE AND YOU WILL BE FINE, BUT WITH THIS PROJECT I WILL USE JUST "PDO".