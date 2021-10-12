<?php 
include '../include/config.php';

if(isset($_GET['hash'])){
    $id=base64_decode($_GET['hash']);
    if(mysqli_query($conn,"DELETE FROM city_list WHERE city_id = '{$id}' ")==1){
        header("Location: city_list.php");
        
    }else{
        header("Location: index.php");
    }
}

?>