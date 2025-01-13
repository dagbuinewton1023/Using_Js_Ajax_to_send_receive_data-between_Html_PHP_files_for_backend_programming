<?php

// starting session
session_start();

// making this page in accessible to users who haven't logged in
if(!isset($_SESSION['user_id'])){

    // redirecting the user back to the login page
    header("location: ../pages/login.php");
}


// importing the connection file thus the config.php file
require "../php/config.php";

// getting the id of the user we want to update
if($_GET['id']){

    // creating a varible to store the user's id 
    $id = $_GET['id'];

    // fetching from the database everything about the user
    $fetch = $conn->query("SELECT * FROM `users` WHERE `id` = '$id'");
    $fetch->execute();
    $fetchUser = $fetch->fetch(PDO::FETCH_ASSOC);

    // checking if the fetch was a success
    if($fetch->rowCount() > 0){

        // creating variable to store the values of the details fetched
        $firstname = $fetchUser['firstname'];
        $lastname = $fetchUser['lastname'];
        $email = $fetchUser['email'];
        $password = $fetchUser['password'];
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            width: 100%;
            height: 100vh;
            font-family: sans-serif;
            background: radial-gradient(rgba(220, 20, 60, 0.219), rgba(220, 20, 60, 0.034));
        }

        .form{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .form p{
            font-size: 1.3em;
            color: crimson;
            padding: 20px;
          box-shadow: 0 0 5px crimson;
          border-radius: 10px;
          background-color: rgba(220, 20, 60, 0.034);
          cursor: default;
          width: 30%;
          margin: 0 35%;
          margin-bottom: 20px;
          text-align: center;
          
        }

        .form form{
            width: 30%;
            height: auto;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            box-shadow: 0 0 5px crimson;
            background-color: rgba(220, 20, 60, 0.034);
        }

        form input{
            width: 100%;
            height: 50px;
            outline: none;
            border: 1px solid crimson;
            padding: 5px;
            font-size: 1.1em;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.603);
            border-radius: 7.5px;
            margin: 10px 0;
            transition: 0.5s;
        }

        form input::placeholder{
            color: rgb(56, 2, 2);
        }

        form input:focus{
            box-shadow: 0 0 5px rgba(146, 12, 39, 0.685);
        }

        form button{
            width: auto;
            padding: 10px 30px;
            font-size: 1.1em;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 5px;
            color: rgb(0, 0, 0);
            background-color: rgba(220, 20, 60, 0.288);
            outline: none;
            border: none;
            margin: 30px 40% 10px 40%;
            transition: 1s;
        }

        form button:hover{
            transform: scale(1.05);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.719);
        }

        form a{
            text-decoration: none;
            color: crimson;
            font-size: 0.9em;
            font-style: normal;
            text-align: center;
            width: 100%;
            margin-top: 20px;
        }

        form i{
            background-color: red;
            color:  white;
            font-size: 0.95em;
            padding: 5px;
            border-radius: 5px;
            width: 100%;
            text-align: center;
            font-style: normal;
            margin-bottom: 10px;
            cursor: default;
            display: none;
        }


    </style>
</head>
<body>
    <div class="form">
        <p>UPDATE YOUR REGISTER DETAILS TO CONTINUE </p>
        <form action="../php/update.php" method="POST">
            <i></i>
            <input type="text" value="<?php echo $_SESSION['user_id']; ?>" hidden>
            <input type="text" value="<?php echo $firstname; ?>" name="firstname" placeholder="Enter your firstname">
            <input type="text" name="lastname" value="<?php echo $lastname ;?>" placeholder="Enter your lastname">
            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your Email">
            <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter your password">
            <button name="register" >UPDATE</button>
            
        </form>
    </div>

    <script src="../js/update.js"></script>
</body>
</html>