<?php 
include 'config.php';
$c=$_POST['city'];
$city=mysqli_query($conn,"SELECT *FROM restaurants WHERE city_name='{$c}' ");
$str="";

while($row=mysqli_fetch_assoc($city)){
    $str.="<option value='{$row['name']}'></option>";
}
echo $str;


?>