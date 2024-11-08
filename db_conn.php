<?php
$servername = "localhost";
$database = "stc_database";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection hbAZk18VnMPiB6rpABHV
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
