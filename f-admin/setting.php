<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['uname'])){
   header("Location : login.php");
}
    
$my=mysqli_query($conn,"SELECT *FROM site_setting WHERE id=1");
if(mysqli_num_rows($my)>0){
    while($d=mysqli_fetch_assoc($my)){
        $imgpath=$d['image_path'];
        $site_name=$d['site_name'];
        $title=$d['title'];
        $subtitle=$d['subtitle'];
        $app_link=$d['app_link'];
        $def=$d['default_restaurant_id'];
      $site_info=$d['info'];
    }
}
?>
<html>
<title>Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<?php include 'sidebar.php';?>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-gear"></i> Setting</b></h5>
    
  </header>


  
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#divs {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
  
  
  

<div id="divs">
   <form class="form-horizontal" action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
       
      
    <label for="fname">Site Title</label>
    <input type="text" id="fname" name="name" value="<?php echo $site_name;?>" placeholder="Ex: Panda">
    
       <label for="fname">Home Title</label>
    <input type="text" id="fname" name="title" value="<?php echo $title;?>" placeholder="Ex: DJckjf32">
    
    
     
       <label for="fname">Sub Title</label>
    <input type="text" id="fname" name="subtitle" value="<?php echo $subtitle;?>" placeholder="Ex: food for foody">
    
     
       <label for="fname">App Link</label>
    <input type="text" id="fname" name="link" value="<?php echo $app_link;?>" placeholder="Ex: https://fooddy.app.....">
       
       <label for="fname">Site Info</label>
    <input type="text" id="fname" name="info" value="<?php echo $site_info;?>" placeholder="Ex: about foody.">
    
     
       <label for="fname">Default Restaurant ID</label>
    <input type="text" name="restaurant" list="restaurant" placeholder="Restaurant Id/Name" value="<?php echo $def; ?>" required>
  <datalist id='restaurant'>
      <?php 
      $getrest=mysqli_query($conn,"SELECT *FROM restaurants ");
      while($res=mysqli_fetch_assoc($getrest)){
         echo ' <option value="'.$res['restaurants_id'].'">'.$res['name'].'</option>';
      }
      
      ?>
  </datalist>
    
    <img src="<?php echo $imgpath;?>" height="90" width="90">
    <input type="file" name="file"  required>
    
    <br>
    
    
  
    

    
<br>

  
    <input type="submit" name="submit" value="Submit">
  </form>
</div>
<?php
include 'config.php';
if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
   $link=$_POST['link'];
   $title=$_POST['title'];
   $sub_title=$_POST['subtitle'];
   $restaurant=$_POST['restaurant'];
   $info=$_POST['info'];
   
   $size=$_FILES['file']['size']/1024;
	if($size<2000){

		 $img= $_FILES['file']['name'];
   
   $image_path=$domain.'f-admin/images/'.$img;

if($imgpath!=$image_path){
    move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$_FILES['file']['name']);
    if(mysqli_query($conn,"UPDATE site_setting SET default_restaurant_id = '{$restaurant}',site_name='{$name}',image_path='{$image_path}',title='{$title}',subtitle='{$sub_title}',app_link='{$link}',info='{$info}' WHERE id = 1;")==1){
        echo '<script>alert("Setting Updated ");';
      echo 'window.location.replace("setting.php);</script>';
    }else{
        echo '<script>alert("Setting Updated query faild 1");</script>';
    }
   
}else{
     if(mysqli_query($conn,"UPDATE site_setting SET default_restaurant_id = '{$restaurant}',site_name='{$name}',image_path='{$imgpath}',title='{$title}',subtitle='{$sub_title}',app_link='{$link}',info='{$info}' WHERE id = 1;")==1){
       echo '<script>alert("Setting Updated ");';
      echo 'window.location.replace("setting.php);</script>';
    }else{
        echo '<script>alert("Setting Updated query faild 2");</script>';
    }
}   
}}

?>



  <!-- Footer -->
<?php 
include 'footer.php';

?>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
