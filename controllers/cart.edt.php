<?php
    session_start();
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    if(!isset($quantity) || $quantity == 0){
        $_SESSION['cart'][$id] = 0;

    }else{
        $_SESSION['cart'][$id] = $quantity;
    }
    
    header('Location: '.$_SERVER['HTTP_REFERER']);