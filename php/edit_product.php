<?php
require 'connection.php';

$id = $_GET['pid'];

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




$query = "UPDATE products SET name = ?, artist = ?, picture = ?, price = ?, amount = ?, description = ? WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("sssdisi", $name, $artist, $filename, $price, $amount, $description, $id);
$stmt->execute();
move_uploaded_file($tempname, $folder);
header('Location:../store_homepage.php');



?>