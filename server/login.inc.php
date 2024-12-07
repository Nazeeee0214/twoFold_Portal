<?php
include "db_conn.inc.php";
session_start();

$user_id = $_POST["user_id"];
$password = $_POST["password"];

if (!empty($user_id) && !empty($password)) { // Validate input fields
    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
        // Set PDO to throw exceptions for errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM users WHERE user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if ($result) {
            // Check if the account is locked
            if ($result['status'] === 'LOCKED') {
                echo 'Your account is locked. Please contact the administrator.';
            } else if (password_verify($password, $result['password'])) { // Verify the password
                // Set session variables
                $_SESSION['user'] = [
                    'fullname' => $result['fullname'],
                    'restriction' => $result['restriction'],
                    'user_id' => $result['user_id'],
                    'points' => $result['points'],
                    'fname' => $result['fname'],
                    'mname' => $result['mname'],
                    'lname' => $result['lname'],
                    'suffix' => $result['suffix'],
                    'department' => $result['department'],
                    'email' => $result['email'],
                    'photo' => $result['photo'],
                    'status' => $result['status'],
                ];
                echo "success";
            } else {
                echo 'Invalid user_id or password.';
            }
        } else {
            echo 'Invalid user_id or password.';
        }
    } catch (PDOException $e) {
        // Handle database connection errors
        echo 'Database error: ' . $e->getMessage();
    }
} else {
    echo 'Please scan your barcode.';
}
