<?php
include "db_conn.inc.php";
session_start();

$student_id = $_POST["student_id"];
$password = $_POST["password"];


if (!empty('student_id') && !empty('password')) {
    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
        // Set PDO to throw exceptions for errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT id, student_id, password, restriction, fullname FROM users WHERE student_id = :student_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        //check if the user exist and verify the password
        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['user'] = [
                'fullname' => $result['fullname'],
                'restrictions' => $result['restriction']
            ];
            echo "success";
        } else {
            echo 'Invalid student_id or password.';
        }
    } catch (PDOException $e) {
        //handles database error connection
        echo 'Database error: ' . $e->getMessage();
    }
} else {
    echo 'please scan your barcode';
}
