<?php 
include 'mailsender.php';


$email="sagarsharma995899@gmail.com";
$subject="test mail";
$body="<h3>Hi how</h3>";
 if(Golumail($body,$subject,$email)==1){
                  echo 'done';
              } else{
                  
              echo 'err';
              }



?>