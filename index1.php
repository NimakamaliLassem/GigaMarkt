<?php
require "db.php";
session_start();

if (validSessionCons()) {

    header("Location: cons.php");
    exit;
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
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Eflyer</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <title>GigaMarkt Login</title>
    </head>
    <style>
   
    @import url('https://fonts.googleapis.com/css2?family=Oxygen&family=Righteous&display=swap');

    #head {
        width: 100%;
        background-color: orange;
        color: white;
        padding: 10px 10px;
        border-radius: 10px;
    }

    body {
        margin: 0px 0px;
        background-color: rgba(60,0,50,1);

    }

    #head h1 {
        margin: 0px 0px;
        font-family: 'Righteous', cursive;
        font-size: 50px;
    }

    h2 {
        padding-left: 10px;
        font-size: 22px;
        font-family: 'Oxygen', sans-serif;
        color: white;
    }

    #select {
        display: flex;
    }

    #select div {
        /*width: 20%;*/
        font-size: 24px;
        font-family: 'Oxygen', sans-serif;
        ;
        text-align: center;
        color: white;
        border-radius: 5px;
        padding: 10px 20px;
    }

    #user {
        margin-left: 10px;
        padding-left: 10px;
        background-color: blue;
    }

    #market {
        background-color: green;
    }

    div #mid {
        width: 7%;
    }

    a {
        width: 30%;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div id="head">
        <h1>GigaMarkt.com</h1>
    </div>
    <h2>Welcome to GigaMarkt! Please log in to proceed.</h2>
    <div id="select">
        <a href="RegCons.php">
            <div id="user">Looking to buy? <br> Click here for customer Register</div>
        </a>
        <div id="mid"></div>
        <a href="RegMarkt.php">
            <div id="market">Looking to sell? <br>Click here for market Register</div>
        </a>
    </div>
    <br>
    <div id="select">
        <a href="loginCons.php">
            <div id="user">customer login</div>
        </a>
        <div id="mid"></div>
        <a href="loginMarkt.php">
            <div id="market">market login</div>
        </a>
    </div>
    
</body>

</html>