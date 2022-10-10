<?php

session_start();
require "db.php";


if (validSessionCons()) {

    header("Location: cons.php");
    exit;
}


if (!empty($_POST)) {
    extract($_POST);


    if (checkUserMarkt($email, $pass)) {


        $_SESSION["MarktUser"] = getUserMarkt($email);
        $userData = $_SESSION["MarktUser"];

        if ($userData["Flag"] == false) {
            header("Location: mail.php?email=$email");
        }
        else{

            header("Location: markt.php?email=$email");

        }
            
        exit;
    }
    echo "<p>Wrong email or password</p>";
}

// auto login (homework)
if (validSessionMarkt()) {
    $db->query("update market_user set Auth_Code = 1 where email=$email");
    header("Location: markt.php");
    exit;
}

?>

<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Market Login</h1>
    <form action="?" method="post">
        Email : <input type="text" name="email">
        <br><br>
        Password : <input type="password" name="pass">
        <br><br>
        <button type="submit">Enter</button>
    </form>

</body>

</html>-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          @import url('https://fonts.googleapis.com/css2?family=Oxygen&family=Righteous&display=swap');
         #head{
            width: 100%;
            background-color: orangered;
            color: white;
            padding: 10px 10px;
        }
        body{
            margin: 0px 0px;
        }
        #head h1{
            margin: 0px 0px;
            font-family: 'Righteous', cursive;
            font-size: 50px;
        }
        span{
            font-size: 20px;
            color: lightgreen;
        }
        #main{
            font-size: 20px;
            font-family: 'Oxygen', sans-serif;
            margin: 20px auto;
            border: 1px solid black;
            border-radius: 7px;
        }
        #main td{
            padding: 10px 10px;
        }
        input{
            border-radius: 7px;
        }
        button{
            background-color: green;
            color: white;
            border-radius: 7px;
        }
        #back{
            text-align: center;
        }
        </style>
</head>

<body>
<div id="head"><h1>GigaMarkt.com <span>Market Login</span> </h1></div>    
    <form action="?" method="post">
    <table id="main">
        <tr>
            <td>E-mail:</td>
            <td><input type="text" name="email"></input></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><button type="submit">Login</button></a></td>
        </tr>
    </table>
    </form>
    <div id="back"><a href="index.php">Go Back</a></div>

</body>

</html>