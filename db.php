<?php

const DSN = "mysql:host=localhost;dbname=gigamarkt;port=3306;charset=utf8mb4";
const USER = "root";
const PASSWORD = "";

$db = new PDO(DSN, USER, PASSWORD);

function checkUserMarkt($email, $pass)
{
    global $db;

    $stmt = $db->prepare("select * from market_user where email=?");
    $stmt->execute([$email]);
    if ($stmt->rowCount()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $salt = "fni13uc0xrhf7332mf3";
      $pass = $pass . $salt;
      $pass = sha1($pass);

        return $pass == $user["password"];
    }
    return false;
}

function checkUserCons($email, $pass)
{
    global $db;

    $stmt = $db->prepare("select * from consumer_user where email=?");
    $stmt->execute([$email]);
    if ($stmt->rowCount()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $salt = "fni13uc0xrhf7332mf3";
      $pass = $pass . $salt;
      $pass = sha1($pass);

        return $pass == $user["password"];
    }
    return false;
}

function validSessionCons()
{
    return isset($_SESSION["ConsUser"]);
}

function validSessionMarkt()
{
    return isset($_SESSION["MarktUser"]);
}

function getUserMarkt($email)
{
    global $db;
    $stmt = $db->prepare("select * from market_user where email=?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserCons($email)
{
    global $db;
    $stmt = $db->prepare("select * from consumer_user where email=?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addProduct($title,$email,  $stock, $norm_price, $disc_price, $exp_date, $img, $brand, $category, $sub_category){
    
    global $db;
    $stmt = $db->prepare("insert into products (title, email, stock, normal_price, discounted_price, exp_date,
    img_name, brand, category, sub_category) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title,$email, $stock, $norm_price, $disc_price, $exp_date, $img, $brand, $category, $sub_category]);
    return true;
}

function getAllProducts($email){
    
    global $db;
    $stmt = $db->prepare("Select * from gigamarkt.products where email = ? and exp_date >= CURDATE()");
    $stmt->execute([$email]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllProductsne($cat){
    
    global $db;
    $stmt = $db->prepare("Select * from gigamarkt.products category = ? and exp_date >= CURDATE()");
    $stmt->execute([$cat]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllExpiredProducts($email){
    
    global $db;
    $stmt = $db->prepare("Select * from gigamarkt.products where email = ? and exp_date < CURDATE()");
    $stmt->execute([$email]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSearched($name){
    global $db;
    $stmt = $db->prepare("Select * from gigamarkt.products where title like ? ");
    $stmt->execute(["%$name%"]);
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function checkCity($cityName, $img){
    global $db;
    $stmt = $db->prepare("Select * from gigamarkt.products where img_name = ? ");
    $stmt->execute([$img]);
    $temp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!isset($temp))
        return false;

    
    $stmt = $db->prepare("Select * from gigamarkt.market_user where email = ? ");
    $stmt->execute([$temp[0]["email"]]);
    $temp = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($temp);
    return strtolower($temp[0]["city"]) == strtolower($cityName);
}
/*
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
                    <option value="s_drink">Drinks</option>
                    <option value="bathroom">Bathroom Utensils</option>
                    <option value="snacks">Snacks</option>
                    <option value="baked">Baked Goods</option>
                </td>
            </tr>
            <tr>
                <td>Categorize More? (Optional): </td>
                <td>
                <select class="combo" name="sub_category" id="sub_category">
                    <option value="select">Select....</option>
                    <script>
                    if($("#category").val()=="dairy"){
                        $("sub_category").add(<option value="cheese">Cheese</option>);
                    
                    // <option value="dairy">Dairy</option>
                    // <option value="s_drink">Drinks</option>
                    }
                    </script>
                    <option value="select">Select....</option>
                    <option value="sausage">Sausages</option>
                    <option value="carbonated_drink">Carbonated Drinks</option>
                    <option value="juice">Juice</option>
                    <option value="bread">Bread</option>
                    <option value="cake">Cakes</option>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button>Add Product</button></td>
            </tr>
            <input type="hidden" name="add_product" value="1" />
        </table>
    </form>
    </div>*/