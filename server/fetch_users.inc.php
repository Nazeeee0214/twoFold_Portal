<?php
require 'db_conn.inc.php'; // Include your database connection
session_start();

// Check if the request is from DataTables
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$length = isset($_GET['length']) ? intval($_GET['length']) : 10;

try {
    // Total records count
    $totalQuery = $pdo->query("SELECT COUNT(*) FROM users");
    $totalRecords = $totalQuery->fetchColumn();

    // Fetch paginated data
    $stmt = $pdo->prepare("SELECT user_id, fullname, status FROM users LIMIT :start, :length");
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':length', $length, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the response
    $response = [
        "draw" => $draw,
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $totalRecords,
        "data" => $users
    ];

    echo json_encode($response);
} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    echo json_encode(["error" => "An error occurred while fetching user data."]);
}
