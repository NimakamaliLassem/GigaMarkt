<?php

session_start();
require "db.php";


if (validSessionMarkt()) {
    header("Location: markt.php");
    exit;
}


if (!empty($_POST)) {
    extract($_POST);

    if (checkUserCons($email)) {

        $_SESSION["ConsUser"] = getUserCons($email);
        header("Location: cons.php");
        exit;
    }
    echo "<p>Wrong email or password</p>";
}

// auto login (homework)
if (validSessionCons()) {

    header("Location: cons.php");
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
    <h1>Customer Login</h1>
    <form action="?" method="post">
        Email : <input type="text" name="email">
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
        span{
            font-size: 20px;
            color: lightskyblue;
        }
        #head h1{
            margin: 0px 0px;
            font-family: 'Righteous', cursive;
            font-size: 50px;
        }
        span{
            font-size: 20px;
            color: lightskyblue;
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
            background-color: blue;
            color: white;
            border-radius: 7px;
        }
        #back{
            text-align: center;
        }
    </style>
</head>

<body>
<div id="head"><h1>GigaMarkt.com <span>Customer Login</span> </h1></div>        
<!--<div id="frm">    
    
            Email : <input type="text" name="email">
            <br><br>
            Password : <input type="password" name="pass">
            <br><br>
            <button type="submit">Enter</button>
        </form>
</div>-->
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
            <td colspan="2" style="text-align: center;"><button type="submit">Login</button></td>
        </tr>
    </table>
</form>
    <div id="back"><a href="index.php">Go Back</a></div>
</body>
</html>