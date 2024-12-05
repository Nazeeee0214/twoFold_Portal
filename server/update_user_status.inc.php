<?php
require 'db_conn.inc.php'; // Include your database connection

// Check if data is sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'] ?? null;
    $newStatus = $_POST['status'] ?? null;

    if ($userId && $newStatus) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET status = :status WHERE user_id = :user_id");
            $stmt->bindValue(':status', $newStatus, PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "No rows updated."]);
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
