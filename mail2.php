<?php



// session_start();
// $userData = $_SESSION["MarktUser"];

if (!empty($_POST)) {
	$email2 =  $_GET["email"];
	require_once "db.php";
	extract($_POST);
	$que = $db->prepare('select * from consumer_user where Auth_Code=?');
	// $que = $db->prepare('select * from market_user where Auth_Code=? and email=$userData["email"]');
	$que->execute([$code]);
	if ($que->rowCount()) {
		$db->query("update consumer_user set flag=1 where Auth_Code=$code");
        $db->query("update consumer_user set Auth_Code = 1 where Auth_Code=$code");
		header("Location: cons.php?email=$email2");
	} else {
		echo "<script>alert('Wrong Code!')</script>";
	}
}
else {
	global $email;
$email =  $_GET["email"];
}
// var_dump($email);

// $stmt = $db->query("select * from market_user where email=$rec");

?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Faster+One&family=Roboto:wght@500&display=swap');
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Verification</title>
</head>

<body>
<div class="container" >
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <h1 class="fashion_taital">GigaMarkt&trade;</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    <div id="half"><img src="/login/BackgroundO.png" alt=""></div>
    <div id="half2"><img src="/login/BackgroundP.png" alt=""></div>
    <div id="over" data-ani="flip">
        <table>
            <tr>
                <h2>VERIFICATION</h2>
            </tr>
            <tr>
                <h3>Enter the code sent to your email</h3>
            </tr>
			<?php
			global $email;
			$email =  $_GET["email"];
            echo '<form action="?email='.$email.'" method="post" id="form">'
			?>
                <tr>
                    <td>
                        <input type="text" name="code" id="code">
                    </td>
                    <td>
                        <button>Submit</button>
                    </td>
					
                </tr>
            </form>
        </table>
    </div>
</body>
<style>
table {
    display: flex;
    margin: 20px auto;
    border-collapse: collapse;
    justify-content: center;
}

h2,
h3, input{
    font-family: 'Roboto', sans-serif;
    font-size: 4.5vh;
    padding-top: 1vh;
    padding-bottom: 2vh;
}
h1{
    font-family: 'Roboto', sans-serif;

}

body {
    padding: 0;
    margin: 0;
}

#half img{
    height: 50vh;
    width: 100vw;
    border-radius: 0px;
    padding: 0px;
    object-fit: cover;
}

#half2 img{
    background-image: url(login/BackgroundP.png);
    height: 50vh;
    width: 100vw;
    padding-top: 50vh;
    border-radius: 0px;
    padding: 0px;
    object-fit: cover;

}

#over {
    font-size: larger;
    text-align: center;
    position: fixed;
    /* Sit on top of the page content */
    /* Hidden by default */
    width: 50%;
    /* Full width (cover the whole page) */
    height: 50%;
    /* Full height (cover the whole page) */
    top: 25vh;
    left: 25vw;
    right: 0;
    bottom: 0;
    background-color: rgba(240, 240, 240, .9);
    /* Black background with opacity */
    z-index: 2;
    /* Specify a stack order in case you're using a different order for other elements */

}

#code {
    border: 3px solid #555;
    height: 12vh;
    font-size: 4.5vw;
    text-align: center;
    width: 18vw;
}

button {
    height: 12vh;
    border: 3px solid #555;
    text-align: center;
    padding-top: 0;
    cursor: pointer;
    font-family: 'Roboto', sans-serif;
    font-weight: bolder;
}

/* SEPERATOR */
#over::before {
    transform: scaleX(0);
    transform-origin: bottom right;
}

#over:hover::before {
    transform: scaleX(1);
    transform-origin: bottom left;
}

#over::before {
    content: " ";
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    inset: 0 0 0 0;
    background: hsl(150 100% 80%);
    z-index: -1;
    transition: transform .3s ease;
}
.container{
    position: absolute;
    width: 100vw;
}
.fashion_taital {
    width: 100%;
    font-size: 40px;
    color: #e9e9e9;
    text-align: center;
    font-weight: bold;

}
.header_section_top {
    width: 100%;
    float: left;
    background-color: #2b2a29;
    clip-path: polygon(0 0, 100% 0, 96% 100%, 3% 100%);
    height: auto;
    padding: 10px 0px;
}

.custom_menu {
    width: 100%;
    margin: 0 auto;
    text-align: center;
}

@media (orientation: landscape) {
    body {
        grid-auto-flow: column;
    }
}
</style>

</html>
<script>


</script>
<?php


?>