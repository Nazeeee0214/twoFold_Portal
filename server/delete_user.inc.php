<?php
require 'db_conn.inc.php'; // Include your database connection

// Check if data is sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'] ?? null;

    if ($userId) {
        try {
            $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
            $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "User not found."]);
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            echo json_encode(["success" => false, "message" => "Database error occurred."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid input data."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
