<?php
require 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];
$product_id = $_GET['pid'];

$query1 = "SELECT * FROM users_like_products WHERE user_id=? AND product_id=?";
$stmt1 = $connection->prepare($query1);
$stmt1->bind_param("ii", $user_id, $product_id);
$stmt1->execute();
$result1 = $stmt1->get_result();


if($result1->fetch_assoc()){
    $query2 = "DELETE FROM users_like_products WHERE user_id=? AND product_id=?";
    $stmt2 = $connection->prepare($query2);
    $stmt2->bind_param("ii", $user_id, $product_id);
    $stmt2->execute();

    $query3 = "SELECT COUNT(*) FROM users_like_products WHERE user_id=?";
    $stmt3 = $connection->prepare($query3);
    $stmt3->bind_param("i", $user_id);
    $stmt3->execute();
    $stmt3->store_result();
    $stmt3->bind_result($total_likes);
    $stmt3->fetch();
    $stmt3->close();

    echo $total_likes;


    
}

else{
    $query4 = "INSERT INTO users_like_products(user_id, product_id) VALUES (?,?)";
    $stmt4 = $connection->prepare($query4);
    $stmt4->bind_param("ii", $user_id, $product_id);
    $stmt4->execute();
    $stmt4->store_result();
    $stmt4->fetch();
    $stmt4->close();

    $query5 = "SELECT COUNT(*) FROM users_like_products WHERE user_id=?";
    $stmt5 = $connection->prepare($query5);
    $stmt5->bind_param("i", $user_id);
    $stmt5->execute();
    $stmt5->store_result();
    $stmt5->bind_result($total_likes);
    $stmt5->fetch();
    $stmt5->close();

    echo $total_likes;

    
}



?>