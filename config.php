<?php

$db_server = "localhost";
$db_username = "root";
$db_password = "Hoangtu123$%^";
$db_name = "login_php";

try{
    $conn = new PDO("mysql:host=$db_server; dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed".$e->getMessage();
}