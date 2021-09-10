<?php
require 'connection.php';
session_start();

if(isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] != "" && $_POST['password'] != ""){
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
}
else{
    die("Try again later");
}

$query = "SELECT * FROM stores WHERE email =?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($row = $result->fetch_assoc()){
    if($row['password'] == $password){
        $_SESSION['store_id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        $_SESSION['phone_number']=$row['phone_number'];
        $_SESSION['address']=$row['address'];
        unset($_SESSION['store_login_error']);
        header("Location:../store_homepage.php");
    }
    else{
        $_SESSION['store_login_error']= "Wrong password.. Try again, please!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
    else{
        $_SESSION['store_login_error']= "Email not found.. Try again or create an account if you do not have one!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }





?>