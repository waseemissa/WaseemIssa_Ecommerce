<?php
require 'connection.php';
session_start();

$store_id = $_SESSION['store_id'];

if(isset($_POST['product_name']) && $_POST['product_name'] !=""){
    $name = $_POST['product_name'];

    }
else{
    die("error in name");
}

if(isset($_POST['product_artist']) && $_POST['product_artist'] !=""){
    $artist = $_POST['product_artist'];

    }
else{
    die("error in artist");
}

if(isset($_POST['product_description']) && $_POST['product_description'] !=""){
    $description = $_POST['product_description'];

    }
else{
    die("error in description");
}

if(isset($_POST['product_amount']) && $_POST['product_amount'] !=""){
    $amount = $_POST['product_amount'];

    }
else{
    die("error in amount");
}

if(isset($_POST['product_price']) && $_POST['product_price'] !=""){
    $price = $_POST['product_price'];

    }
else{
    die("error in price");
}



$filename = $_FILES["file_upload"]["name"];
$tempname = $_FILES["file_upload"]["tmp_name"];    
$folder = "../database_images/".$filename;




$query = "INSERT INTO products(store_id, name, artist, picture, price, amount, description) VALUES (?,?,?,?,?,?,?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("isssdis", $store_id, $name, $artist, $filename, $price, $amount, $description);
$stmt->execute();
move_uploaded_file($tempname, $folder);
header('Location:../store_homepage.php');


?>