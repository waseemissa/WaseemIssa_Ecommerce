<?php
require 'connection.php';
session_start();


$valid = true;
if(isset($_POST['name']) && $_POST['name'] !="" ){
    $name = $_POST['name'];
    unset($_SESSION['name_error']);

    if(strlen($name) < 5){
        $_SESSION['name_error'] = "Name should be at least 5 characters";
        $valid = false;
    }
}

else{
    die();
}

if(isset($_POST['email']) && $_POST['email'] !=""){
    $email = $_POST['email'];
    unset($_SESSION['email_error']);

    if (strlen($email)<5 || !(filter_var($email, FILTER_VALIDATE_EMAIL))){
        $_SESSION['email_error'] = "Email should be like name@example.com";
        $valid = false;
    }
}

else{
    die();
}

if(isset($_POST['password']) && isset($_POST['confirm_password']) && $_POST['password'] != "" && $_POST['confirm_password'] !=""){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed_password = hash('sha256', $password);
    unset($_SESSION['password_error']);

    if($password != $confirm_password){
        $_SESSION['confirm_password_error'] = "Passwords should match";
        $valid = false;
    }
    if(strlen($password) <8){
        $_SESSION['password_error'] = "Password should be at least 8 characters";
        $valid = false;
    }
}
else{
    die();
}

if(isset($_POST['phone_number']) && $_POST['phone_number'] != ""){
    $phone_number = $_POST['phone_number'];
    unset($_SESSION['phone_error']);

    if(strlen($phone_number)<11){
        $_SESSION['phone_error'] = "Phone number should start with +961 followed by eight digits";
        $valid = false;
    }
}
else{
    die();
}

if(isset($_POST['address']) && $_POST['address'] !=""){
    $address = $_POST['address'];
}
else{
    die();
}


$query1 = "SELECT * FROM stores WHERE email = ?";
$stmt1 = $connection->prepare($query1);
$stmt1->bind_param("s", $email);
$stmt1->execute();
$result = $stmt1->get_result();
$row1 = $result->fetch_assoc();

if(!empty($row1)){
    $_SESSION['error_email'] = "Email Already Exists!";
    $valid = false;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else{
    if($valid){
    unset($_SESSION['error_email']);
    $query2 = "INSERT INTO stores(name,email, phone_number, address, password) VALUES (?,?,?,?,?)";
    $stmt2 = $connection->prepare($query2);
    $stmt2->bind_param("sssss", $name, $email, $phone_number, $address, $hashed_password);
    $stmt2->execute();
    header("Location:../store_login.php");
    }
    else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}

?>