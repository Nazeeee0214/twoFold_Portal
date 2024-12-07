<?php
include "db_conn.inc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $fullname = $_POST['fullname'];
    $restriction = $_POST['restriction'];
    $password = $_POST['password'];

    // Hash the password before saving it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
        // Set PDO to throw exceptions for errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert new user data into the database
        $query = "INSERT INTO users (user_id, email, fname, mname, lname, suffix, fullname, restriction, password) 
                  VALUES (:user_id, :email, :fname, :mname, :lname, :suffix, :fullname, :restriction, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':mname', $mname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':suffix', $suffix);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':restriction', $restriction);
        $stmt->bindParam(':password', $hashed_password);

        $stmt->execute();

        echo "Admin created successfuly!";  // Success response
    } catch (PDOException $e) {
        // Return error if something goes wrong
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}
