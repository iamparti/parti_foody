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
    <h5><b><i class="fa fa-user"></i>User Info</b></h5>
    
  </header>
  
<style>
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
}




</style>
  
  
  

<div id="divs" style="overflow-x:auto;">
  
  <table>
  <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
   
  </tr>
 <?php 
   $data=mysqli_query($conn,"SELECT *FROM userlist WHERE user_id='{$_GET['hash']}'; ");
    if(mysqli_num_rows($data)>0){
        while($panda=mysqli_fetch_assoc($data)){
        
    
 
 ?>
  <tr>
      
    <td><?php echo $panda['name']; ?></td>
    
  <td><?php echo $panda['phone']; ?></td>
    <td><?php echo $panda['email']; ?></td>
      <td><marquee><?php echo $panda['address']; ?></marquee></td>



  </tr>
<?php 
    }
    }else{
       echo ' <tr>
    <td>No Item</td>
   <td>No Item</td>
    <td>No Item</td>
    <td>No Item</td>
  </tr>';
    }
?>
 
</table>

</div>



<h5> <b><i class="fa fa-history"></i>Order History</b></h5>

<div id="divs" style="overflow-x:auto;">
  
  <table>
  <tr>
    <th>Order Id</th>
    <th>Image</th>
    <th>Name</th>
    <th>Date/Time</th>
    <th>Status</th>
   
  </tr>
 <?php 
   $data=mysqli_query($conn,"SELECT *FROM orders o INNER JOIN products p ON p.product_id=o.product_id  WHERE o.user_id='{$_GET['hash']}' ORDER BY o.order_id DESC; ");
    if(mysqli_num_rows($data)>0){
        while($panda=mysqli_fetch_assoc($data)){
        
    
 
 ?>
  <tr>
      
    <td>#<?php echo $panda['order_id']; ?></td>
    
  <td><img src="<?php echo $panda['image']; ?>" width="50" height="50"></td>
    <td><?php echo $panda['name']; ?></td>
      <td><?php echo $panda['date_time']; ?></td>
   <td><?php if($panda['status']=='1'){echo 'Preparing';}else if($panda['status']=='2'){echo 'Processing';}else if($panda['status']=='3'){echo 'Packed';}else if($panda['status']=='4'){echo 'Out of Delivery';}else{echo 'err';}?></td>


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
  </tr>';
    }
?>
 
</table>

</div>





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
