<?php

$host = "localhost";
$username = "root";
$password = "youe_mysql_password";
$database = "techsupport";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>
