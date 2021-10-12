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
    <title><?php  echo $_GET['res']."'s | ". $site_title;?> </title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="assets/css/all.css">
    
 
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
</head>
<body>

    <!--===== PRELOADER PART START ======-->
    
<style>
    .floats{
        	/*background-color:red;*/
	position:fixed;
	
	bottom:180px;
	right:0px;

	color:black;
	border-radius:50px;
	text-align:center;


  
}

.my-floats{
	margin-top:16px;
} #booknow{
     
     height:110px;
     width:60px;
}
    
    
    
    
    
    
    .button {
  font-size: 1em;
  padding: 20px;
  color: #c2c2d6;
   float: right;
 
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #fffff;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 90px auto;
  padding: 50px;
  background: #fff;
  border-radius: 5px;
  width: 80%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}


</style>


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
    
<?php include 'include/header.php'; ?>
    <!--====== HEADER PART ENDS ======-->

    <!--====== PAGE TITLE PART START ======-->
    
    <section class="page-title-area bg_cover" style="background-image: url(assets/images/page-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h3 class="title"><?php echo $_GET['res'];?>'s Menu</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Menu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== RONDHON MENU PART START ======-->
    
    <section class="rondhon-menu-area pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rondhon-menu-tab d-flex align-items-center">
                        <span>Seats:</span>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> <?php echo $_GET['seats'];?></a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    
               
                    <?php 
                    $resid=base64_decode($_GET['resid']);
                    $data=mysqli_query($conn,"SELECT *FROM products p INNER JOIN product_category pc ON pc.id=p.category_id WHERE p.restaurants_id='{$resid}'; ");
                    if(mysqli_num_rows($data)>0){
                       while($product=mysqli_fetch_assoc($data)){
                           
                           $rcity=$product['city_id'];
                           
                           
                     ?>
                    <div class="rondhon-menu-item mt-30">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="rondhon-menu-thumb">
                                    <img src="<?php echo $product['image'];?>" height="260" id="s" width="150" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-8">
                                <div class="rondhon-menu-content">
                                    <h3 class="title"><?php echo $product['name'];?></h3>
                                    <p>Food Type: <?php echo $product['category'];?> <br> Delivery time: 60 Minutes,<br>Info: <?php echo $product['info'];?></p>
                                    <a class="main-btn" href="controller/add_cart_item.php?pid=<?php echo base64_encode($product['product_id']);?>">Add to Cart</a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <div class="randhon-menu-review">
                                    <h4>₹<?php echo $product['mrp'];?></h4>
                                    <span>Restaurant:</span>
                                    <p><?php echo $_GET['res'];?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                 <br>
                 
                
               <?php   } 
                    }?>
                   
                </div>
            
            </div>
       
        </div>
    </section>
    
    <!--====== RONDHON MENU PART ENDS ======-->


   

    <!--====== FOOTER PART START ======-->
    
  <?php include'include/footer.php';?>
    
    <!--====== FOOTER PART ENDS ======-->
    <div class="floats" >
<?php if(isset($_SESSION['userid'])){

echo '<a class="button" href="#add" ><img src="assets/images/booknow.png" id="booknow"></a>';}else{
     $link='menu.php?res='.$d;
$link=base64_encode('menu.php?res='.$_GET['res'].'&resid='.$_GET['resid'].'&seats='.$_GET['seats'].'&booked_seats='.$_GET['booked_seats']);
echo '<a class="button" href="login.php?redirect='.$link.'" ><img src="assets/images/booknow.png" id="booknow"></a>';}
?>
</div>
    <!--====== GO TO TOP PART START ======-->
    <div id="add" class="overlay">
	<div class="popup">
		<h2>Book Your Seat Now</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<form method="POST" >
			    
			       
    <label>Time:- </label>
    <input type="time" name="time" value="<?php echo date("H:i");?>"><br>
    <lable>Person:- </lable>
    <input type="number" name="person" value="1" >
    <input type="submit" name="submit" value="Submit">
    
			    
			</form>
		</div>
	</div>
</div>

<?php 
if(isset($_POST['submit'])){
    $booked=$_GET['booked_seats'];
    if($_GET['seats']>$booked){
        $user=$_SESSION['userid'];
       
        $tbl=$booked + 1;
        $time=$_POST['time'];
        
         $person=$_POST['person'];
        $dtime=date("Y-m-d").' '.date("h:i:sa");
        if(mysqli_query($conn,"INSERT INTO `seat` (`user_id`, `table_no`, `vendor_id`, `city_id`, `status`, `time`, `create_time`,`person`) VALUES ('$user', '$tbl', '$resid', '$rcity', '1', '$time', '$dtime','$person')")==1){
            
            if(mysqli_query($conn,"UPDATE `restaurants` SET `booked_seats` = '{$tbl}' WHERE `restaurants`.`restaurants_id` = '{$resid}';")==1){
                include 'controller/smsapi.php';
                $msg="Congratulation Your table has Booked in ".$_GET['res'].", Your Table No: ".$tbl;
                txt($msg,$_SESSION['phone']);
                echo '<script>alert("'.$msg.'")</script>';
                echo '<script>window.location.replace("userarea.php")</script>';
                
                
            }
            
        }
    }else{
        echo '<script>alert("Sorry All Seats are full.")</script>';
    }
}


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
