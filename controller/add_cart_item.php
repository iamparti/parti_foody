<?php
session_start();
include '../include/config.php';

  $pid=base64_decode($temp=$_GET['pid']);
$address=$domain.'cart.php';
if(isset($_SESSION['userid'])){
        $uid=$_SESSION['userid'];
           
            $sqls="INSERT INTO user_cart (user_id, product_id) VALUES ('{$uid}', '{$pid}')";
            mysqli_query($conn,$sqls);
            header("Location: $address");
}else{
    $re=$domain.'login.php';
    header("Location: $re");
    
}
            
   
   

?>