<?php
include "db_conn.inc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $student_id = $_POST['student_id'];
  $email = $_POST['email'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $suffix = $_POST['suffix'];
  $fullname = $_POST['fullname'];
  $department = $_POST['department'];
  $password = $_POST['password'];

  // Hash the password before saving it
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
    // Set PDO to throw exceptions for errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert new user data into the database
    $query = "INSERT INTO users (student_id, email, fname, mname, lname, suffix, fullname, department, password) 
                  VALUES (:student_id, :email, :fname, :mname, :lname, :suffix, :fullname, :department, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':mname', $mname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':suffix', $suffix);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':password', $hashed_password);

    $stmt->execute();

    echo "Registration successful!";  // Success response
  } catch (PDOException $e) {
    // Return error if something goes wrong
    echo "Error: " . $e->getMessage();
  }
} else {
  echo "Invalid request method";
}
