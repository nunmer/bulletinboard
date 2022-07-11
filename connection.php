<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="bulletinboard";

// Create connection
$conn = new mysqli();
//MySQLi Procedural
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>