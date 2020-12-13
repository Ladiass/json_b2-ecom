<?php
    include "data.get.php";

    $fName =$_POST['fullname'];
    $uName =$_POST['username'];
    $pass =$_POST['password'];
    $pass2 =$_POST['password2'];

    $users = fn_users("../data/users.json");
    $errors =0;
    $existing = false;

if(strlen($fName) < 2 ){
    $error++;
    echo "Fullname must be greater than 2 characters";
}

if (strlen($uName) < 6) {
    $errors++;
    echo "Username should be at least 6 characters";
}

if (strlen($pass) < 8) {
    $errors++;
    echo "Password should be atleast 8 characters";
}

if ($pass != $pass2) {
    $errors++;
    echo "Confirmation password does not match";
}

foreach($users as $indiv_user){
    if($indiv_user->username == $username){
        $existing = true;
    }
}

if($existing){
    $errors++;
    echo "Username Already Exists";
}

if ($errors == 0) {
    $user = new stdClass();
    $user->fullname = $fName;
    $user->username = $uName;
    $user->password = password_hash($pass, PASSWORD_DEFAULT);
    $user->isAdmin= false;

    $users[] = $user;
    file_put_contents('../data/users.json', json_encode($users, JSON_PRETTY_PRINT));

    header("Location: /");
}
