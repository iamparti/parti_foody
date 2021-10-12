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
if(date('d')!=base64_decode($_GET['time'])){
     echo '<script>alert("Sorry link Expired!!")</script>';
     echo '<script>window.location.replace("index.php");</script>';
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
      <h1>Change Password</h1>
      <p>Create New Password.</p>
   
    </div>
    <form method="POST" >
      <div class="input" >
        <div class="content" >
          <label for="email" ><span>Password</span></label>
          <input name="pass" type="password"  required >
        </div>
      </div>
   
      <div class="check-element" >
        
     
      </div>
      <div class="" >
        <button type="submit" name="s" value="s" ><span>Change Password</span></button>
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
  
    $email=base64_decode($_GET['usr']);
   
    
    $query=mysqli_query($conn,"SELECT email FROM userlist WHERE email='{$email}';");
    if(mysqli_num_rows($query)>0){
       
    $password=base64_encode($_POST['pass']);
if(mysqli_query($conn,"UPDATE `userlist` SET password = '{$password}' WHERE email = '{$email}';")==1){
    $subject="Password Changed |".$site_name;

$body="<h3>Hi Your password hase been changed </h3><br><p>For More Information Visit:</p><br><a href='".$domain."'>".$domain."</a>";
 
 if(Golumail($body,$subject,$email)==1){
                  echo '<script>alert("Congratulation Password Changd .");';
                  echo 'window.location.replace("login.php")</script>';
              } else{
                  
              echo '<script>alert("Something Went wrong, Please try after some time.")</script>';
              }
}else{
      echo '<script>alert("Something Went wrong, WithUpdate.")</script>';
}




        
    }else{
        echo '<script>alert("Sorry link Expired!!")</script>';
    }
    
}

?>
  

</body>
</html>
