<?php
    session_start();
    include "data.get.php";
    $products = fn_products("../data/products.json");
    $id = $_GET['id'];

    $products_name = htmlspecialchars($_POST['product_name']);
    $price = htmlspecialchars($_POST['product_price']);
    $desc = htmlspecialchars($_POST['product_description']);

    $has_details = false;
    $new_image = false;
    
    if(!empty($_FILES['tmpname'])){
        $img_name = $_FILES['product_image']['name'];
        $img_size = $_FILES['product_image']['size'];
        $img_tmpname = $_FILES['product_image']['tmp_name'];
        $img_type = pathinfo($img_name,PATHINFO_EXTENSION);
        if($img_type == "jpg" || $img_type == "svg" ||$img_type == "jpeg" || $img_type == "png" ||$img_type == "gif"){
            $new_image = true;
            // echo "1";
        }else{
            echo "Please upload an image file";
            die();
        }
    }

    //pathinfo() is a method that returns information about a file path
    
    // echo "2";
    
    if(strlen($products_name) > 0 && intval($price) > 0  && strlen($desc) > 0){
        $has_details = true;
        // echo "3";
    }
    // echo "4";
    
    if($has_details){
        // echo "5";
        $products[$id]->name = $products_name;
        $products[$id]->price = $price;
        $products[$id]->description =$desc;
        if($new_image && $img_size > 0){
            $products[$id]->image="/assets/img/".$img_name;
            move_uploaded_file($img_tmpname,"../assets/img/".$img_name);
        }

        file_put_contents("../data/products.json" ,json_encode($products,JSON_PRETTY_PRINT) );

        $_SESSION['class'] = "primary";
        $_SESSION['message'] = "Product: <span class='text-success'>$products_name</span> is updated!";
        
        header("Location: /views/product_details.php?id=".$id);
    }