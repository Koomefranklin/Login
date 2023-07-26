<?php
$host = 'localhost';
$user = 'root';
$pass = '1245rooT';
$database = 'login';

$conn = mysqli_connect($host, $user, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}