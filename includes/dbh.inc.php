<?php 

    $db_server = "localhost";
    $db_user = "root";
    $db_name = "cars";
    $db_pass = "";

    $conn = new mysqli($db_server , $db_user , $db_pass , $db_name);
    if ($conn->connect_error) {
        die('Connection error'. $conn->connect_error);
    }


?>