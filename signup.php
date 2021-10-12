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
      <h1>Sign Up</h1>
      <p>To continue, please sign up below.</p>
   
    </div>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        
        <div class="input" >
        <div class="content" >
          <label for="text" ><span>Full Name</span></label>
          <input name="name" type="text"  required >
        </div>
      </div>
      
      
    <div class="input" >
        <div class="content" >
          <label for="phone" ><span>Mobile No.</span></label>
          <input name="phone" type="number"  required >
        </div>
      </div>
      
      
      <div class="input" >
        <div class="content" >
          <label for="email" ><span>Email</span></label>
          <input name="email" type="email"  required >
        </div>
      </div>
      <div class="input" >
        <div class="content">
          <label for="password" ><span>Password</span></label>
          <input id="password" name="password"  type="password" required >
        </div>
      
      </div>
      <div class="check-element" >
        
     
      </div>
      <div class="" >
        <button type="submit" name="s" value="s" ><span>Sign Up</span></button>
      </div>
      
    </form>
    <div class="sign-up-bar" >
      <a href="login.php"><span>I have account?</span> Sign in</a>
    </div>
  </div>
</div>

<script  src="assets/js/login_script.js"></script>

<?php 

if(isset($_POST['s'])){
 
    $email=$_POST['email'];
    $pass=base64_encode($_POST['password']);
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    
    $query=mysqli_query($conn,"SELECT * FROM userlist WHERE email='{$email}';");
    if(mysqli_num_rows($query)>0){
       
       
         echo '<script>alert("Email id already used.")</script>';
         
         
         
    }else{
        
        $query=mysqli_query($conn,"SELECT * FROM userlist WHERE phone='{$phone}';");
    if(mysqli_num_rows($query)>0){
       
       
         echo '<script>alert("Mobile no already used.")</script>';
        
        
    }else{
        //Insert data in db
        
        if(mysqli_query($conn,"INSERT INTO userlist (name, email, phone, password) VALUES ('{$name}', '{$email}', '{$phone}', '{$pass}')")==1){
            $id=mysqli_fetch_assoc($query);
         $_SESSION['userid']=$id['user_id'];
         header("Location: userarea.php");
        }else{
            //Query Error
               echo '<script>alert("Something went wrong")</script>';
        }
        
        
    }
    
}}

?>
  

</body>
</html>
