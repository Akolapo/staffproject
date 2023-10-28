<?php
error_reporting(E_ALL);
if($_POST){
    if($_POST['summarybtn']){
    $detailarea = $_POST['sum_content'];
    if(empty($detailarea)){
        header("location:staffpage.php");
    }else{
        header("location:staffdetail.php");
        exit();
    }
    $url = "staffdetail.php?id=$staff_id";
    header("location:$url");
    exit();
    }
}else{
    
}


?>