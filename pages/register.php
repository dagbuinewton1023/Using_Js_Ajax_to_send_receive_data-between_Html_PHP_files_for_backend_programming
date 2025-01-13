<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
            width: 30%;
            text-align: center;
          box-shadow: 0 0 5px crimson;
          margin: 0 35%;
          margin-bottom: 20px;
          border-radius: 10px;
          background-color: rgba(220, 20, 60, 0.034);
          cursor: default;
          
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
        <p>REGISTER TO GET STARTED WITH PHP AND JS AJAX</p>
        <form action="../php/register.php" method="POST">
            <i></i>
            <input type="text" name="firstname" placeholder="Enter your firstname">
            <input type="text" name="lastname" placeholder="Enter your lastname">
            <input type="email" name="email" placeholder="Enter your Email">
            <input type="password" name="password" placeholder="Enter your password">
            <button name="register" >REGISTER</button>
            <a href="login.php">Already have an account? Sign in</a>
            
        </form>
    </div>

    <script src="../js/register.js"></script>
</body>
</html>