<?php
session_start();
require_once "db.php";

if (validSessionCons()) {

    header("Location: cons.php");
    exit;
}

// check if the user authenticated before
if (!validSessionMarkt()) {
    header("Location: loginMarkt.php");
    exit;
}


$userData = $_SESSION["MarktUser"];

// if ($userData["Flag"] === false) 
if(empty($_GET))
{
    if($userData["Auth_Code"]!=1){
        header("Location: logout.php");
    }
}
else{

    $email = $_GET["email"];

$_SESSION["MarktUser"] = getUserMarkt($email);
}
// var_dump($userData["Flag"]);

if (!empty($_POST))
    extract($_POST);




if (isset($change)) {
    if (getUserMarkt($email) and !(getUserMarkt($email)["email"] == $userData["email"]))
        $error = true;
    else {
        $stmt = $db->prepare('update market_user set email = ?, name = ?, password = ?, city = ?, district = ?, address = ?, token = ? where email = ?');

        $salt = "fni13uc0xrhf7332mf3";
        $pass = $password . $salt;
        $pass = sha1($pass);

        $stmt->execute([$email, $name, $pass, $city, $dis, $address, 1, $userData["email"]]);
        
        $_SESSION["MarktUser"] = getUserMarkt($email);
        $userData = $_SESSION["MarktUser"];
    }
}

if (isset($add_product)) {

    // var_dump($title, $stock, $norm_price, $disc_price, $exp_date, $_FILES["img"]["name"]);
    // var_dump($_FILES);
    if (isset($title, $stock, $norm_price, $disc_price, $exp_date,) and $_FILES["img"]["error"] == 0) {
        $fileExt = explode('.', $_FILES["img"]["name"]);
        $fileExt = strtolower(end($fileExt));
        $allowed = ['jpg', 'jpeg', 'png'];
        // var_dump($fileExt);
        if (in_array($fileExt, $allowed)) {

            $tmp_name = $_FILES["img"]["tmp_name"];

            $imgSalt = "asjdklsjadlajslaskkkk";
            $img = uniqid() . $imgSalt;
            $img = sha1($img) . '.' . $fileExt;
            move_uploaded_file($tmp_name, "../images/${img}");

            $category = $category == 'select' ? null : $category;
            $sub_category = $sub_category == 'Select' ? null : $sub_category;
            $brand = $brand == '' ? null : $brand;




            addProduct($title, $userData["email"], $stock, $norm_price, $disc_price, $exp_date, $img, $brand, $category, $sub_category);
            unset($fillAll, $wrongFormat);
        } else {
            $wrongFormat = true;
        }
    } else {
        $fillAll = 1;
    }
}

?>

<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>markt</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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

    #menu {
        display: flex;
    }

    #menu div {
        width: 40%;
        background-color: green;
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
        background-color: lightgreen;
        color: black;
    }

    #profileData,
    #addP {
        display: none;
    }

    div {
        border: 1px solid black;
    }

    #products_table tr {
        border: 1px solid red;
    }
    </style>
</head>

<body>
    <div id="head">
        <h1>GigaMarkt.com <span>Market</span> </h1>
    </div>
    <h1>Welcome <?php //$userData["name"] ?></h1>
    <div id="menu">
        <div id="list">Products</div>
        <div id="add">Add Items</div>
        <div id="prof">My Profile</div>
        <div id="out">Log Out</div>
    </div>
    <div id="body"><?php //echo "<h2>List of Items</h2>"; ?></div>

    <?php //if (isset($error)) : ?>
    <div id="warning">
        <h1 style="color:red;">
            EMAIL ALREADY EXISTS
        </h1>
    </div>
    <?php //endif; ?>

    <?php //if (isset($fillAll)) : ?>
    <div id="fillAll">
        <h1 style="color:red;">
            Product was not added! <br>
            Fill all required fields! <br>
        </h1>
    </div>
    <?php //endif; ?>

    <?php //if (isset($wrongFormat)) : ?>
    <div id="wrongFormat">
        <h1 style="color:red;">
            Wrong file extension! <br>
            Accepted formats = "jpg, png, jpeg" <br>
        </h1>
    </div>
    <?php //endif; ?>

    <div id="products">
        <?php
        /*
        // $products = ;
        $products_list = getAllProducts($userData["email"]);
        $expirted_products_list = getAllExpiredProducts($userData["email"]);

        // var_dump(($products_list));
        // var_dump(($expirted_products_list));

        $newRow = 0;
        echo '<table id = "products_table">';
        foreach ($products_list as $list) {
            // var_dump($newRow);
            if ($newRow % 3 === 0)
                echo '<tr>';

            $discount = round(100 - $list["discounted_price"] * 100 / $list["normal_price"], 2);
            echo '<td>';
            echo "<div style='display : inline-block;'> {$list['title']} </div>";
            echo "<div style='display : inline-block;'>Discount {$discount}%</div>";
            echo "<div class = 'img_div'><img src='../images/{$list['img_name']}' alt='' width = '200px' height = '200px'></div>";
            echo "<div style='display : inline-block; text-decoration-line: line-through;'>{$list['normal_price']}&#8378;</div>";
            echo "<div style='display : inline-block;'> {$list['discounted_price']}&#8378; </div>";
            echo "<br>";
            echo "<div style='display : inline-block;'>Expiry Date: {$list['exp_date']} </div>";
            echo "<button type='button'>+</button>";
            echo "<button type='button'>-</button>";
            echo '</td>';

            if ($newRow % 3 === 2)
                echo '</tr>';
            $newRow++;
        }
        foreach ($expirted_products_list as $list) {
            // var_dump($newRow);
            if ($newRow % 3 === 0)
                echo '<tr>';

            $discount = round(100 -  $list["discounted_price"] * 100 / $list["normal_price"], 2);
            echo "<td style = 'border : 5px solid red;'>";
            echo "<div style='display : inline-block;'> {$list['title']} </div>";
            echo "<div style='display : inline-block;'>Discount {$discount}%</div>";
            // echo "<div class = 'img_div'><img src='../images/{$list['img_name']}' alt='' width = '200px' height = '200px'></div>";
            echo "<div class = 'img_div'><img src='../images/{$list['img_name']}' alt='' width = '200px' height = '200px'></div>";
            echo "<div style='display : inline-block; text-decoration-line: line-through;'>{$list['normal_price']}&#8378;</div>";
            echo "<div style='display : inline-block;'> {$list['discounted_price']}&#8378; </div>";
            echo "<br>";
            echo "<div style='display : inline-block;'>Expiry Date: {$list['exp_date']} </div>";
            echo "<button type='button'>+</button>";
            echo "<button type='button'>-</button>";
            echo '</td>';

            if ($newRow % 3 === 2)
                echo '</tr>';
            $newRow++;
        }
        echo '</table>'*/;
        ?>
    </div>

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
                    <td colspan="2" style="text-align: center;"><button>Update Profile</button></td>
                </tr>
                <input type="hidden" name="change" value="1" />
            </table>
        </form>
    </div>

    <div id="addP">
        <form action="?" method="post" enctype="multipart/form-data">
            <table id="main">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title"></input></td>
                </tr>
                <tr>
                    <td>Stock Number: </td>
                    <td><input type="text" name="stock"></input></td>
                </tr>
                <tr>
                    <td>Normal Price: </td>
                    <td><input type="text" name="norm_price"></input></td>
                </tr>
                <tr>
                    <td>Discounted Price: </td>
                    <td><input type="text" name="disc_price"></input></td>
                </tr>
                <tr>
                    <td>Expiration Date: </td>
                    <td><input type="date" name="exp_date" placeholder="dd-mm-yyyy"></input></td>
                </tr>
                <tr>
                    <td>Upload the Image: </td>
                    <td><input type="file" name="img"></input></td>
                </tr>
                <tr>
                    <td>Brand (Optional): </td>
                    <td><input type="text" name="brand"></input></td>
                </tr>
                <tr>
                    <td>Category (Optional): </td>
                    <td>
                        <select class="combo" name="category" id="category">
                            <option value="select">Select....</option>
                            <option value="dairy">Dairy</option>
                            <option value="drink">Drinks</option>
                            <option value="bathroom">Bathroom Utensils</option>
                            <option value="snacks">Snacks</option>
                            <option value="baked">Baked Goods</option>
                    </td>
                </tr>
                <tr>
                    <td>Categorize More? (Optional): </td>
                    <td>
                        <select class="combo" name="sub_category" id="sub_category">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><button>Add Product</button></td>
                </tr>
                <input type="hidden" name="add_product" value="1" />
            </table>
        </form>
    </div>

    <script>
    function createOptions(arr) {
        let out = "";
        for (let opt of arr) {
            out += `<option value="${opt}">${opt}</option>`;
        }
        return out;
    }

    $(function() {
        var lists = {
            "select": ["Select"],
            "dairy": ["Select", "Milk", "Yoghurt", "Cheese", "Butter", "Cream"],
            "drink": ["Select", "Cold_Drink", "Alcohol", "Coffee", "Ice_Tea"],
            "bathroom": ["Select", "Shampoo", "Soap", "Shaving_Cream", "Tooth_Paste"],
            "snacks": ["Select", "Chips", "Sunflower_Seeds", "Popcorn", "Cereal"],
            "baked": ["Select", "Bread", "Cake", "Biscuit", "Lukum"]
        };
        $("#sub_category").html(createOptions(lists.select));
        $("#category").change(function() {
            $("#sub_category").html(createOptions(lists[this.value]));
        })
    });
    </script>


    <script>
    $(function() {
        $("#menu div").click(function() {
            $("#menu div").css("background-color", "green");
            $("#menu div").css("color", "white");
            $(this).css("background-color", "lightgreen");
            $(this).css("color", "black");
            var x = $(this).attr('id');
            switch (x) {
                case 'list':
                    $("#body").html("<?php //echo "<h2>Products you added</h2>"; ?>");
                    $("#profileData").css("display", "none");
                    $("#warning").css("display", "none");
                    $("#addP").css("display", "none");
                    $("#fillAll").css("display", "none");
                    $("#wrongFormat").css("display", "none");
                    $("#products").css("display", "block");
                    break;
                case 'add':
                    $("#body").html("<?php //echo "<h2>Add Item</h2>"; ?>");
                    $("#profileData").css("display", "none");
                    $("#warning").css("display", "none");
                    $("#addP").css("display", "block");
                    $("#fillAll").css("display", "none");
                    $("#wrongFormat").css("display", "none");
                    $("#products").css("display", "none");
                    break;
                case 'prof':
                    $("#body").html("<?php //echo "<h2>Edit Profile</h2>"; ?>");
                    $("#profileData").css("display", "block");
                    $("#warning").css("display", "none");
                    $("#addP").css("display", "none");
                    $("#fillAll").css("display", "none");
                    $("#wrongFormat").css("display", "none");
                    $("#products").css("display", "none");
                    break;
                case 'out':
                    $("#body").html("<?php //echo "<a href='logout.php'><h2>Exit</h2></a>"; ?>");
                    $("#profileData").css("display", "none");
                    $("#warning").css("display", "none");
                    $("#addP").css("display", "none");
                    $("#fillAll").css("display", "none");
                    $("#wrongFormat").css("display", "none");
                    $("#products").css("display", "none");
                    break;
            }
        })
    })
    </script>
</body>

</html>-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>markt</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Oxygen&family=Righteous&display=swap');
    .slide-in-bottom{-webkit-animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) both;animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) both}
    /* ----------------------------------------------
 * Generated by Animista on 2022-5-15 21:4:45
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}
    #head {
        width: 100%;
        background-color: #444;
        color: white;
        padding: 10px 10px;
        display: flex;
    }

    body {
        margin: 0px 0px;
        font-family: 'Oxygen', sans-serif;
        background-image: url(BackgroundO.png);
    }

    #head h1 {
        margin: 0px 0px;
        font-family: 'Roboto', sans-serif;
        font-size: 50px;
    }

    span {
        font-size: 20px;
        color: lightgreen;
    }

    div #out {
        width: 10%;
    }

    h2 {
        text-align: center;
    }
    #profileData, #addP{
        display: none;
    }
    #head div{
        border: none;
    }
    #products{
        display: flex;
    }
    #products_table tr{
        border: 1px solid red;
    }
    #head #fill{
        width: 20%;
    }
    #head table{
        margin-right: 0px;
    }
    h2{
        color: white;
    }
    #head #select{
        width: 39%;
        padding: 0px;
        font-family: 'Oxygen', sans-serif;
        text-align: center;
        height: 20px;
        padding-top: 20px;
    }
    #head #select td{
        padding: 0px;
        border-radius: 15px;
        cursor: pointer;
    }
    #list{
        background-color: white;
        color: black;
    }
    </style>


</head>
<style>
#item{
    font-family: 'Oxygen', sans-serif;
    border-radius: 10px;
    border: 4px solid green;
    padding: 10px;
    background-color: white;   
}
#item h3{
    text-align:center;
    align-items: center;
}
#thru{
    text-decoration: line-through;
    color: black;
}
#cnt{
    margin: 0px auto;
    text-align: center;
    
}
#welcome{
    font-family: 'Oxygen', sans-serif;
    font-size: 20px;
    margin-left: 10px;
    color: white;
}
#products #Lside{
    width: 20%;
}
#products #Rside{
    width: 20%;
}
#products #products_tables{
    width: 33%;
}
#main td{
    padding: 10px;
}
#select td{
    width: 50px;
}
#main{
    border: 1px solid black;
    border-radius: 20px;
    background-color: #444;
    color: white;
}
#exitem{
    font-family: 'Oxygen', sans-serif;
    border-radius: 10px;
    border: 4px solid red;
    padding: 10px;
    background-color: white;   
}
#exitem h3{
    text-align:center;
    align-items: center;
}
#oot{
    display: flex;
}
#inleft{
    width: 40%;
}
#in{
    background-color: #444;
    color: white;
    width: 20%;
    border-radius: 15px;
}

</style>
<body>
    <div id="head">
        <h1>GigaMarkt.com <span>Market</span> </h1>
        <div id="fill"></div>
        <table id="select">
            <tr>
                <td id="list">Browse Items</td>
                <td id="add">Add an Item</td>
                <td id="prof">My Profile</td>
                <td id="out">Log Out</td>
            </tr>
        </table>
    </div>
    <h1 id='welcome'>Welcome <?= $userData["name"] ?></h1>
    <div id="body"><h2 style="font-family: 'Oxygen', sans-serif; " class='slide-in-bottom'>Products</h2></div>

    <?php if(isset($error)): ?>
    <div id="warning">
        <h1 style="color:red;">
            EMAIL ALREADY EXISTS
        </h1>
    </div>
    <?php endif; ?>

    <?php if(isset($fillAll)): ?>
    <div id="fillAll">
        <h1 style="color:red;">
            Product was not added! <br>
            Fill all required fields! <br>
        </h1>
    </div>
    <?php endif; ?>

    <?php if(isset($wrongFormat)): ?>
    <div id="wrongFormat">
        <h1 style="color:red;">
            Wrong file extension! <br>
            Accepted formats = "jpg, png, jpeg" <br>
        </h1>
    </div>
    <?php endif; ?>

    <div id="products">
        <div id="Lside"></div>
        <?php
        
        // $products = ;
        $products_list = getAllProducts($userData["email"]);
        $expirted_products_list = getAllExpiredProducts($userData["email"]);
        
        // var_dump(($products_list));
        // var_dump(($expirted_products_list));
        
        $newRow = 0;
        echo '<div class="slide-in-bottom"><table id = "products_table">';
        foreach($products_list as $list){
            // var_dump($newRow);
            if($newRow % 3 === 0)
                echo '<tr>';
            if($list["normal_price"]!=0)
                $discount = round(100 - $list["discounted_price"] * 100 / $list["normal_price"], 2);
            else
                $discount = 0;
            echo '<td>';
            /*echo "<div id='tit' style='display : inline-block;'> {$list['title']} </div>";
            echo "<div id='disc' style='display : inline-block;'>Discount {$discount}%</div>";
            echo "<div id='imag' class = 'img_div'><img src='../images/{$list['img_name']}' alt='' width = '200px' height = '200px'></div>";
            echo "<div id='prc' style='display : inline-block; text-decoration-line: line-through;'>{$list['normal_price']}&#8378;</div>";
            echo "<div id='disprc' style='display : inline-block;'> {$list['discounted_price']}&#8378; </div>";
            echo "<br>";
            echo "<div style='display : inline-block;'>Expiry Date: {$list['exp_date']} </div>";
            echo "<button type='button'>+</button>";
            echo "<button type='button'>-</button>";*/
            echo "<div id='item'>
                <h3>{$list['title']}</h3>
                <h3 id='disc'>{$discount} %</h3>
                <div id='cnt'><img id='imag' src='../images/{$list['img_name']}' alt='' width = '150px' height = '150px'></div>
                <h3><span id='thru'>{$list['normal_price']}&#8378;</span> {$list['discounted_price']}&#8378; </h3>
                <h3 id='exp'>Expires on {$list['exp_date']}</h3>
                <div>";
            echo '</td>';

            if($newRow % 3 === 2)
                echo '</tr>';
            $newRow ++;
            
        }
        foreach($expirted_products_list as $list){
            // var_dump($newRow);
            if($newRow % 3 === 0)
                echo '<tr>';
            if($list["normal_price"]!=0)
            $discount = round(100 -  $list["discounted_price"] * 100 / $list["normal_price"], 2);
            echo "<td>";
            /*echo "<div style='display : inline-block;'> {$list['title']} </div>";
            echo "<div style='display : inline-block;'>Discount {$discount}%</div>";
            // echo "<div class = 'img_div'><img src='../images/{$list['img_name']}' alt='' width = '200px' height = '200px'></div>";
            echo "<div class = 'img_div'><img src='../images/{$list['img_name']}' alt='' width = '200px' height = '200px'></div>";
            echo "<div style='display : inline-block; text-decoration-line: line-through;'>{$list['normal_price']}&#8378;</div>";
            echo "<div style='display : inline-block;'> {$list['discounted_price']}&#8378; </div>";
            echo "<br>";
            echo "<div style='display : inline-block;'>Expiry Date: {$list['exp_date']} </div>";
            echo "<button type='button'>+</button>";
            echo "<button type='button'>-</button>";*/
            echo "<div id='exitem'>
                <h3>{$list['title']}</h3>
                <h3>{$discount} %</h3>
                <div id='cnt'><img src='../images/{$list['img_name']}' alt='' width = '150px' height = '150px'></div>
                <h3><span id='thru'>{$list['normal_price']}&#8378;</span> {$list['discounted_price']}&#8378; </h3>
                <h3>Expires on {$list['exp_date']}</h3>
                <div>";
            echo '</td>';

            if($newRow % 3 === 2)
                echo '</tr>';
            $newRow ++;
            
        }
        echo '</table></div>';
        ?>
    
    <div id="Rside"></div>
    </div>
    
    <div id="profileData" class="slide-in-bottom">
        <form action="?" method="post">
            <table id="main" style="margin: 10px auto;">
                <tr>
                    <td>E-mail:</td>
                    <td><input type="text" name="email" value="<?= isset($email) ?  $email : '' ?>"></input></td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" value="<?= isset($name) ?  $name : '' ?>"></input></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password"
                            value="<?= isset($password) ?  $password : '' ?>"></input>
                    </td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td><input type="text" name="city" value="<?= isset($city) ?  $city : '' ?>"></input></td>
                </tr>
                <tr>
                    <td>District: </td>
                    <td><input type="text" name="dis" value="<?= isset($dis) ?  $dis : '' ?>"></input></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><input type="text" name="address" value="<?= isset($address) ?  $address : '' ?>"></input></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><button>Update Profile</button></td>
                </tr>
                <input type="hidden" name="change" value="1" />
            </table>
        </form>
    </div>

    <div id="addP">
        <form action="?" method="post" enctype="multipart/form-data" class="slide-in-bottom">
            <table id="main" style="margin: 10px auto;">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" value="<?= isset($title) ?  $title : '' ?>"></input></td>
                </tr>
                <tr>
                    <td>Stock Number: </td>
                    <td><input type="text" name="stock" value="<?= isset($stock) ?  $stock : '' ?>"></input></td>
                </tr>
                <tr>
                    <td>Normal Price: </td>
                    <td><input type="text" name="norm_price"
                            value="<?= isset($norm_price) ?  $norm_price : '' ?>"></input>
                    </td>
                </tr>
                <tr>
                    <td>Discounted Price: </td>
                    <td><input type="text" name="disc_price"
                            value="<?= isset($disc_price) ?  $disc_price : '' ?>"></input>
                    </td>
                </tr>
                <tr>
                    <td>Expiration Date: </td>
                    <td><input type="date" name="exp_date" placeholder="dd-mm-yyyy"></input></td>
                </tr>
                <tr>
                    <td>Upload the Image: </td>
                    <td><input type="file" name="img"></input></td>
                </tr>
                <tr>
                    <td>Brand (Optional): </td>
                    <td><input type="text" name="brand" value="<?= isset($bran) ?  $brand : '' ?>"></input>
                    </td>
                </tr>
                <tr>
                    <td>Category (Optional): </td>
                    <td>
                        <select class="combo" name="category" id="category">
                            <option value="select">Select....</option>
                            <option value="dairy">Dairy</option>
                            <option value="drink">Drinks</option>
                            <option value="bathroom">Bathroom Utensils</option>
                            <option value="snacks">Snacks</option>
                            <option value="baked">Baked Goods</option>
                    </td>
                </tr>
                <tr>
                    <td>Categorize More? (Optional): </td>
                    <td>
                        <select class="combo" name="sub_category" id="sub_category">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><button>Add Product</button></td>
                </tr>
                <input type="hidden" name="add_product" value="1" />
            </table>
        </form>
    </div>

    <div id="addP" class="slide-in-bottom">
    <form action="?" method="post" enctype="multipart/form-data"> 
        <table id="main" style="margin: 10px auto;">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title"></input></td>
            </tr>
            <tr>
                <td>Stock Number: </td>
                <td><input type="text" name="stock"></input></td>
            </tr>
            <tr>
                <td>Normal Price: </td>
                <td><input type="text" name="norm_price"></input></td>
            </tr>
            <tr>
                <td>Discounted Price: </td>
                <td><input type="text" name="disc_price"></input></td>
            </tr>
            <tr>
                <td>Expiration Date: </td>
                <td><input type="date" name="exp_date" placeholder="dd-mm-yyyy"></input></td>
            </tr>
            <tr>
                <td>Upload the Image: </td>
                <td><input type="file" name="img"></input></td>
            </tr>
            <tr>
                <td>Brand (Optional): </td>
                <td><input type="text" name="brand"></input></td>
            </tr>
            <tr>
                <td>Category (Optional): </td>
                <td>
                <select class="combo" name="category" id="category">
                    <option value="select">Select....</option>
                    <option value="dairy">Dairy</option>
                    <option value="drink">Drinks</option>
                    <option value="bathroom">Bathroom Utensils</option>
                    <option value="snacks">Snacks</option>
                    <option value="baked">Baked Goods</option>
                </td>
            </tr>
            <tr>
                <td>Categorize More? (Optional): </td>
                <td>
                <select class="combo" name="sub_category" id="sub_category">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button>Add Product</button></td>
            </tr>
            <input type="hidden" name="add_product" value="1" />
        </table>
    </form>
    </div>

    <script>
        function createOptions(arr) {
           let out = "" ;
           for (let opt of arr) {
               out += `<option value="${opt}">${opt}</option>` ;
           }
           return out ;
        }

        $(function(){
            var lists = {
                         "select" : ["Select"],
                         "dairy" : ["Select" , "Milk", "Yoghurt", "Cheese", "Butter", "Cream"] , 
                         "drink" : ["Select" , "Cold_Drink", "Alcohol", "Coffee", "Ice_Tea"],
                         "bathroom" : ["Select" , "Shampoo", "Soap", "Shaving_Cream", "Tooth_Paste"],
                         "snacks" : ["Select" , "Chips", "Sunflower_Seeds", "Popcorn","Cereal"],
                         "baked" : ["Select" , "Bread", "Cake", "Biscuit", "Lukum"] 
            } ;
            $("#sub_category").html(createOptions(lists.select)) ;
            $("#category").change(function(){
                $("#sub_category").html(createOptions(lists[this.value])) ;
            })
        }) ;
    </script>


    <script>
    $(function() {
        $("#select td").click(function() {
            $("#select td").css("background-color", "#444");
            $("#select td").css("color", "white");
            $(this).css("background-color", "white");
            $(this).css("color", "black");
            var x = $(this).attr('id');
            switch (x) {
                case 'list':
                    $("#body").html("<h2  class='slide-in-bottom'>Products</h2>");
                    $("#profileData").css("display","none");
                    $("#warning").css("display","none");
                    $("#addP").css("display","none");
                    $("#fillAll").css("display","none");
                    $("#wrongFormat").css("display","none");
                    $("#products").css("display","flex");
                    break;
                case 'add':
                    $("#body").html("<?php echo "<h2 class='slide-in-bottom'>Add Item</h2>"; ?>");
                    $("#profileData").css("display","none");
                    $("#warning").css("display","none");
                    $("#addP").css("display","block");
                    $("#fillAll").css("display","none");
                    $("#wrongFormat").css("display","none");
                    $("#products").css("display","none");
                    $("#welcome").css("display","none");
                    break;
                case 'prof':
                    $("#body").html("<?php echo "<h2  class='slide-in-bottom'>Edit Profile</h2>"; ?>");
                    $("#profileData").css("display","block");
                    $("#warning").css("display","none");
                    $("#addP").css("display","none");
                    $("#fillAll").css("display","none");
                    $("#wrongFormat").css("display","none");
                    $("#products").css("display","none");
                    $("#welcome").css("display","none");
                    break;
                case 'out':
                    $("#body").html("<?php echo "<div class='slide-in-bottom'><h2>Do You want to log out?</h2><br><div id='oot'><div id='inleft'></div><div id='in'><a href='logout.php'><h2>Yes</h2></a><a href='markt.php'><br><h2>No</h2></a></div></div>"; ?>");
                    $("#profileData").css("display","none");
                    $("#warning").css("display","none");
                    $("#addP").css("display","none");
                    $("#fillAll").css("display","none");
                    $("#wrongFormat").css("display","none");
                    $("#products").css("display","none");
                    $("#welcome").css("display","none");
                    break;
            }
        })
    })
    </script>
</body>

</html>
