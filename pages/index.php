<?php

// starting session
session_start();


// importing the connection to the database
require "../php/config.php";

// making this page not accessible when user is logged out or not registered
if(!isset($_SESSION['user_id'])){

    // redirecting the user back to the login page
    header("location: ../pages/login.php");
}
else{

    // fetching the users details from the database with the session id
    $fetchUser = $conn->query("SELECT * FROM `users` WHERE `id` = '$_SESSION[user_id]'");
    $fetchUser->execute();
    $User = $fetchUser->fetch(PDO::FETCH_ASSOC);

    // checking if the fetched user exists in the database
    if($fetchUser->rowCount() > 0){

        // creating variable to store the firstname,lastname and id
        $id = $User['id'];
        $firstname = $User['firstname'];
        $lastname = $User['lastname'];
    }
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

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

        .welcome{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .welcome p{
            font-size: 1.3em;
            color: crimson;
            padding: 20px 80px;
            box-shadow: 0 0 5px crimson;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: rgba(220, 20, 60, 0.034);
            cursor: default;
        }

        .welcome p i{
            font-style: normal;
            font-weight: bold;
            font-family: monospace;
            font-size: 1.5em;
        }

        .welcome .content{
            border: 1px solid black;
            padding: 10px;
            margin: 50px 25%;
            font-size: 1.1em;
            border-radius: 10px;
            width: auto;
            text-align: center;
            cursor: default;
            
        }

        .welcome a{
            text-decoration: none;
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

        .welcome a:hover{
            transform: scale(1.05);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.719);
        }

    </style>
</head>
<body class="loginPage">

    <div class="welcome">
        <p><i><?php if($fetchUser->rowCount() > 0) {
           echo $firstname . " " . $lastname;  
        } else{ ?>
    
            USER

        <?php } ?>
            </i>, WELCOME TO YOUR FIRST MINI HOMEPAGE</p>
        <div class="content">
            
        </div>

        <a href="../php/logout.php<?php if($fetchUser->rowCount() > 0){
            echo "?id=". $id;
        }  else{ echo "";}?>" class="logout">LOGOUT</a>
        <a href="../pages/view.php">VIEW YOUR MINI DATABASE</a>
    </div>

    <script>
        "use strict";

        const welcomeContainer = document.querySelector(".welcome .content");
        const welcomeMsg = `This introductory treatise serves as a foundational roadmap for newcomers to the dynamic and versatile world of PHP programming, providing an exhaustive overview of the essential principles, 
                    concepts, and best practices requisite for success in PHP web development. By emphasizing the paramount importance of consistent practice, grasping fundamental syntax and semantics, 
                    and leveraging an array of online resources, including tutorials, documentation, and communities of practice, beginners can establish a robust and sustainable foundation in PHP, 
                    facilitating a seamless transition from novice to proficient developer. This comprehensive guide aims to empower beginners with the theoretical foundations, practical skills, and emotional resilience necessary to navigate the complexities and nuances of 
                    PHP web development, while also fostering a deeper appreciation for the elegance, flexibility, and expressiveness of the PHP language itself.`;
        let w = 0;

        function typeWelcomeMsg(){
            setInterval(() => {
                if(w < welcomeMsg.length){
                welcomeContainer.textContent += welcomeMsg.charAt(w);
                w++;
            }
            }, 70);
        }

        typeWelcomeMsg()
    </script>


<script src="../js/logout.js"></script>
    
</body>
</html>