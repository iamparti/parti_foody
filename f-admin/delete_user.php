<?php 
include '../include/config.php';

if(isset($_GET['hash'])){
    $id=base64_decode($_GET['hash']);
    if(mysqli_query($conn,"DELETE FROM userlist WHERE user_id = '{$id}' ")==1){
        header("Location: user_list.php");
        
    }else{
        header("Location: index.php");
    }
}

?>