<?php
require 'include/db.inc';
$password = $_POST['password'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$username = $_POST['username'];

if (empty($username) or empty($password) or empty($password2) or empty($name)) {
    $message = "All inputs are required";
} else {
    if ($password2 !== $password){
            $message = "Passwords Don't match";
    } else {
        $salt = bin2hex(random_bytes(16));
        $salted_password = $password . $salt;
        $hashed_password = password_hash($salted_password, PASSWORD_BCRYPT);
        try {
            $adduser = "INSERT INTO users (username, name, password, salt) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $adduser);
        
            mysqli_stmt_bind_param($stmt, "ssss", $username, $name, $hashed_password, $salt);
        
            if (mysqli_stmt_execute($stmt)){
                header('Location: login.php');
            } else {
                die("Error: " . mysqli_error($conn));
            }
        
            mysqli_stmt_close($stmt);
        } catch (Exception $e) {
            if ($e->getCode() === 1062) {
                $message = "Username already taken!";
            }
        }
    }
}
mysqli_close($conn);