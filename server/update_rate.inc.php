<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "smartbin_db"; // Change to your actual database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newRate = $_POST["rate"];

    if (is_numeric($newRate) && $newRate > 0) {
        // Use prepared statement to prevent SQL injection
        $updateSql = "UPDATE rewards_sys SET rate = ? WHERE id = 1";
        $stmt = $conn->prepare($updateSql);
        
        // Bind the parameter
        $stmt->bind_param("d", $newRate); // "d" is for double (numeric value)
        
        if ($stmt->execute()) {
            echo "<script>alert('Rate updated successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "Error updating rate: " . $stmt->error;
        }
        
        // Close the prepared statement
        $stmt->close();
    } else {
        echo "<script>alert('Invalid rate value!'); window.location.href='index.php';</script>";
    }
}

$conn->close();
?>
