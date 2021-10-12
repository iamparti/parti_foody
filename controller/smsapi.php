<?php 



function txt($msg,$phone){
    
    $fields = array(
    "sender_id" => "TXTIND",
    "message" => $msg,
    "route" => "v3",
    "numbers" => $phone,
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: YrAuB1HLPUD8giKqXOayS3wWf7TexGo0sJjN4dFnVhbCI9Mkt6PbInJf9vmTu2FADN3tYwGx4sr7EKhl",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return false;
} else {
  return true;
}
    
}




?>