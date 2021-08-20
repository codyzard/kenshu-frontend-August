<?php

include './config.php';

session_start();

if (isset($_SESSION['name']) || isset($_SESSION['username']) || isset($_SESSION['email'])) {
    header("Location: index.php");
} else {
    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        //Checking Email or Username existed;
        $sql_check_username = "SELECT * FROM users WHERE username = ?";
        $sql_check_email = "SELECT * FROM users WHERE email = ?";
        $stmt_check_username = $conn->prepare($sql_check_username);
        $stmt_check_email = $conn->prepare($sql_check_email);
        $stmt_check_username->bindValue(1, $username);
        $stmt_check_email->bindValue(1, $email);
        $stmt_check_username->execute();
        $stmt_check_email->execute();

        if ($stmt_check_username->rowCount() > 0) {
            echo "<script>alert('username existed'); window.history.back();</script>";
        } else if ($stmt_check_email->rowCount() > 0) {
            echo "<script>alert('email existed'); window.history.back();</script>";
        } else {
            try{
                $sql = "INSERT INTO users (email, username, name, password)
                VALUES (?, ?, ?, ?);";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1, $email);
                $stmt->bindValue(2, $username);
                $stmt->bindValue(3, $name);
                $stmt->bindValue(4, $password);
                $stmt->execute();
                $_SESSION['name']  = $name;
                $_SESSION['username']  = $username;
                $_SESSION['email']  = $email;
                header("Location: index.php");
            }catch(Exception $e){
                echo "Error ".$e->getMessage();
            }
        }
    }
}
