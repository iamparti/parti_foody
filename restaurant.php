<!doctype html>
<?php 
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
?>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    
    <!--====== HEADER PART ENDS ======-->                                  echo 'window.location.replace("restaurant.php")';




    <!--====== PAGE TITLE PART START ======-->
    
    <section class="page-title-area bg_cover" style="background-image: url(assets/images/page-bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h3 class="title">All Restaurant</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Restaurant</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== RESTAURANT PART START ======-->
    
    <section class="restaurant-area pt-140">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <img src="assets/images/shape/title-shape-3.png" alt="title">
                        <h3 class="title">Your Nearest Reataurant</h3>
                        <p>Find your nearest Resturant .</p>
                    </div>
                </div>
            
                <div class="col-lg">
                    <div class="search-restaurant">
                        <form action="" method="POST">
                            <div class="input-box">
                            <input  list="city"  name="city" id="citys" placeholder="Type Place, City, Division" required >
                                     <datalist id="city">
 
  
  </datalist>
                            </div>
                           
                           
                            
                            <div class="input-box">
                                <button class="main-btn" type="submit" name='search'><i class="far fa-search"></i> Search</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
              
              
               <?php 
                            
                            if(isset($_POST['search'])){
                                $city=$_POST['city'];
                            $res=mysqli_query($conn,"SELECT *FROM restaurants WHERE city_name='{$city}';");
                              if(mysqli_num_rows($res)>0){
                                  while($resdetails=mysqli_fetch_assoc($res)){
                                      
                             
                            
                            
                            ?>
              
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="restaurant-item mt-30">
                        <div class="restaurant-thumb">
                            <img src="assets/images/res.png" alt="">
                            <!--<span>Open at 10:00 AM</span>-->
                        </div>
                        <div class="restaurant-content">
                            <div class="item d-flex justify-content-between align-items-center">
                                <a href="menu.php?res=<?php echo $resdetails['name'].'&resid='.base64_encode($resdetails['restaurants_id']).'&seats='.$resdetails['seats'].'&booked_seats='.$resdetails['booked_seats'];?>"><?php echo $resdetails['name'];?></a>
                                <!--for rating <span>4.6 <i class="fas fa-star"></i></span>-->
                            </div>
                            <!--for Products list  <p>Burger • Pizza • Pasta • Asian</p>-->
                            <p>Phone • <?php echo $resdetails['phone'].' • Email • '.$resdetails['email'];?></p>
                        </div>
                    </div>
                </div>
               
              
             <?php      }
                              }else{
                                  echo '<script>';
                                  echo 'alert("No Restaurants in this City");';
                                  echo 'window.location.replace("restaurant.php")';
                                  echo '</script>';
                              }
                            }?>
            </div>
        </div>
    </section>
    
    <!--====== RESTAURANT PART ENDS ======-->

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

 
 
});
</script>
    
    

 
 <?php include'include/footer.php';?>
    
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
