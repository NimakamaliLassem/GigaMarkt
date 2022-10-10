<?php
session_start();
require "db.php";


if (validSessionMarkt()) {
    header("Location: markt.php");
    exit;
}

// check if the user authenticated before
if (!validSessionCons()) {
    header("Location: loginCons.php");
    exit;
}


$userData = $_SESSION["ConsUser"];

if (!empty($_POST)) 
    extract($_POST);

if (isset($change)) {

    if(getUserCons($email) and !(getUserCons($email)["email"]==$userData["email"]))
        $error = true;
    else{
    $stmt = $db->prepare('update consumer_user set email = ?, fullname = ?, city = ?, district = ?, address = ?, token = ? where email = ?');
    $stmt->execute([$email, $name, $city, $dis, $address, 1, $userData["email"]]);
    $_SESSION["ConsUser"] = getUserCons($email);
    $userData = $_SESSION["ConsUser"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>cons</title>
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
        border: 1px solid red;
    }

    #head h1 {
        margin: 0px 0px;
        font-family: 'Righteous', cursive;
        font-size: 50px;
    }

    span {
        font-size: 20px;
        color: lightskyblue;
    }

    #menu {
        display: flex;
    }

    #menu div {
        width: 40%;
        background-color: blue;
        color: white;
        text-align: center;
        font-family: 'Oxygen', sans-serif;
        border-radius: 10px;
        padding: 10px;
        font-size: 30px;
        border-left: 3px solid white;
        /*border-right: 3px solid white;*/
    }

    div #out {
        width: 10%;
    }

    h2 {
        text-align: center;
    }

    #menu #list {
        background-color: lightskyblue;
        color: black;
    }
    #profileData{
        display: hidden;
    }
    </style>
</head>

<body>
    <div id="head">
        <h1>GigaMarkt.com <span>Customer</span> </h1>
    </div>
    <h1>Welcome <?= $userData["fullname"] ?></h1>
    <div id="menu">
        <div id="list">Browse Items</div>
        <div id="cart">Shopping Cart</div>
        <div id="prof">My Profile</div>
        <div id="out">Log Out</div>
    </div>
    <div id="body"><?php echo "<h2>List of Items</h2>"; ?></div>

    <?php if(isset($error)): ?>
    <div id="warning">
        <h1 style="color:red;">
            EMAIL ALREADY EXISTS
        </h1>
    </div>
    <?php endif; ?>

    <div id="profileData">
    <form action="?" method="post">
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
        <td colspan="2" style="text-align: center;">
        <button>Update Profile</button></td>
    </tr>
    <input type="hidden" name="change" value="1" />
</table>
</form> 
    </div>
        
        <script>
        $(function() {

            $("#menu div").click(function() {
                $("#menu div").css("background-color", "blue");
                $("#menu div").css("color", "white");
                $(this).css("background-color", "lightskyblue");
                $(this).css("color", "black");
                var x = $(this).attr('id');
                switch (x) {
                    case 'list':
                        
                        $("#body").html("<?php echo "<h2>List of Items</h2>"; $showProfile = false;?>");
                        $("#profileData").css("display","none");
                        $("#warning").css("display","none")
                        break;
                    case 'cart':
                        
                        $("#body").html("<?php echo "<h2>Shopping Cart</h2>";$showProfile = false;?>");
                        $("#profileData").css("display","none");
                        $("#warning").css("display","none")
                        break;
                    case 'prof':
                        
                        
                        $("#body").html("<?php echo "<h2>My Profile</h2>";?>");
                        $("#profileData").css("display","block");
                        $("#warning").css("display","block")
                         break;
                    case 'out':
                        
                        $("#body").html("<?php echo "<a href='logout.php'><h2>Exit</h2></a>";$showProfile = false;?>");
                        $("#profileData").css("display","none");
                        $("#warning").css("display","none")
                        break;
                }
            })
        })
        </script>
</body>

</html>