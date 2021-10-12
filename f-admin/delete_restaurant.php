<?php 
include '../include/config.php';

if(isset($_GET['hash'])){
    $id=base64_decode($_GET['hash']);
    if(mysqli_query($conn,"DELETE FROM restaurants WHERE restaurant_id = '{$id}' ")==1){
        header("Location: restaurants_list.php");
        
    }else{
        header("Location: index.php");
    }
}

?>