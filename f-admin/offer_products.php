<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['uname'])){
   header("Location : login.php");
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
    <h5><b><i class="fa fa-dashboard"></i>Offer Item List</b> <a class="button" href="#add">Add Product in Offer</a></h5>
    
  </header>
  
<style>


.button {
  font-size: 1em;
  padding: 10px;
  color: #c2c2d6;
   float: right;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
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
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
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



table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

#divs {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  overflow-x:auto;
}
</style>
  
  
  

<div id="divs">
  
  <table>
  <tr>
    <th>Id</th>
    <th>Name</th>
       <th>Price</th>
        
   
    
   <th>Action</th>
  </tr>
 <?php 
   $data=mysqli_query($conn,"SELECT * FROM offer o INNER JOIN products p ON p.product_id=o.product_id ");
    if(mysqli_num_rows($data)>0){
        while($panda=mysqli_fetch_assoc($data)){
            
    
 
 ?>
  <tr>
   
    <td><?php echo $panda['id']; ?></td>
    <td><?php echo $panda['name']; ?></td>
    <td><?php echo $panda['mrp']; ?></td>
   
    <td><a href="delete_offer.php?hash=<?php echo base64_encode($panda['id']); ?>"> Delete </a></td>
  </tr>
<?php 
    }
    }else{
       echo ' <tr>
    <td>No Item</td>
   <td>No Item</td>
    <td>No Item</td>
     <td>No Item</td>
      <td>No Item</td>
       <td>No Item</td>
  </tr>';
    }
?>
 
</table>

</div>



  <!-- Footer -->
   <div id="add" class="overlay">
	<div class="popup">
		<h2>Add New Product in Offer</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<form method="POST" >
			    <label for="country">Products,Id</label>
			    <input type="text" name="i" list="i" placeholder="Product Id" required>
  <datalist id='i'>
      <?php 
      $getrest=mysqli_query($conn,"SELECT *FROM products");
      while($res=mysqli_fetch_assoc($getrest)){
         echo ' <option value="'.$res['product_id'].'">'.$res['name'].'</option>';
      }
      
      ?>
  </datalist>
  
	
    
    <input type="submit" name="submit" value="Submit">
    
			    
			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['submit'])){
   
    $i=$_POST['i'];
    
if(mysqli_query($conn,"INSERT INTO offer (product_id) VALUES ('{$i}');")==1){
       echo '<script>alert("Product Added");</script>';
       echo '<script>window.location.replace("offer_products.php");</script>';
    
}else{
      echo '<script>alert("Something Went Wrong");</script>';
}
    
}
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
