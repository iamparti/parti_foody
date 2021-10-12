<?php
include '../include/config.php';
  $id=base64_decode($temp=$_GET['pid']);
$address=$domain.'cart.php';
        $uid=base64_decode($_GET['uid']);
           
            $sqls="DELETE FROM `user_cart` WHERE product_id = '{$id}' AND user_id='{$uid}';";
            mysqli_query($conn,$sqls);
            header("Location: $address");

            
   
   

?>