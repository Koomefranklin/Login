<?php
ini_set('session.cookie_lifetime', 600);
ini_set('session.gc_maxlifetime', 900);
@session_start();
require 'db.inc';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($email) or empty($password)) {
    $message = "All inputs are required";
} else {
    $query = "SELECT * FROM users WHERE username = '$username'";
    $getUser = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($getUser) > 0) {
        $user = mysqli_fetch_assoc($getUser);
        $stored_password = $user['password'];
        $salt = $user['salt'];
        $salted_input_password = $password . $salt;
        
        if (password_verify($salted_input_password, $stored_password)) {
            $sessionId = bin2hex(random_bytes(16));
            $_SESSION['session_id'] = $sessionId;
            $session_query = mysqli_query($conn, "INSERT INTO sessions (username, session_id, created_at) VALUES ('$username', '$sessionId', NOW())");
            header("Location: upload.php");
        } else {
            $message = "Incorrect Password";
        }    
    } else {
        $message = "User not Found";
    }
}
 mysqli_close($conn);