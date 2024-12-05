<?php

require 'db_conn.inc.php';
session_start(); // Start session to access user data

// Ensure the user is logged in
if (!isset($_SESSION['user']['user_id'])) {
   echo json_encode(["error" => "User not logged in"]);
   exit;
}

$loggedInUserId = $_SESSION['user']['user_id'];

// Define default pagination parameters
$limit = isset($_GET['length']) ? (int) $_GET['length'] : 5; // Default to 5 rows per page
$start = isset($_GET['start']) ? (int) $_GET['start'] : 0;   // Start at first record
$searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : ''; // Search input

try {
   // Count total records for the logged-in user
   $totalQuery = $pdo->prepare("SELECT COUNT(*) FROM transaction_history WHERE user_id = :user_id");
   $totalQuery->bindValue(':user_id', $loggedInUserId, PDO::PARAM_STR);
   $totalQuery->execute();
   $totalRecords = $totalQuery->fetchColumn();

   // Count filtered records
   $filteredQuery = "SELECT COUNT(*) FROM transaction_history 
                      WHERE user_id = :user_id 
                      AND (acq_items LIKE :search OR item_qty LIKE :search OR pts_deducted LIKE :search OR service LIKE :search OR timestamp LIKE :search)";
   $filteredStmt = $pdo->prepare($filteredQuery);
   $filteredStmt->bindValue(':user_id', $loggedInUserId, PDO::PARAM_STR);
   $filteredStmt->bindValue(':search', "%$searchValue%", PDO::PARAM_STR);
   $filteredStmt->execute();
   $filteredRecords = $filteredStmt->fetchColumn();

   // Retrieve filtered data
   $dataQuery = "SELECT id, acq_items, item_qty, pts_deducted, service, timestamp 
                  FROM transaction_history 
                  WHERE user_id = :user_id 
                  AND (acq_items LIKE :search OR item_qty LIKE :search OR pts_deducted LIKE :search OR service LIKE :search OR timestamp LIKE :search) 
                  ORDER BY timestamp DESC 
                  LIMIT :start, :limit";
   $dataStmt = $pdo->prepare($dataQuery);
   $dataStmt->bindValue(':user_id', $loggedInUserId, PDO::PARAM_STR);
   $dataStmt->bindValue(':search', "%$searchValue%", PDO::PARAM_STR);
   $dataStmt->bindValue(':start', $start, PDO::PARAM_INT);
   $dataStmt->bindValue(':limit', $limit, PDO::PARAM_INT);
   $dataStmt->execute();
   $data = $dataStmt->fetchAll(PDO::FETCH_ASSOC);

   // Filter rows to exclude invalid data
   $filteredData = array_filter($data, function ($row) {
      return $row['pts_deducted'] !== null && $row['pts_deducted'] !== 0 &&
         $row['acq_items'] && $row['item_qty'] !== null && $row['item_qty'] !== 0 &&
         $row['service'];
   });

   // Return JSON response
   echo json_encode([
      "draw" => isset($_GET['draw']) ? intval($_GET['draw']) : 1,
      "recordsTotal" => $totalRecords,
      "recordsFiltered" => $filteredRecords,
      "data" => array_values($filteredData) // Reindex array after filtering
   ]);
} catch (PDOException $e) {
   error_log("Database Error: " . $e->getMessage());
   echo json_encode(["error" => "An error occurred"]);
}
