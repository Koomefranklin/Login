<?php
@session_start();
require 'db.inc';
if (isset($_SESSION['session_id'])) {
    $sessionId = $_SESSION['session_id'];
    $getUsername = mysqli_query($conn, "SELECT username FROM sessions WHERE session_id = '$sessionId'");
    if (mysqli_num_rows($getUsername) > 0){
        $username = mysqli_fetch_assoc($getUsername)['username'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $getUser = mysqli_query($conn, $query);
        if (mysqli_num_rows($getUser) > 0){
            $user = mysqli_fetch_assoc($getUser);
            $username = $user['username'];
            $name = $user['name'];
        } else {
            header("Location: login.php");
        }
    } else {
        $message = 'You were logged out due to inactivity. Please login again.';
        $encodedMessage = urlencode($message);
        header("Location: login.php?message=$encodedMessage");
    }
} else {
    $message =  'You\'ll need to login first';
    $encodedMessage = urlencode($message);
    header("Location: login.php?message=$encodedMessage");
}
mysqli_close($conn);