<!doctype html>
<?php session_start();

include 'include/config.php';
$site_info=mysqli_query($conn,"SELECT *FROM site_setting;");
while($data=mysqli_fetch_assoc($site_info)){
    $site_title=$data['site_name'];
    $site_info=$data['info'];
    $site_subtitle=$data['subtitle'];
    $banner=$data['image_path'];
    $app_link=$data['app_link'];
    $title=$data['title'];
    

}
$id=$_SESSION['userid'];
$info=mysqli_query($conn,"SELECT address ,email,phone FROM userlist WHERE user_id='{$id}' ;");
while($d=mysqli_fetch_assoc($info)){
    $address=$d['address'];
    $email=base64_encode($d['email']);
    $phone=base64_encode($d['phone']);
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
    
  <?php include 'include/header.php';?>
    
    <!--====== HEADER PART ENDS ======-->

<style>
  

       .rotate:hover
{
    cursor: default;
    transform: rotate(360deg);
    transition: all 0.99s ease-in-out 0s;
}


.order-now {
  background-color: red; 
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 3px 2px;
  cursor: pointer;
  border-radius: 12px;
}
  
    
</style>


    <!--====== FOOD MENU PART START ======-->
    
    <section class="food-menu-area restaurant-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="food-menu-box">
                        <div class="project-menu">
                            <center><h3>Cart</h3>  
                            <?php 
                            if($e>0){
                             if($address==''){
                                   echo '<br><button class="order-now" onclick="window.location.replace(`userarea.php?redirect=cart.php`);">Add Address to Complete Order</button>';
                             }else{
                                   echo '<button class="order-now" onclick="checkout();">Order Now</button>';
                             }
                            }else{
                                     echo '<br><button class="order-now" onclick="window.location.replace(`index.php`);">Add Item</button>';
                            }?>
                            </center>
                            
                        </div>
                        <div class="row grid">
                           <?php 
                           
                           if(!isset($_SESSION['userid'])){
                           
                          header("Location: login.php");
                           
                           }else{
                         
                                $data=mysqli_query($conn,"SELECT *FROM user_cart u  INNER JOIN products p ON p.product_id=u.product_id INNER JOIN product_category c ON c.id=p.category_id WHERE u.user_id='{$id}' ");
                                if(mysqli_num_rows($data)>0){
                                    while($pinfo=mysqli_fetch_assoc($data)){
                                        
                           ?>
                           
                           
                            <div class="col-lg-6 cat-1 cat-5 cat-2">
                                
                                <div class="food-menu-item mt-30 d-block d-sm-flex align-items-center">
                                  
                                    <div class="food-menu-thumb">
                                        <i class="fas fa-trash-alt" onclick="window.location.replace('controller/remove_cart_item.php?uid=<?php echo base64_encode($id).'&pid='.base64_encode($pinfo['product_id']); ?>');" style="color: red;cursor: pointer;" ></i>
                                        <img src="<?php echo $pinfo['image'];?>"  class="rotate" alt="item" height="10%" width="10%">
                                    </div>
                                    <div class="food-menu-content">
                                        <a href="#"><h4 class="title"><?php echo $pinfo['name'];?></h4></a>
                                        <ul>
                                            <li>Food Type: <?php echo $pinfo['category'];?></li>
                                            <li>Delivery time: 60 Minutes, Delivery Cost: Free</li>
                                        </ul>
                                        <span>&#8377;<?php echo $pinfo['mrp']; ?></span>
                                    </div>
                                 
                                </div>
                            </div>
                         
                         <?php 
                         
                         
                                    }
                                }else{
                                    
                                    echo 'No product in cart';
                                }
                         }?>

                          
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== FOOD MENU PART ENDS ======-->

  

    <!--====== FOOTER PART START ======-->
    
 <?php include 'include/footer.php';?>
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== GO TO TOP PART START ======-->
    
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
    



<script>
function checkout() {
  
  if (confirm("You really want to order?")) {
   window.location.replace("controller/ordernow.php?phash=<?php echo base64_encode($_SESSION['userid']).'&uemail='.$email.'&uphone='.$phone;?>");
    
  } else {
      window.location.replace('cart.php');
  
  }
  
}
</script>


    
    
    
    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>
    
    <!--====== Isotope js ======-->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    
    <!--====== Images Loaded js ======-->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    
    <!--====== parallaxie js ======-->
    <script src="assets/js/parallaxie.js"></script>
    
    <!--====== nice select js ======-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    
    <!--====== odometer js ======-->
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
