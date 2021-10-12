<?php
session_start();
include '../include/config.php';
include 'mailsender.php';

$url=$domain.'userarea.php';
  $pid=base64_decode($temp=$_GET['phash']);
$address=$domain.'cart.php';
$dtime=date("Y-m-d").' '.date("h:i:sa");
if(isset($_SESSION['userid'])){
        $uid=$_SESSION['userid'];
        $email=base64_decode($_GET['uemail']);
            $phone=base64_decode($_GET['uphone']);
           
           $get_cart_items=mysqli_query($conn,"SELECT *FROM user_cart WHERE user_id='{$uid}'; ");
           while($product=mysqli_fetch_assoc($get_cart_items)){
               
               mysqli_query($conn,"INSERT INTO orders (user_id, product_id, date_time) VALUES ('{$uid}', '{$product['product_id']}', '{$dtime}')");
               
           }
           if(mysqli_query($conn,"DELETE FROM user_cart WHERE user_id='{$uid}' ;")==1){
               $subject="Order Placed ";
               $body="testbody";
              if(Golumail($body,$subject,$email)==1){
                  include 'smsapi.php';
                  if(txt($subject,$phone)==true){
                  
                   header("Location: $url");}else{
                       echo 'error txt';
                   }
              } else{
                  
                   header("Location: $url");
              }
               
          
               
           }
           
           else{
               echo '<script>alert("Something Went wrong with query db");</script>';
           }
           
           
           
}else{
    
    header("Location: $address");
    
}
            
   
   

?>