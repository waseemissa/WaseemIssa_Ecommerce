<?php
require 'connection.php';

$id = $_GET['pid'];

$query = "DELETE FROM products WHERE id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);