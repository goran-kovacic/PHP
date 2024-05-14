<?php
    $password = "admin";

    //bcrypt
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if(password_verify("admin", $hashedPassword)){
        echo "correct password";
    }else{
        echo "incorrect password";
    }
?>