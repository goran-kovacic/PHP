<?php
    include("database.php");

    $username = "USER3";
    $password = "PW3";
    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (user, password) 
    VALUES ('$username','$hash') ";

    try{
        mysqli_query($conn, $sql);
        echo "user registered";
    }catch(mysqli_sql_exception){
        echo "Could not register";
    }

    

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    Hello
</body>
</html>