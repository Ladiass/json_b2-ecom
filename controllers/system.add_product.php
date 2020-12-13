<?php
session_start();

    include "data.get.php";
    $prod = fn_products("../data/products.json");

    // var_dump($_FILES);
    // $_FILES 可接收 图片等 文件 类型 *html form那边 有些东西必须写 否则不能使用
    
    // echo htmlspecialchars($_POST['product_name']);
    // htmlspecialchars() 可以 防止 在 输入框 输入 js等代码 进行攻击；*主要防止 < > 起作用。

    //sanitize the inputs so the special characters or symbols are converted into a normal string htmlspecialchars()
    $products_name = htmlspecialchars($_POST['product_name']);
    $price = htmlspecialchars($_POST['price']);
    $desc = htmlspecialchars($_POST['description']);

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmpname = $_FILES['image']['tmp_name'];

    //pathinfo() is a method that returns information about a file path
    $img_type = pathinfo($img_name,PATHINFO_EXTENSION);
    $is_img = false;
    $has_details = false;

    // echo "1";
    if($img_type == "jpg" || $img_type == "svg" ||$img_type == "jpeg" || $img_type == "png" ||$img_type == "gif"){
        $is_img = true;
    // echo "2";

    }else{
        echo "Please upload an image file";
    }
    if(strlen($products_name) > 0 && intval($price) > 0  && strlen($desc) > 0){
        $has_details = true;
        // echo "3";
    }
    // echo "4";

    if($has_details && $is_img && $img_size > 0){
        // echo "5";

        $product = new stdClass();
        $product->name = $products_name;
        $product->price = $price;
        $product->description =$desc;
        $product->image="/assets/img/".$img_name;
        $product->isActive = true;

        move_uploaded_file($img_tmpname,"../assets/img/".$img_name);
        $prod[] = $product;
        file_put_contents("../data/products.json" ,json_encode($prod,JSON_PRETTY_PRINT) );

        $_SESSION['message'] = "New Pordut: <span class='text-success'>$products_name</span> was successfully added!";
        $_SESSION['class'] = "success";

        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    // echo "6";
