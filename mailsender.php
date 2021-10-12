<?php



function Golumail($body,$subject,$email){
include 'include/config.php';
$mailfileurl="PHPMailer/PHPMailerAutoload.php";
           require_once($mailfileurl);
           $mail = new PHPMailer();
           $mail->isSMTP();
           $mail->SMTPAuth = true;
           $mail->SMTPSecure = 'ssl';
           $mail->Host = 'smtp.hostinger.com';
           $mail->Port = '465';
           $mail->isHTML();
           $mail->Username = $smtp_username;
           $mail->Password = $smtp_password;
           $mail->SetFrom($smtp_username,$site_name);
           $mail->Subject = $subject;
           $mail->Body = $body;
           
           $mail->AddAddress($email);
           
           $result = $mail->Send();
           
           if($result == 1){
              return 1;
           }else{
               return 0;
               
           }

}


?>