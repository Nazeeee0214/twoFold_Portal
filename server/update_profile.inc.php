<?php
session_start();
require 'db_conn.inc.php'; // Assuming it's in the same folder

header('Content-Type: application/json'); // Set response type to JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user']['user_id'];
    $firstName = $_POST['firstName'] ?? null;
    $middleName = $_POST['middleName'] ?? null;
    $lastName = $_POST['lastName'] ?? null;
    $suffix = $_POST['suffix'] ?? null;
    $email = $_POST['email'] ?? null;
    $department = $_POST['department'] ?? null;
    $photo = $_FILES['photo'] ?? null;
    $fullName = $_POST['fullName'] ?? null; // Get full name from the form

    $errors = [];
    $photoPath = $_SESSION['user']['photo']; // Keep existing photo if no new photo is uploaded

    // Handle photo upload
    if (!empty($photo) && $photo['error'] === UPLOAD_ERR_OK) {
        // Validate the uploaded photo (size, extension, etc.)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 800 * 1024; // Max size in bytes

        if (!in_array($photo['type'], $allowedTypes)) {
            $errors[] = 'Invalid file type. Only JPG, PNG, and GIF are allowed.';
        }

        if ($photo['size'] > $maxSize) {
            $errors[] = 'File size exceeds the 800KB limit.';
        }

        if (empty($errors)) {
            // If validation passes, process the upload
            $uploadDir = 'uploads/profile_pictures/';
            $fileExtension = pathinfo($photo['name'], PATHINFO_EXTENSION);
            $fileName = $userId . '_' . time() . '.' . $fileExtension;
            $photoPath = $uploadDir . $fileName;

            if (!move_uploaded_file($photo['tmp_name'], $photoPath)) {
                $errors[] = 'Failed to upload photo.';
            }

            // Delete the old photo if a new one is uploaded
            if ($photoPath && file_exists($_SESSION['user']['photo'])) {
                unlink($_SESSION['user']['photo']);
            }
        }
    }

    // If no errors, proceed to update the user details in the database
    if (empty($errors)) {
        try {
            // Construct the SQL query to update the user details
            $query = "UPDATE users SET fname = :firstName, mname = :middleName, lname = :lastName, 
                      suffix = :suffix, email = :email, photo = :photo, fullname = :fullName"; // Correct column name for fullname

            if ($department) {
                $query .= ", department = :department";
            }

            $query .= " WHERE user_id = :userId";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':middleName', $middleName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':suffix', $suffix);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':photo', $photoPath);
            $stmt->bindParam(':fullName', $fullName); // Correct column name for fullname
            $stmt->bindParam(':userId', $userId);

            if ($department) {
                $stmt->bindParam(':department', $department);
            }

            $stmt->execute();  // Execute the query

            // Update the session data with new values
            $_SESSION['user']['fname'] = $firstName;
            $_SESSION['user']['mname'] = $middleName;
            $_SESSION['user']['lname'] = $lastName;
            $_SESSION['user']['suffix'] = $suffix;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['photo'] = $photoPath;
            $_SESSION['user']['fullname'] = $fullName; // Update fullname in session

            if ($department) {
                $_SESSION['user']['department'] = $department;
            }

            echo json_encode(['status' => 'success']);
        } catch (PDOException $e) {
            // Log detailed error message
            error_log('Database Error: ' . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error occurred: ' . $e->getMessage()]);
        }
    } else {
        // Return validation errors
        echo json_encode(['status' => 'error', 'message' => implode(', ', $errors)]);
    }
}
