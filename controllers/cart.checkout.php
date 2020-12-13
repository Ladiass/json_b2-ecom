<?php

    session_start();
    include "data.get.php";
    if(!isset($_SESSION['user_details'])){
        header("Location: /views/forms/login.php");
        die();
    }
    $total = $_POST['total'];
    $products_name = $_POST['item'];
    $payment = fn_payments("../data/payments.json");
    date_default_timezone_set("Asia/Kuala_Lumpur");

    $new_payment = new stdClass();
    $new_payment->payment = $total;
    $new_payment->date_pay = date("Y/m/d h:i:sa");
    $new_payment->buyer = $_SESSION['user_details']->username;
    $new_payment->transaction_code = "TSC".date('His')."-".mt_rand();
    $new_payment->product_buy = $products_name;

    $payment[]=$new_payment;

    file_put_contents("../data/payments.json",json_encode($payment,JSON_PRETTY_PRINT));
    unset($_SESSION['cart']);
    $_SESSION['class'] = "success";
    $_SESSION['message']= "Checkout success";
    header("Location: /");

