<?php 
include 'config.php';
$city=mysqli_query($conn,"SELECT *FROM city_list WHERE status='1' ");
$str="";

while($row=mysqli_fetch_assoc($city)){
    $str.="<option value='{$row['city_name']}'>{$row['city_name']}</option>";
}
echo $str;


?>