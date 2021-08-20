<?php

include './config.php';

session_start();

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users where email = ? AND password = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->bindValue(2, $password);
    $stmt->execute();
    $result = $stmt->fetch();
    if($stmt->rowCount() > 0){
        $_SESSION['name']  = $result['name'];
        $_SESSION['username']  = $result['username'];
        $_SESSION['email']  = $result['email'];
        header("Location: index.php");
    }
    else {

        header("Location: login.php");
    }
}
else{
    header("Location: login.php?error");
    exit();
}