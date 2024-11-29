<?php

require 'db_conn.inc.php';
session_start(); // Ensure session is started to access logged-in user data

// Check if the user is logged in and retrieve the user_id
if (!isset($_SESSION['user']['user_id'])) {
   echo json_encode(["error" => "User not logged in"]);
   exit;
}
$loggedInUserId = $_SESSION['user']['user_id'];

// Default values for length and start
$limit = isset($_GET['length']) ? (int) $_GET['length'] : 10; // Default to 10 records
$start = isset($_GET['start']) ? (int) $_GET['start'] : 0;    // Default to 0
$searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : ''; // Default to empty string

try {
   // Get total records for the logged-in user
   $totalQuery = $pdo->prepare("SELECT COUNT(*) FROM transaction_history WHERE user_id = :user_id");
   $totalQuery->bindValue(':user_id', $loggedInUserId, PDO::PARAM_STR);
   $totalQuery->execute();
   $totalRecords = $totalQuery->fetchColumn();

   // Get filtered records count for the logged-in user
   $filteredQuery = "SELECT COUNT(*) FROM transaction_history 
                     WHERE user_id = :user_id 
                     AND (pts_earned LIKE :search OR bottle_quantity LIKE :search OR timestamp LIKE :search)";
   $filteredStmt = $pdo->prepare($filteredQuery);
   $filteredStmt->bindValue(':user_id', $loggedInUserId, PDO::PARAM_STR);
   $filteredStmt->bindValue(':search', "%$searchValue%", PDO::PARAM_STR);
   $filteredStmt->execute();
   $filteredRecord = $filteredStmt->fetchColumn();

   // Get filtered data for the logged-in user
   $dataQuery = "SELECT id, user_id, pts_earned, bottle_quantity, pts_deducted, acq_items, item_qty, service, timestamp 
                 FROM transaction_history 
                 WHERE user_id = :user_id 
                 AND (pts_earned LIKE :search OR bottle_quantity LIKE :search OR pts_deducted LIKE :search OR acq_items LIKE :search OR item_qty LIKE :search OR service LIKE :search OR timestamp LIKE :search) 
                 ORDER BY timestamp DESC 
                 LIMIT :start, :limit";
   $dataStmt = $pdo->prepare($dataQuery);
   $dataStmt->bindValue(':user_id', $loggedInUserId, PDO::PARAM_STR);
   $dataStmt->bindValue(':search', "%$searchValue%", PDO::PARAM_STR);
   $dataStmt->bindValue(':start', $start, PDO::PARAM_INT);
   $dataStmt->bindValue(':limit', $limit, PDO::PARAM_INT);
   $dataStmt->execute();
   $data = $dataStmt->fetchAll(PDO::FETCH_ASSOC);

   // Prepare the response
   $response = [
      "draw" => isset($_GET['draw']) ? intval($_GET['draw']) : 1,  // Make sure draw is an integer
      "recordsTotal" => $totalRecords,
      "recordsFiltered" => $filteredRecord,
      "data" => $data
   ];

   // Return the response in JSON format
   echo json_encode($response);
} catch (PDOException $e) {
   // Output the error to error log
   error_log("Database Error: " . $e->getMessage());

   // Optionally, display a simple error message in production
   echo json_encode(["error" => "An error occurred"]);
}
