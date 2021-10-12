<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['rid'])){
   header("Location : login.php");
}
    
$rid=$_SESSION['rid'];
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
    <h5><b><i class="fa fa-dashboard"></i> Add New Product</b></h5>
    
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
textarea{
    width:100%;
    
}

#divs {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
  
  
  

<div id="divs">
   <form class="form-horizontal" action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      
    <label for="fname">Title</label>
    <input type="text" id="fname" name="title" placeholder="Ex: Job Enquiry Form">
    
       <label for="fname">MRP</label>
    <input type="text" id="fname" name="showamt" placeholder="Ex: 50"required>
    
    <br>
    
    
       <label for="fname">Cut Amount</label>
    <input type="text" id="fname" name="cutamt" placeholder="Ex: 40 Here"required>
    
    <br>
    
    
   
   <label for="country">Category</label>
 <select name="category" >
  <option value="---->Select Category<----">---->Select Category<----</option>
     <?php 
      $getrest=mysqli_query($conn,"SELECT *FROM product_category");
      while($res=mysqli_fetch_assoc($getrest)){
         echo ' <option value="'.$res['id'].'">'.$res['category'].'</option>';
      }
      
      ?>
</select>
  
  
  
   <label for="country">Unit</label>
 <select name="unit" >
  <option value="---->Select Unit<----">---->Select Unit<----</option>
   <?php 
      $getrest=mysqli_query($conn,"SELECT *FROM prodcut_unit");
      while($res=mysqli_fetch_assoc($getrest)){
         echo ' <option value="'.$res['id'].'">'.$res['amount'].'</option>';
      }
      
      ?>
</select>
  
  
  
  
  
  
     <label for="info">Product Info</label><br>
    <textarea name="info" id="info" required rows="4" placeholder="Describe about product"></textarea>
<br>

<br>
 <label for="lname">Image</label>
    <input type="file" name="file" required>
    <br>
  <br>
  

  
    <input type="submit" name="submit" value="Submit">
  </form>
</div>

<?php 
if(isset($_POST['submit'])){
$title=mysqli_real_escape_string($conn,$_POST['title']);
$showamt=mysqli_real_escape_string($conn,$_POST['showamt']);
$cutamt=mysqli_real_escape_string($conn,$_POST['cutamt']);
$restaurant=$rid;
$info=mysqli_real_escape_string($conn,$_POST['info']);
$unit=mysqli_real_escape_string($conn,$_POST['unit']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
 $size=$_FILES['file']['size']/1024;
 
 $getcity=mysqli_query($conn,"SELECT restaurants_id FROM restaurants WHERE restaurants_id='{$restaurant}' ");
 $temp_city=mysqli_fetch_assoc($getcity);
 $city=$temp_city['restaurants_id'];
	if($size<2000){

		 $img= $_FILES['file']['name'];
   move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$_FILES['file']['name']);
   $image_path=$domain.'f-admin/images/'.$img;



  if(mysqli_query($conn,"INSERT INTO products (name, image, mrp, extra_mrp, info, unit_id, category_id, city_id, restaurants_id) VALUES ('{$title}', '{$image_path}', '{$showamt}', '{$cutamt}', '{$info}', '{$unit}', '{$category}', '{$city}', '{$restaurant}')")==1){
    
    
       echo '<script>alert("Product Created Go Back");</script>';
  }
  else{
      echo '<script>alert("Something Went wrong with database");</script>';
  }
}

}

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
