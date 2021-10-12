<!DOCTYPE html>
<?php include'../include/config.php';
session_start();
if(isset($_SESSION['rid'])){
     header("Location : index.php");
}

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Form</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Restaurant Login Form</h2>

        <form class="form-horizontal" action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="imgcontainer">
    <img src="https://foody.partibha.ml/assets/images/logo-2.png"  alt="Avatar" class="">
  </div>

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
<?php 

if(isset($_POST['submit'])){
    
   $uname= mysqli_real_escape_string($conn,$_POST['uname']);
$psw= mysqli_real_escape_string($conn,$_POST['psw']);
$get=mysqli_query($conn,"SELECT *FROM restaurants WHERE email='{$uname}' AND password='{$psw}' ");
if(mysqli_num_rows($get)>0){
 session_start();
 $data=mysqli_fetch_assoc($get);
 $_SESSION['rid']=$data['restaurants_id'];
        $_SESSION['psw']=$psw;
        $_SESSION['name']=$uname;
      header("Location : index.php");
          
      }else{
          echo '<script>alert("Wrong Username & Password");</script>';
      }
    
    
}


?>
</body>
</html>
