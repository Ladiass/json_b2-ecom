<?php
    session_start();
    $id = $_GET['id'];
    include "data.get.php";
    $products = fn_products("../data/products.json");

    if($products[$id]->isActive == false){
        $products[$id]->isActive = true ;
    }else{
        $products[$id]->isActive = false ;
    }
    file_put_contents("../data/products.json",json_encode($products,JSON_PRETTY_PRINT));

    header("Location: ".$_SERVER['HTTP_REFERER']);