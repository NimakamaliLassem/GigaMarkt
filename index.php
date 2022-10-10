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
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <link rel="stylesheet" type="text/css" href="/login/css/stylenew.css">
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
   </head>
   <style>
@import url('https://fonts.googleapis.com/css2?family=Faster+One&family=Roboto:wght@500&display=swap');
</style>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main" style="background-repeat: repeat-y;">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top"  style="width: 100vw; position:absolute;top:0;left:0;">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <h1 class="fashion_taital" style=" font-family: 'Roboto', sans-serif;">GigaMarkt&trade;</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src=""></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section" style="position:absolute; margin-top:2vh;">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.php">Home</a>
                     <a href="/login/userLog.php">Register/Login</a>
                     <a href="markt.php">Market users</a>
                     <a href="cons.php">Consumers</a>
                  </div>
                  <span  style="margin-top: 1vh;"class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <!-- <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </div> -->
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group" style="display: none;">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <!-- <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="images/flag-france.png" class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div> -->
                     <div class="login_menu">
                        <ul  style="font-weight: bolder; font-size: larger;">
                           <!-- <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"  style="font-size: xx-large;"></i>
                              <span class="padding_10" style="font-size:x-large;">Cart</span></a>
                           </li> -->
                           <li><a href="userLog.php">
                              <i class="fa fa-user" aria-hidden="true" style="font-size: xx-large;"></i>
                              <span class="padding_10" style="font-size:x-large;">Login</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Drinks!<br>Last Minute For Cheap</h1>
                              <div class="buynow_bt"><a href="userLog.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Snacks!<br>Last Minute For Cheap</h1>
                              <div class="buynow_bt"><a href="userLog.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Dairy!<br>Last Minute For Cheap</h1>
                              <div class="buynow_bt"><a href="userLog.php">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container" style="padding-top: 4vh;">
                     <h1 class="fashion_taital">Snacks</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                         <?php
      $products = getAllProducts('snacks@gmail.com');
      // var_dump($products);
      $i=0;
      foreach($products as $product){
         $i++;
         if($i>3)
          break;
                     echo '<div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">'.$product['title'].'</h4>
    <p class="price_text">Discount Price  <span style="color: #262626;">'.$product['discounted_price'].'</span></p>
                                 <div class="tshirt_img"><img src="../images/'.$product['img_name'].'"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="userLog.php">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="userLog.php">See More</a></div>
                                 </div>
                              </div>
                          </div>';
      }
                        //    <div class="col-lg-4 col-sm-4">
                        //       <div class="box_main">
                        //          <h4 class="shirt_text">Man -shirt</h4>
                        //          <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                        //          <div class="tshirt_img"><img src="images/dress-shirt-img.png"></div>
                        //          <div class="btn_main">
                        //             <div class="buy_bt"><a href="#">Buy Now</a></div>
                        //             <div class="seemore_bt"><a href="#">See More</a></div>
                        //          </div>
                        //       </div>
                        //    </div>
                        //    <div class="col-lg-4 col-sm-4">
                        //       <div class="box_main">
                        //          <h4 class="shirt_text">Woman Scart</h4>
                        //          <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                        //          <div class="tshirt_img"><img src="images/women-clothes-img.png"></div>
                        //          <div class="btn_main">
                        //             <div class="buy_bt"><a href="#">Buy Now</a></div>
                        //             <div class="seemore_bt"><a href="#">See More</a></div>
                        //          </div>
                        //       </div>
                        //    </div>
                        // </div>';
                        ?>
                     </div>
                  </div>
               </div>
   </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Drinks</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                        <?php
      $products2 = getAllProducts('drinks@mail.com.gm');
      // var_dump($products);
      $i=0;
      foreach($products2 as $product){
         $i++;
         if($i>3)
          break;
                     echo '<div class="col-lg-4 col-sm-4">
                              <div class="box_main" style="height=25vh;">
                                 <h4 class="shirt_text">'.$product['title'].'</h4>
                                 <p class="price_text">Discount Price  <span style="color: #262626;">'.$product['discounted_price'].'</span></p>
                                 <div class="tshirt_img"><img src="../images/'.$product['img_name'].'"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="userLog.php">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="userLog.php">See More</a></div>
                                 </div>
                              </div>
                          </div>';
      }
      ?>
                           <!-- <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Man T -shirt</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                 <div class="tshirt_img"><img src="images/tshirt-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Man -shirt</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                 <div class="tshirt_img"><img src="images/dress-shirt-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Woman Scart</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                 <div class="tshirt_img"><img src="images/women-clothes-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
   </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Dairy</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                        <?php
      $products2 = getAllProducts('dairy@mail.com.gm');
      // var_dump($products);
      $i=0;
      foreach($products2 as $product){
         $i++;
         if($i>3)
          break;
                     echo '<div class="col-lg-4 col-sm-4">
                              <div class="box_main" style="height=25vh;">
                                 <h4 class="shirt_text">'.$product['title'].'</h4>
                                 <p class="price_text">Discount Price  <span style="color: #262626; font-weight: bolder">'.$product['discounted_price'].'</span></p>
                                 <div class="tshirt_img"><img src="../images/'.$product['img_name'].'"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="userLog.php">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="userLog.php">See More</a></div>
                                 </div>
                              </div>
                          </div>';
      }
      ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- fashion section end -->
      <!-- electronic section start -->
      <!-- <div class="fashion_section">
         <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Electronic</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Laptop</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/laptop-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Mobile</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/mobile-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Computers</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/computer-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Electronic</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Laptop</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/laptop-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Mobile</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/mobile-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Computers</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/computer-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Electronic</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Laptop</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/laptop-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Mobile</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/mobile-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Computers</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="electronic_img"><img src="images/computer-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div> -->
      <!-- electronic section end -->
      <!-- jewellery  section start -->
      <!-- <div class="jewellery_section">
         <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Jewellery Accessories</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Jumkas</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Necklaces</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Kangans</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/kangan-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Jewellery Accessories</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Jumkas</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Necklaces</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Kangans</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/kangan-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Jewellery Accessories</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Jumkas</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/jhumka-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Necklaces</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/neklesh-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">Kangans</h4>
                                 <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                 <div class="jewellery_img"><img src="images/kangan-img.png"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>-->
            <!-- <a class="carousel-control-prev" style="height:3vh;" href="#jewellery_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" style="height:3vh;" href="#jewellery_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>  -->
        <!-- </div> -->
      </div>
      <!-- jewellery  section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.php"><h1 class="fashion_taital">GigaMarkt&trade;</h1></a></div>
            <!-- <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div> -->
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>