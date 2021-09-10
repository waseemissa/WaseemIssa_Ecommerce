<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "storesdb";

$connection = new mysqli($server, $username, $password, $dbname);

if($connection->connect_error){
	die("Failed");
}

?>