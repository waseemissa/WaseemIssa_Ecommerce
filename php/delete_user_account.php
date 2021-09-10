<?php
require 'connection.php';
$id = $_GET['uid'];

$query = "DELETE FROM users WHERE id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
session_destroy();
header("Location:../index.php");

?>