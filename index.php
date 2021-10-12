<!doctype html>
<?php 
session_start();
include 'include/config.php';
$site_info=mysqli_query($conn,"SELECT *FROM site_setting;");
while($data=mysqli_fetch_assoc($site_info)){
    $site_title=$data['site_name'];
    $site_info=$data['info'];
    $site_subtitle=$data['subtitle'];
    $banner=$data['image_path'];
    $app_link=$data['app_link'];
    $title=$data['title'];
    $default_restaurant_id=$data['default_restaurant_id'];
    

}
?>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title><?php echo $site_title;?> </title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="assets/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
  
  
</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
   
    <!--====== HEADER PART START ======-->
    
  <?php 
  include 'include/header.php';
  
  ?>
    
    <!--====== HEADER PART ENDS ======-->

    <!--====== BANNER PART START ======-->
    
    <section class="banner-2-area bg_cover d-flex align-items-center parallaxie" style="background-image: url(<?php echo $banner;?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <?php 
                        if(isset($_GET['rs'])){
                              echo '<h2 class="title">'.base64_decode($_GET['rs']).'</h2>';
                        }else{
                         echo ' <h2 class="title">'. $title.'</h2>';
                        }?>
                      
                        <p><?php echo $site_subtitle;?> </p>
                        <div class="search-restaurant">
                            <form method="POST">
                                <div class="input-box">
                                    <input  list="city"  name="city" id="citys" placeholder="Type Place, City, Division" required >
                                     <datalist id="city">
 
  
  </datalist>
                                </div>
                                <div class="input-box item-2">
                                    <input list="res" placeholder="Restaurant" name="res" id="ress" reuired>
                                </div>
                                <datalist id="res">
                                  
                                </datalist>
                                <div class="input-box">
                                    <button class="main-btn" type="submit" name='search'><i class="far fa-search"></i> Search</button>
                                </div>

                                
                            </form>
                            <?php 
                            
                            if(isset($_POST['search'])){
                                
                            
                               echo '<script>';
                               echo 'window.location.replace("https://foody.partibha.ml/index.php?city='.base64_encode($_POST['city']).'&rs='.base64_encode($_POST['res']);
                               echo '");';
                               echo '</script>';
                            }
                            
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
$(document).ready(function(){
 function callcity(){
     $.ajax({
        url: "include/loadcity.php",
        type: "POST",
        success : function(data){
            $("#city").append(data);
        }
     });
     
 }
 
 callcity();
 $("#citys").change(function(){
    
    var city=$("#citys").val();
   
     $.ajax({
        url: "include/loadres.php",
        type: "POST",
        data :{city: city} ,
        success : function(data){
            $("#res").append(data);
        }
     });
    
 });
 
 
});
</script>
    
    
    
    
   
    
    
    <!--====== BANNER PART ENDS ======-->

    <!--====== OFFER PART START ======-->
    <style>
.rotate {
  animation: rotation 21s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}


.slow {
  animation: rotation 30s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}


    </style>
    <section class="offer-area pt-150 pb-150">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title text-left">
                        <img src="assets/images/shape/title-shape-3.png" alt="title">
                        <h3 class="title">Special Offer</h3>
                        <p>The Process of our service</p>
                    </div>
                    <div class="offer-text">
                        <span>Best Service For Our Customer</span>
                        <p>Sale text demo.</p>
                    </div>
                </div>
               <?php 
               $sp=mysqli_query($conn,"SELECT *FROM offer o INNER JOIN products p ON p.product_id=o.product_id ORDER BY RAND() LIMIT 2");
               while($offer=mysqli_fetch_assoc($sp)){
                   $c=2;
               ?>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="offer-item item-<?php echo $c;?>">
                        <div class="offer-box">
                            <img src="assets/images/offer-box-2.png" alt="">
                        </div>
                        <div class="offer-thumb text-center">
                            <img src="<?php echo $offer['image'];?>" class="rotate"  alt="" height="45%" width="45%">
                        </div>
                        <div class="offer-content text-center">
                            <h4 class="title"><?php echo $offer['name'];?></h4>
                            <span>Don’t Delay to Order</span>
                            <a class="main-btn" href="controller/add_cart_item.php?pid=<?php echo base64_encode($offer['product_id'])?>">Order Now</a>
                        </div>
                    </div>
                </div>
                <?php $c=1;}?>
                
                
            </div>
        </div>
    </section>
    
    <!--====== OFFER PART ENDS ======-->

    <!--====== DISCOVER PART START ======-->
    
    <section class="discover-area bg_cover" style="background-image: url(assets/images/discover-bg.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <img src="assets/images/shape/title-shape-3.png" alt="title">
                      <?php if(isset($_GET['rs'])){
                        echo ' <h3 class="title">'.base64_decode($_GET['rs']).'</h3>';
                          
                      }else{
                      echo '  <h3 class="title">Discover Our Products</h3>';
                      
                      }?>
                        <p>The Process of our service</p>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Products</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
               
               <?php if(isset($_GET['rs'])){
                   $res=base64_decode($_GET['rs']);
                   $restaurants=mysqli_query($conn,"SELECT restaurants_id FROM restaurants WHERE name='{$res}' ");
                   if(mysqli_num_rows($restaurants)>0){
                      $rid=mysqli_fetch_assoc($restaurants);
                      
                      $product=mysqli_query($conn,"SELECT *FROM products p INNER JOIN prodcut_unit pu ON pu.id=p.unit_id WHERE p.restaurants_id='{$rid['restaurants_id']}' ");
                      if(mysqli_num_rows($product)>0){
                          while($details=mysqli_fetch_assoc($product)){
                              
                   
               ?>
                       
                        <div class="col-lg-4 col-md-6">
                            <div class="discover-item mt-30">
                                <div class="discover-thumb text-center">
                                    <img src="<?php echo $details['image'];?>" class="slow" height="250px" width="250px" alt="pizza">
                                    <span>Sale</span>
                                </div>
                                <div class="discover-content">
                                    <h4 class="title"><?php echo $details['name'];?></h4>
                                    <p><?php echo $details['info'];?></p>
                                    <div class="review-box d-flex align-items-center justify-content-between">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <div class="cm-box">
                                            <span><?php echo $details['amount'];?></span>
                                            <!--<span class="item-2">30 CM</span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="discover-order d-flex justify-content-between align-items-center">
                                    <span>&#8377;<?php echo $details['mrp'];?> /<del>&#8377;<?php echo $details['extra_mrp'];?></del></span>
                                    <a class="main-btn" href="#"><i class="fas fa-shopping-basket"></i>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        
                       <?php 
                       
                       
                          }
                      }
                      
                      
                   }else{
                       //Wrong Link redirect to home index.php
                       echo '<script>alert("Wrong Link");</script>';
                       echo '<script>window.location.replace("index.php");</script>';
                   }


               
               }else{
                   $product=mysqli_query($conn,"SELECT *FROM products p INNER JOIN prodcut_unit pu ON pu.id=p.unit_id WHERE p.restaurants_id='{$default_restaurant_id}' ");
                      if(mysqli_num_rows($product)>0){
                          while($details=mysqli_fetch_assoc($product)){
                              
                   
                 echo '    <div class="col-lg-4 col-md-6">
                            <div class="discover-item mt-30">
                                <div class="discover-thumb text-center">
                                    <img src="'. $details['image'].'" class="slow" height="250px" width="250px" alt="pizza">
                                    <span>Sale</span>
                                </div>
                                <div class="discover-content">
                                    <h4 class="title">'.$details['name'].'</h4>
                                    
                                    <p>'.$details['info'].'</p>
                                    <div class="review-box d-flex align-items-center justify-content-between">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <div class="cm-box">
                                            <span>'. $details['amount'].'</span>
                                            <!--<span class="item-2">30 CM</span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="discover-order d-flex justify-content-between align-items-center">
                                    <span>&#8377;'. $details['mrp'].' /<del>&#8377;'. $details['extra_mrp'].'</del></span>
                                    <a class="main-btn" href="controller/add_cart_item.php?pid='.base64_encode($details['product_id']).'"><i class="fas fa-shopping-basket"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>';
                   
                   
                          }}
                   
               }
               
               
                       
                       ?> 
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
         
      
    </section>
    
    <!--====== DISCOVER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->
    
    <section class="services-area pt-120 pb-140">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="services-item text-center mt-30">
                        <i class="fas fa-motorcycle"></i>
                        <h3 class="title">Fast Delivery in 1 Hour</h3>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="services-item text-center mt-30">
                        <i class="fas fa-mobile-android"></i>
                        <h3 class="title">Amazing Mobile App</h3>
                    
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="services-item text-center mt-30">
                        <i class="fas fa-map-marked"></i>
                        <h3 class="title">Wide Coverage Map</h3>
                      
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="services-item text-center mt-30">
                        <i class="fas fa-user-secret"></i>
                        <h3 class="title">More Than 15 Restaurant </h3>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== SERVICES PART ENDS ======-->

    <!--====== SPECIAL MENU PART START ======-->
    
    <section class="special-menu-area pb-190">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <img src="assets/images/shape/title-shape-3.png" alt="title">
                        <h3 class="title">Something Special For You</h3>
                        <p>All delicious food for food lovers</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-8">
                    <div class="special-menu-1 mt-30">
                        <h4 class="title">Kadai Paneer</h4>
                        <p>Kadai paneer is a simple yet amazingly flavorful paneer dish made by cooking paneer and bell peppers with fresh ground spices known as kadai masala. 
                        </p>
                       
                       
                        <div class="thumb"><br>
                            <img src="https://desichef.in/assets/img/product/slider-image/kadai_paneer.png" height="250px" class="rotate"  width="250px" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-8">
                    <div class="special-menu-item mt-30">
                        <div class="order-btn">
                            <img src="https://www.cakegift.in/sites/default/files/Kesar%20Gulab%20Jamun.png" alt="">
                           
                        </div>
                        <div class="special-menu-1 special-menu-2">
                            <h4 class="title">Gulab Jamun</h4>
                            <p>Gulab jamun is a milk-solid-based sweet, originating in Medieval Iran, and a type of mithai popular in India, Nepal, Pakistan, the Maldives, and Bangladesh, as well as Myanmar.</p>
                           
                        </div>
                    </div>
                    <div class="special-menu-item mt-30">
                        <div class="order-btn">
                            <img src="https://www.freepnglogos.com/uploads/burger-png/burger-png-png-images-yellow-images-12.png" alt="">
                         
                        </div>
                        <div class="special-menu-1 special-menu-2">
                            <h4 class="title">Burger</h4>
                            <p>A hamburger is a food, typically considered a sandwich, consisting of one or more cooked patties—usually ground meat, </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="special-menu-1 special-menu-3  mt-30">
                        <h4 class="title">Tirolese Pizza</h4>
                        <p>Pizza is an Italian dish consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients, which is then baked at a high temperature, traditionally in a wood-fired oven. A small pizza is sometimes called a pizzetta.  </p>
                        
                        <div class="thumb">
                            <img src="assets/images/special-menu-4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== SPECIAL MENU PART ENDS ======-->

    <!--====== DOWNLOAD 2 PART START ======-->
    
    <section class="download-2-area bg_cover parallaxie d-flex align-items-end" style="background-image: url(assets/images/download-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="download-item-content">
                        <h3 class="title">Foody Now In Your Hand</h3>
                        <p>Download! To Get This App Faster  way To Order Food</p>
                        <ul>
                        
                            <li><a href="#"><img src="assets/images/store-2.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mobile-screen">
                        <img src="assets/images/Mobile-screen.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  
    
   <?php 
   include 'include/footer.php';
   ?>
   
    
    <div class="go-top-area">
        <div class="go-top-wrap">
            <div class="go-top-btn-wrap">
                <div class="go-top go-top-btn">
                    <i class="fa fa-angle-double-up"></i>
                    <i class="fa fa-angle-double-up"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!--====== GO TO TOP PART ENDS ======-->
    





    
    
    
    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    


    
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
