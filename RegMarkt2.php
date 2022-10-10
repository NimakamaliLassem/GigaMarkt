<?php
/*<form action="?" method="post">
    Email : <input type="text" name="email">
    <br><br>
    Password : <input type="password" name="pass">
    <br><br>
    <button type="submit">Enter</button>
</form>*/
require "db.php";
require "mail.php";
$error = 0;

session_start();


if (validSessionCons()) {

    header("Location: cons.php");
    exit;
}

if (!empty($_POST)) {
    extract($_POST);

    $stmt = $db->prepare("select * from market_user where email=?");
    $stmt->execute([$email]);
    if ($stmt->rowCount()) {
        $error = 1;
    } else {
        $rand = rand(100000,999999);
        $val = email($email, $name);
        $stmt = $db->prepare("insert into market_user (email, name, password, city, district, address, Flag, Auth_Code, token) values (?, ?, ?, ?, ?, ?, false, $rand, 1)");

        $salt = "fni13uc0xrhf7332mf3";
        $pass = $password . $salt;
        $pass = sha1($pass);

        $stmt->execute([$email, $name, $pass, $city, $dis, $address]);
        

        var_dump($password);
        if (checkUserMarkt($email, $password)) {

            $_SESSION["MarktUser"] = getUserMarkt($email);
            header("Location: mail.php");
            exit;
            }
    
        

    }
}

if (validSessionMarkt()) {
    header("Location: markt.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Login</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Oxygen&family=Righteous&display=swap');

    #head {
        width: 100%;
        background-color: orangered;
        color: white;
        padding: 10px 10px;
        border-radius: 10px;
    }

    body {
        margin: 0px 0px;
    }

    #head h1 {
        margin: 0px 0px;
        font-family: 'Righteous', cursive;
        font-size: 50px;
    }

    span {
        font-size: 20px;
        color: lightgreen;
    }

    #main {
        font-size: 20px;
        font-family: 'Oxygen', sans-serif;
        margin: 20px auto;
        border: 1px solid black;
        border-radius: 7px;
    }

    #main td {
        padding: 10px 10px;
    }

    input {
        border-radius: 7px;
    }

    button {
        background-color: green;
        color: white;
        border-radius: 7px;
    }

    #back {
        text-align: center;
    }
    .overlay {
      position: fixed;
      left: 0;
      top: 0 ;
      right: 0;
      bottom: 0;
      background: rgba(255,255,255,0.5) ;
      display: flex;
      justify-content: center;
      align-items: center;
  }
  .modal {
    background: #464b5e;
    color: white;
    max-width: 30rem;
    padding: 3.2rem;
    text-align: center;
    outline: none; }
  
  .modal__title {
    margin: 0 0 1.6rem 0; }
  
  .modal__body {
    font-size: 2rem;
    font-weight: 300;
    margin: 0 0 3.2rem 0; }
    </style>
</head>

<body>
    <div id="head">
        <h1>GigaMarkt.com <span>Market Login</span> </h1>
    </div>




    <form id="form" action="?" method="post">
        <table id="main">
            <tr>
                <td>E-mail:</td>
                <td><input type="text" name="email"></input></td>
            </tr>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name"></input></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></input></td>
            </tr>
            <tr>
                <td>City: </td>
                <td><input type="text" name="city"></input></td>
            </tr>
            <tr>
                <td>District: </td>
                <td><input type="text" name="dis"></input></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><input type="text" name="address"></input></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button>Register</button></a></td>
            </tr>
            <input type="hidden" id="auth" />
        </table>
    </form>
    <div id="back"><a href="index.php">Go Back</a><br><?php if ($error == 1) {
                                                            echo "Invalid email";
                                                        } ?></div>
    <script>
    //    function reg(){
    //     alert("Hello")

    //    }

            
                                                        

    </script>
</body>
</html>