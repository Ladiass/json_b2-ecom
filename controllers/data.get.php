<?php

    function fn_users($url){
        $users = json_decode(file_get_contents($url));
        return $users;
    }
    function fn_products($url){
        $product = json_decode(file_get_contents($url));
        return $product;
    }
    function fn_payments($url){
        $payment = json_decode(file_get_contents("../data/payments.json"));
        return $payment;
    }
