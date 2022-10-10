<?php
require "db.php";
session_start();

if (validSessionCons()) {

    header("Location: cons.php");
    exit;
}
  
//     if (validSessionMarkt()) {
    
//     header("Location: markt.php");
//     exit;
// }
 

?>
<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GigaMarkt Login</title>
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

</html>-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/login/css/stylenew.css">
    <title>GigaMarkt Login</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Faster+One&family=Roboto:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oxygen&family=Righteous&display=swap');

    #head {
        width: 100%;
        background-color: orangered;
        color: white;
        padding: 10px 10px;
    }

    body {
        margin: 0px 0px;
    }

    #head h1 {
        margin: 0px 0px;
        font-family: 'Righteous', cursive;
        font-size: 50px;
    }

    h2 {
        font-size: 1.8vw;
        font-weight: bolder;
        font-family: 'Oxygen', sans-serif;
    }

    #select {
        display: flex;
    }

    #select div {
        /*width: 20%;*/
        font-size: 24px;
        font-family: 'Oxygen', sans-serif;
        text-align: center;
        color: white;
        border-radius: 20px;
        padding: 10px 20px;
    }

    #user {
    background-color: #252525;
        height: 40vh;
        width: 30vw;
        margin-left: 1vw;
        /* margin-right: 20px; */
        /* padding-left: 10px; */
        /* background-color: blue; */
    }

    #market {
        background-color: #252525;
        height: 40vh;
        width: 30vw;
        margin-right: 1vw;
    }

    div #mid {
        width: 7%;
    }

    a {
        width: 30%;
        text-decoration: none;
        color: lightcoral;
    }
    #look{
            font-size: 2vw;
    }
    div #left{
        width: 15%;
    }
    </style>
</head>

<body>
    
<body>
    <!-- header top section start -->
    <div class="container" >
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <h1 class="fashion_taital"  style=" font-family: 'Roboto', sans-serif;">GigaMarkt&trade;</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    <div id="Fl">
    <!-- <div id="half"><img src="/login/BackgroundO.png" alt=""></div> -->
    <!-- <div id="half2"><img src="/login/BackgroundO.png" alt=""></div> -->
    </div>
    <div id="over" class="bounce-in-bottom">
        <h2>Welcome to GigaMarkt! Please register or log in to proceed.</h2>
        <div id="select">

        <div id="user"><span id="look" style=" padding-bottom: 10vh;">Looking to buy?</span>  <br> Click  <a href="loginCons.php">here</a> for customer login <br>or <a href="RegCons.php">here</a> for customer registration</div>
        <div id="mid"></div>
        <div id="market"><span id="look">Looking to sell?</span> <br>Click <a href="loginMarkt.php">here</a> for market login <br>or <a href="RegMarkt.php">here</a> for market registration</div>
        </div>   
    </div>

</body>
<style>
.bounce-in-bottom{-webkit-animation:bounce-in-bottom 1.1s both;animation:bounce-in-bottom 1.1s both}
/* ----------------------------------------------
 * Generated by Animista on 2022-5-15 3:38:38
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

@-webkit-keyframes bounce-in-bottom{0%{-webkit-transform:translateY(500px);transform:translateY(500px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:0}38%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}55%{-webkit-transform:translateY(65px);transform:translateY(65px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}72%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}81%{-webkit-transform:translateY(28px);transform:translateY(28px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}90%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}95%{-webkit-transform:translateY(8px);transform:translateY(8px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}100%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}@keyframes bounce-in-bottom{0%{-webkit-transform:translateY(500px);transform:translateY(500px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:0}38%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}55%{-webkit-transform:translateY(65px);transform:translateY(65px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}72%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}81%{-webkit-transform:translateY(28px);transform:translateY(28px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}90%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}95%{-webkit-transform:translateY(8px);transform:translateY(8px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}100%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}}
 body {
        background-image: url(/login/BackgroundO.png);

    padding: 0;
    margin: 0;
    
}
#user {
   
}
#Fl{
    display: flex;
    flex-direction: column;
}
#half img{
    height: 100vh;
    width: 100vw;
    border-radius: 0px;
    padding: 0px;
    object-fit: cover;
    margin-bottom: 0;
}
/* 
#half2 img{
    margin-top: 0;
    height: 50vh;
    width: 100vw;
    padding-top: 50vh;
    border-radius: 0px;
    padding: 0px;
    object-fit: cover;
    border-collapse: collapse; 

}*/

#over h2{
    margin-top: 5vh;
    margin-bottom: 3vh;
}
#over {
    font-size: larger;
    text-align: center;
    position: fixed;
    /* Sit on top of the page content */
    /* Hidden by default */
    width: 55vw;
    /* Full width (cover the whole page) */
    height: 55vh;
    /* Full height (cover the whole page) */
    top: 20vh;
    left: 20vw;
    right: 0;
    bottom: 0;
    background-color: rgba(255 , 255, 255, .8);
    border-radius: 1vw;
    /* Black background with opacity */
    z-index: 2;
    /* Specify a stack order in case you're using a different order for other elements */

}
#select {
    text-align: center;
    margin: 0 auto;
}
</style>
</html>