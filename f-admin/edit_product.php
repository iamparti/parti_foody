<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['uname'])){
   header("Location : login.php");
}
 if(isset($_GET['hash']) && $_GET['hash']!=null){
 $mysqli=mysqli_query($conn,"SELECT *FROM products WHERE product_id='{$_GET['hash']}'");
 if(mysqli_num_rows($mysqli)>0){
 while($pinfo=mysqli_fetch_assoc($mysqli)){
     $pname=$pinfo['name'];
     $mrp=$pinfo['mrp'];
     $cut=$pinfo['extra_mrp'];
     $imgs=$pinfo['image'];
     $infos=$pinfo['info'];
 }}else{
      echo '<script>window.history.back();</script>';
 }}else{
     echo '<script>window.history.back();</script>';
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
    <h5><b><i class="fa fa-dashboard"></i> Edit Product</b></h5>
    
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
      
    <label for="fname">Name</label>
    <input type="text" id="fname" name="title" value="<?php echo $pname;?>" placeholder="Product Name" required>
    
       <label for="fname">Amount</label>
    <input type="text" id="fname" name="mrp" value="<?php echo $mrp;?>" placeholder="Ex: 50" required>
    
    <br>
    
    
       <label for="fname">Cut amount</label>
    <input type="text" id="fname" name="cutamt" value="<?php echo $cut;?>" placeholder="Ex: 40" required>
    
    <br>
    
  
<br>
<br>
 <label for="lname">Image</label>
 <img src="<?php echo $imgs;?>" height="50" width="50">
    <input type="file" name="file" required >
    <br>
  <br>
  
    <label for="country">Valid UpTo:</label>
  <textarea name="info"><?php echo $infos;?></textarea>
  
    <input type="submit" name="submit" value="Submit">
  </form>
</div>

<?php 
if(isset($_POST['submit'])){
$title=mysqli_real_escape_string($conn,$_POST['title']);
$mrp=mysqli_real_escape_string($conn,$_POST['mrp']);
$cutamt=mysqli_real_escape_string($conn,$_POST['cutamt']);
$info=mysqli_real_escape_string($conn,$_POST['info']);

 $size=$_FILES['file']['size']/1024;
	if($size<2000){

		 $img= $_FILES['file']['name'];
   move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$_FILES['file']['name']);
   $image_path=$domain.'f-admin/images/'.$img;
$hash=base64_encode($title);
if($imgs!=$image_path){

  if(mysqli_query($conn,"UPDATE products SET mrp ='{$mrp}',name='{$title}',extra_mrp='{$cutamt}',info='{$info}',image='{$image_path}' WHERE product_id='{$_GET['hash']}' ")==1){
    
    
       echo '<script>alert("Form Created Go Back");</script>';
  }
  else{
      echo '<script>alert("Something Went wrong with database");</script>';
  }
    
}else{
    if(mysqli_query($conn,"UPDATE products SET mrp ='{$mrp}',name='{$title}',extra_mrp='{$cutamt}',info='{$info}',image='{$imgs}' WHERE product_id='{$_GET['hash']}'")==1){
    
    
       echo '<script>alert("Form Created Go Back");</script>';
  }
  else{
      echo '<script>alert("Something Went wrong with database");</script>';
  }
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
