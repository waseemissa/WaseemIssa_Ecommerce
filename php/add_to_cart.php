<?php
session_start();
require 'connection.php';


$today = date("d-m-Y");//today's date
$date=new DateTime($today);
$final_date = $date->format("Y-m-d");

$user_id = $_SESSION['user_id'];
$product_id = $_GET['pid'];
$amount = 1;

$query = "SELECT amount from products WHERE id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($total_in_stock);
$stmt->fetch();
$stmt->close();

$queryPrice = "SELECT price from products WHERE id=?";
$stmtP = $connection->prepare($queryPrice);
$stmtP->bind_param("i", $product_id);
$stmtP->execute();
$stmtP->store_result();
$stmtP->bind_result($price);
$stmtP->fetch();
$stmtP->close();

if($total_in_stock>=$amount){

$query1 = "INSERT INTO users_buy_products(user_id, product_id, date, amount, price) VALUES (?,?,?,?,?)";
$stmt1 = $connection->prepare($query1);
$stmt1->bind_param("iisid", $user_id, $product_id, $final_date, $amount, $price);
$stmt1->execute();

$query2 = "UPDATE products SET amount = amount - ? WHERE id=?";
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param("ii", $amount, $product_id);
$stmt2->execute();

}



$query3 = "SELECT SUM(amount) AS total FROM users_buy_products WHERE user_id = ? GROUP BY user_Id";
$stmt3 = $connection->prepare($query3);
$stmt3->bind_param("i", $user_id);
$stmt3->execute();
$stmt3->store_result();
$stmt3->bind_result($total_purchases);
$stmt3->fetch();
$stmt3->close();


echo $total_purchases;

?>