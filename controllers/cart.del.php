<?php 
    session_start();
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    if(count($_SESSION['cart']) <= 0){
        unset($_SESSION['cart']);
    }
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    