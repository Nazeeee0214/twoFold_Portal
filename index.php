<?php
session_start();

// Check if the user is logged in by checking a session variable, e.g., 'user_id'
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: auth-basic-login.php");
    exit();
}
?>