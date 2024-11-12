<?php
$databaseHost = 'localhost';
$databaseName = 'smartbin_db';
$databaseUsername = 'root'; // Change this to your actual database username
$databasePassword = '';     // Change this to your actual database pass6word

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);

    // Set PDO to throw exceptions for errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    date_default_timezone_set("Asia/Manila");
    $t = time();
    $dttm = date("Y-m-d H:i:s", $t);
    $dttm2 = date("Y-m-d H:i", $t);
    $dt2 = date("Y-m-d", $t);
    $dt0 = date("y-m-d", $t);
    $dt = date("Y-m-d", strtotime($dt0));
    $time0 = date("H:i", $t);
    $time = date("H:i", strtotime($time0));

    // Perform queries using prepared statements for security
    $stmt = $pdo->prepare("SET NAMES 'utf8'");
    $stmt->execute();

    $stmt = $pdo->prepare("SET CHARACTER SET 'utf8'");
    $stmt->execute();


    // Check for connection errors
    if ($pdo->errorCode() !== '00000') {
        $errorInfo = $pdo->errorInfo();
        echo "PDO Error: " . $errorInfo[2];
    }
} catch (PDOException $e) {
    echo "Failed to connect to MySQL: " . $e->getMessage();
}
