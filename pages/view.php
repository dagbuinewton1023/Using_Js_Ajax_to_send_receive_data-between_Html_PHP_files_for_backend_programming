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

// fetching the users details from the database with the session id
$fetchUsers = $conn->query("SELECT * FROM `users`");
$fetchUsers->execute();
$users = $fetchUsers->fetchAll(PDO::FETCH_OBJ);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View DB</title>
</head>

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
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

        ::-webkit-scrollbar{
            width: 0;
        }

        .database{
            width: 90%;
            height: auto;
            box-shadow: 0 0 5px crimson;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15vh;
        }

        .database p{
            background-color: rgb(119, 3, 26);
            color: white;
            text-align: center;
            width: auto;
            margin: 20px 30%;
            border-radius: 10px;
            cursor: default;
            font-size: 1.5em;
            font-weight: bold;
            padding: 20px;
        }

        .database table{
            width: 100%;
            height: auto;
        }

        table thead{
            width: 100%;
            height: auto;
            background-color: rgb(119, 3, 26);
            color: white;
        }

        thead tr td{
            text-align: center;
            padding: 10px;
            font-weight: bold;
        }

        thead tr td:first-child{
            border-radius: 5px 0 0 0;
        }

        thead tr td:last-child{
            border-radius: 0 5px 0 0;
        }

        table tbody{
            background-color: rgba(0, 0, 0, 0.137);
            width: 100%;
        }

        tbody tr td{
            text-align: center;
            font-size: 1em;
            cursor: default;
            padding: 10px;
        }

        tbody tr:last-child td:first-child{
            border-radius: 0 0 0 5px;
        }

        tbody tr:last-child td:last-child{
            border-radius: 0 0 5px 0;
        }

        tbody tr td:last-child{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        tbody tr td:last-child a{
            text-decoration: none;
            color: rgb(87, 4, 20);
            background-color: rgba(220, 20, 60, 0.342);
            padding: 5px 10px;
            border-radius: 5px;
            transition: 1s;
        
        }

        
        tbody tr td:last-child a:hover{
          transform: scale(1.05);
        }

        .note{
            width: auto;
            margin: 0 30%;
            padding: 5px;
            background-color: blue;
            border-radius: 5px;
            margin-top: 20px;
            cursor: default;
            text-align: center;
            color: white;        
        }
        

</style>
<body>

    <div class="database">
        <p>MANAGE YOUR OWN DATABASE FROM HERE</p>
        <table>
            <thead>
                <tr>
                    <td>INDEX</td>
                    <td>FIRST NAME</td>
                    <td>LAST NAME</td>
                    <td>EMAIL</td>
                    <td>PASSWORD</td>
                    <td>ACTIONS</td>
                </tr>
            </thead>

            <tbody>
                <?php if($fetchUsers->rowCount() > 0){  ?>
                    <?php foreach($users as $user){?>
                    <tr> 
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->firstname; ?></td>
                            <td><?php echo $user->lastname; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->password; ?></td>
                            <td>
                                <a href="../php/delete.php?id=<?php echo $user->id ?>">
                                    Delete
                                </a>
                                <a href="../pages/update.php?id=<?php echo $user->id ?>">
                                    Update
                                </a>
                            </td>
                    </tr>
                    <?php } ?>
                <?php } else  {?>
            </tbody>



            <div class="note">
                No items in database 
            </div>

            <?php }?>

        </table>
    </div>
    
</body>
</html>