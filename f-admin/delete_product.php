<?php 
include '../include/config.php';

if(isset($_GET['hash'])){
    $id=base64_decode($_GET['hash']);
    if(mysqli_query($conn,"DELETE FROM products WHERE product_id = '{$id}' ")==1){
        header("Location: product_list.php");
        
    }else{
        header("Location: index.php");
    }
}

?>