<?php
    include "data.get.php";

    $uName =$_POST['username'];
    $pass =$_POST['password'];

    $users = fn_users("../data/users.json");
    
foreach($users as $indiv_user){
    if($indiv_user->username == $uName && password_verify($pass, $indiv_user->password)){
        session_start();
        $_SESSION['user_details'] = $indiv_user;
        header("Location: /");
    }
}

echo "No user found / Wrong credentials.";
echo "<br>";
echo '<a href="/views/forms/login.php">Go to login</a>"';