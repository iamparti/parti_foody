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
    
    <section class="page-title-area bg_cover" style="background-image: url(assets/images/page-bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h3 class="title">Contact Us</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a onclick="window.history.back();">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== CONTACT INFO PART START ======-->
    

    
    <!--====== CONTACT INFO PART ENDS ======-->

    <!--====== CONTACT PART START ======-->
    
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title">
                        <img src="assets/images/shape/title-shape-3.png" alt="">
                        <h3 class="title">Get Touch It</h3>
                    </div>
                    <div class="contact-box">
                        <form  method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box mt-25">
                                        <label for="#">Fill Name</label>
                                        <input type="text" name="name" placeholder="Golu" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box mt-25">
                                        <label for="#">Email</label>
                                        <input type="email" name="email"  placeholder="gole@gmail.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box mt-25">
                                        <label for="#">Phone</label>
                                        <input type="text" name="phone" placeholder="+91 8454.." required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box mt-25">
                                        <label for="#">Subject</label>
                                        <input type="text" name="subject" placeholder="Add to my Restaurant" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box mt-25">
                                        <label for="#">Message</label>
                                        <textarea name="msg" id="#" required cols="30" rows="10" placeholder="Start write here your message"></textarea>
                                        <button class="main-btn" type="submit" name="submit" >Submit Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-thumb">
            <img src="assets/images/contact-thumb.png" alt="">
        </div>
    </section>
    <div class="map-item">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.6991252611856!2d77.21458012424127!3d28.966647288199095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390c5310fbd43aeb%3A0x9ac2ee54a5acca6f!2sShiv%20mandir!5e0!3m2!1sen!2sin!4v1631975512272!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    
    <!--====== CONTACT PART ENDS ======-->

  

    <!--====== FOOTER PART START ======-->
    
 
 <?php 
 if(isset($_POST['submit'])){
     
     $email=$_POST['email'];
     $name=$_POST['name'];
     $phone=$_POST['phone'];
     $subject=$_POST['subject'];
     $msg=$_POST['msg'];
     $time=$dtime=date("Y-m-d").' '.date("h:i:sa");;
     $ip=$_SERVER['REMOTE_ADDR'];
     if(mysqli_query($conn,"INSERT INTO `contact` (`ip`, `name`, `email`, `phone`, `subject`, `time` ,`msg`) VALUES ('{$ip}', '{$name}', '{$email}', '{$phone}', '{$subject}', '{$time}','{$msg}')")==1){
          echo '<script>alert("Thank you! We contact you shortly..");</script>';
          echo '<script>window.location.replace("contact.php");</script>';
     }else{
          echo '<script>alert("Something went wrong.");</script>';
          echo '<script>window.location.replace("contact.php");</script>';
     }
 }
 
 include 'include/footer.php';?>
    
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
    
    <!--====== Ajax Contact js ======-->
    <script src="assets/js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
