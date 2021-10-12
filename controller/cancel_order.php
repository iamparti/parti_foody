<?php
include '../include/config.php';
include 'mailsender.php';
  $id=base64_decode($temp=$_GET['oid']);
$address=$domain.'userarea.php';
 $email=base64_decode($_GET['uemail']);
       
           
            $sqls="UPDATE `orders` SET status = '0' WHERE order_id = '{$id}';";
            if(mysqli_query($conn,$sqls)==1){
                
                 $subject="Order Canceld ";
               $body="Oh no! Your order was canceled";
              if(Golumail($body,$subject,$email)==1){
                  header("Location: $address");
              } else{
                  
                   header("Location: $address");
              }
                
            }
           

            
   
   

?>