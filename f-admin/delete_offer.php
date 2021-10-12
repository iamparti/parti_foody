<?php 
include '../include/config.php';

if(isset($_GET['hash'])){
    $id=base64_decode($_GET['hash']);
    if(mysqli_query($conn,"DELETE FROM offer WHERE id = '{$id}' ")==1){
        header("Location: offer_products.php");
        
    }else{
        header("Location: index.php");
    }
}

?>