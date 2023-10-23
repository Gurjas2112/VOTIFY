<?php
// Include the database connection configuration
include 'db_connect.php'; // Replace with your actual database configuration file

// Initialize a session to access user data
session_start();

// Check if the user is logged in (implement your authentication logic)
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}

// Define upload directories
$uploadDir = 'uploads/'; // Define the directory where uploaded files will be stored
$aadharCardDir = $uploadDir . 'aadhar_card/';
$photoDir = $uploadDir . 'photo/';

// Ensure the upload directories exist
if (!file_exists($aadharCardDir)) {
    mkdir($aadharCardDir, 0777, true); // Create the directory if it doesn't exist
}

if (!file_exists($photoDir)) {
    mkdir($photoDir, 0777, true); // Create the directory if it doesn't exist
}

// Check if the Aadhar card file is uploaded
if (isset($_FILES['aadhar_card'])) {
    $aadharCardFile = $_FILES['aadhar_card'];

    // Generate a unique filename for Aadhar card
    $aadharCardFilename = uniqid('aadhar_') . '.' . pathinfo($aadharCardFile['name'], PATHINFO_EXTENSION);

    // Define the target path for Aadhar card upload
    $aadharCardPath = $aadharCardDir . $aadharCardFilename;

    // Move Aadhar card file to the target path
    if (move_uploaded_file($aadharCardFile['tmp_name'], $aadharCardPath)) {
        // File uploaded successfully
        // Update the 'adhardoc' column in the database
        $userId = $_SESSION['user_id'];

        try {
            // Create a PDO instance
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Update the 'adhardoc' column in the 'users' table
            $stmt = $pdo->prepare("UPDATE users SET adhardoc = :aadharCardPath, RegistrationStatus = 'registered' WHERE id = :userId");
            $stmt->bindParam(':aadharCardPath', $aadharCardPath);
            $stmt->bindParam(':userId', $userId);

            if ($stmt->execute()) {
                // Check if both Aadhar card and photo are uploaded
                if (isset($_FILES['user_photo'])) {
                    $photoFile = $_FILES['user_photo'];

                    // Generate a unique filename for the photo
                    $photoFilename = uniqid('photo_') . '.' . pathinfo($photoFile['name'], PATHINFO_EXTENSION);

                    // Define the target path for photo upload
                    $photoPath = $photoDir . $photoFilename;

                    // Move photo file to the target path
                    if (move_uploaded_file($photoFile['tmp_name'], $photoPath)) {
                        // File uploaded successfully
                        // Update the 'photodoc' column in the database
                        $stmt = $pdo->prepare("UPDATE users SET photodoc = :photoPath, RegistrationStatus = 'registered' WHERE id = :userId");
                        $stmt->bindParam(':photoPath', $photoPath);
                        $stmt->bindParam(':userId', $userId);

                        if ($stmt->execute()) {
                            // Both documents are uploaded successfully
                            // Redirect to the 'acknowledge_page.php' page
                            header('Location: acknowledge_page.php');
                            exit;
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
}

// Redirect to an appropriate page in case of errors
header('Location: dashboard-forms-elements2.php');
?>
