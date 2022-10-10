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
        header("Location: markt.php");
        exit;
    }
    echo "<p>Wrong email or password</p>";
}

// auto login (homework)
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

</html>