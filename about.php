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

    <!--====== PAGE TITLE PART START ======-->
    
    <section class="page-title-area bg_cover" style="background-image: url(assets/images/page-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h3 class="title">About Us</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a onclick="window.history.back();">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== ABOUT PART START ======-->
    
    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-thumb">
                        <img src="assets/images/about-thumb.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-content">
                        <img src="assets/images/shape/title-shape-3.png" alt="shape">
                        <h4 class="title">Welcome to top <span><?php echo $site_title; ?></span> where the food change  woth the seasons</h4>
                        <p><?php echo $site_info;?>.</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Easy to Use</li>
                            <li><i class="fas fa-check"></i>0% Commitions</li>
                            <li><i class="fas fa-check"></i>Fast Delivery.</li>
                        </ul>
                        <a class="main-btn" href="contact.php">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== ABOUT PART ENDS ======-->

    <!--====== HOW IT WORK PART START ======-->
    
    <section class="how-it-work-area how-it-work-2-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="how-it-work-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-title text-center">
                                    <img src="assets/images/shape/title-shape-3.png" alt="title">
                                    <h3 class="title">How it work</h3>
                                    <p>The Process of our service</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-8">
                                <div class="how-it-work-item mt-30">
                                    <a href="#"><h4 class="title"><img src="assets/images/icon/icon-1.png" alt=""> Choose Restaurant</h4></a>
                                    <p>15+ Resturant </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-8">
                                <div class="how-it-work-item mt-30">
                                    <a href="#"><h4 class="title"><img src="assets/images/icon/icon-2.png" alt=""> Select, you love to eat</h4></a>
                                    <p>50+ Dices </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-8">
                                <div class="how-it-work-item mt-30">
                                    <a href="#"><h4 class="title"><img src="assets/images/icon/icon-3.png" alt=""> Pickup or delivery</h4></a>
                                    <p>Pick your order from our outlate or we deliver ur product at ur home.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== HOW IT WORK PART ENDS ======-->

 

    <!--====== SERVICES PART START ======-->
    
    <section class="services-area pt-120 pb-150">
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
                        <h3 class="title">More Than 150 Couriers </h3>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== SERVICES PART ENDS ======-->

    

 

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
