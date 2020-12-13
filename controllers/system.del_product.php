<?php
    session_start();
    include "data.get.php";

    $products = fn_products("../data/products.json");
    $backup = fn_products("../data/backup.json");;
    $id =$_GET["id"];

    $item_backup = new stdClass();
    $item_backup = $products[$id];
    $backup[] = $item_backup;

    file_put_contents('../data/backup.json',json_encode($backup,JSON_PRETTY_PRINT));
    $product_name = $products[$id]->name;

    array_splice($products,$id,1);
    file_put_contents('../data/products.json',json_encode($products,JSON_PRETTY_PRINT));
    $_SESSION['class'] = "danger";
    $_SESSION['message'] = "Product: <span class='text-success'>$products_name</span> was successfully deleted!";
    
    header("Location: / " );