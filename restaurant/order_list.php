<!DOCTYPE html>
<?php 
include '../include/config.php';
session_start();
if(!isset($_SESSION['rid'])){
   header("Location : login.php");
}
$rid=    $_SESSION['rid'];

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
    <h5><b><i class="fa fa-dashboard"></i>Orders List</b> </h5>
    
  </header>
  
<style>



.button {
  font-size: 1em;
  padding: 10px;
  color: black;
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
  color: black;
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
    <th>Order Id</th>
    <th>Name</th>
       <th>Phone</th>
    <th>Address</th>
    <th>Time</th>
    
   <th>Status</th>
  </tr>
 <?php 
   $data=mysqli_query($conn,"SELECT * FROM orders o INNER JOIN userlist u ON u.user_id=o.user_id WHERE  o.restaurants_id='{$rid}' AND o.status!=5 OR o.status!=0 ");
    if(mysqli_num_rows($data)>0){
        while($panda=mysqli_fetch_assoc($data)){
            
  call($panda['order_id']);
 
 ?>
  <tr>
   
  
    <td><?php echo $panda['order_id']; ?></td>
    <td><?php echo $panda['name']; ?></td>
     <td><?php echo $panda['phone'];?></td>
      <td><?php echo $panda['address'];?></td>
         <td><?php echo $panda['date_time'];?></td>
    <td><a class="button" href="#add<?php echo $panda['order_id']; ?>"><?php if($panda['status']=='1'){echo 'Preparing';}else if($panda['status']=='2'){echo 'Processing';}else if($panda['status']=='3'){echo 'Packed';}else if($panda['status']=='4'){echo 'Out of Delivery';}else{echo 'err';}?></a></td>
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
    
    function call($c){
           echo ' 
     <div id="add'.$c.'" class="overlay">
	<div class="popup">
		<h2>Update Status</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<form method="POST" >

       <label for="city">Change Status</label>
 <select name="status" >
  <option value="---->Select Category<----">---->Select Status<----</option>
  <option value="2">Processing</option>
   <option value="3">Packed</option>
    <option value="4">Out of Delivery</option>
     <option value="5">Delivered </option>
     <option value="0">Cancle </option>
   
</select><br>
		<input type="hidden" value="'.$c.'" name="oid">
    
    <input type="submit" name="submit" value="Submit">
    
			    
			</form>
		</div>
	</div>
</div>';
    }
?>
 
</table>

</div>



  <!-- Footer -->

<?php 
if(isset($_POST['submit'])){
    $status=$_POST['status'];
   $oid=$_POST['oid'];
if(mysqli_query($conn,"UPDATE orders SET status = '{$status}' WHERE  order_id = '{$oid}';")==1){
       echo '<script>alert("Status Updated");</script>';
       echo '<script>window.location.replace("order_list.php");</script>';
    
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
