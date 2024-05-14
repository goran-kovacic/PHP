<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pw = "";
    $db_name = "testdb";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server,$db_user,$db_pw,$db_name);
    }catch(mysqli_sql_exception){          
        echo "Not connected <br>";
    }
    

    if($conn){
        echo "Database connected <br>";
    }
?>