<?php
$servername = "localhost";
$username = "root";
include "mysql_password.php";
$dbname = "forumdatabase";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
?>