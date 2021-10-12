<!doctype html>
<?php 
session_start();
include 'include/config.php';
 include 'mailsender.php';
$site_info=mysqli_query($conn,"SELECT *FROM site_setting;");
while($data=mysqli_fetch_assoc($site_info)){
    $site_title=$data['site_name'];
    $site_info=$data['info'];
    $site_subtitle=$data['subtitle'];
    $banner=$data['image_path'];
    $app_link=$data['app_link'];
    $title=$data['title'];
    

}

if(isset($_SESSION['userid'])){
   header("Location: userarea.php");
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
    <title>User Area | <?php echo $site_title;?> </title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

<meta name="viewport" content="width=device-width" />
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="assets/css/login_style.css" rel="stylesheet">



 

</head>
<body >


<div class="main" >
  <div class=" template borders" >
    <div class="top" >
      <div class="content">
        <div class="bdr">
        </div>
      </div>
    </div>
    <div class="bottom" >
      <div class="content">
        <div class="bdr">
        </div>
      </div>
    </div>
    <div class="left" >
      <div class="content">
        <div class="bdr"></div>
      </div>
    </div>
    <div class="right" >
      <div class="content">
        <div class="bdr"></div>
      </div>
    </div>
  </div>
  <div class="container" >
    <div class="title">
      <h1>Forgot Password</h1>
      <p>Enter your registerd mail here.</p>
   
    </div>
    <form method="POST" >
      <div class="input" >
        <div class="content" >
          <label for="email" ><span>Email</span></label>
          <input name="email" type="email"  required >
        </div>
      </div>
   
      <div class="check-element" >
        
     
      </div>
      <div class="" >
        <button type="submit" name="s" value="s" ><span>Forgot Password</span></button>
      </div>
      
    </form>
    <div class="sign-up-bar" >
      <a href="signup.php"><span>Don't have an account?</span> Sign up</a>
    </div>
  </div>
</div>

<script  src="assets/js/login_script.js"></script>

<?php 

if(isset($_POST['s'])){
  
    $email=$_POST['email'];
   
    
    $query=mysqli_query($conn,"SELECT email FROM userlist WHERE email='{$email}';");
    if(mysqli_num_rows($query)>0){
       
    



$subject="Forgot Password |".$site_name;
$date=base64_encode(date('d'));
$restlink=$domain."changeps.php?usr=".base64_encode($email)."&time=".$date;
$body="<h3>Hi Click here to rest your password </h3><br><p>Link valid only for 1day</p><br><a href='".$restlink."'>".$restlink."</a>";
 
 if(Golumail($body,$subject,$email)==1){
                  echo '<script>alert("Please Check your mail we sended you a forgot link.")</script>';
              } else{
                  
              echo '<script>alert("Something Went wrong, Please try after some time.")</script>';
              }

        
    }else{
        echo '<script>alert("Please enter valid details.")</script>';
    }
    
}

?>
  

</body>
</html>
