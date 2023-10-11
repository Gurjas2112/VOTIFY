<?php
// Start the session
session_start();

require 'db_user_dash.php'; // Include your database connection (PDO version)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    var_dump($_FILES);
    // Check if the form fields exist and have values
    if (isset($_FILES['aadhar_card']) && isset($_FILES['user_photo']) && isset($_FILES['user_signature'])) {
        // Function to upload a file, store it in the specified directory, and update the database
        function uploadFile($file, $targetDir, $pdo) {
            $filename = $file['name'];
            $allowedExtensions = array("jpg", "pdf");  // Add any other allowed extensions
            $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);

            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                $uniqueFilename = uniqid() . "_" . $filename;
                $targetFile = $targetDir . $uniqueFilename;

                if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                    // Get the user ID from the session
                    $userID = $_SESSION['user_data']['id'];

                    $column = "";
                    if ($filename == $_FILES['aadhar_card']['name']) {
                        $column = "adhardoc";
                    } elseif ($filename == $_FILES['user_photo']['name']) {
                        $column = "photodoc";
                    } elseif ($filename == $_FILES['user_signature']['name']) {
                        $column = "signdoc";
                    }

                    // Prepare an SQL statement to update the user's file information
                    $sql = "UPDATE users SET $column = :filename WHERE id = :userID";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':filename', $filename);
                    $stmt->bindParam(':userID', $userID);

                    if ($stmt->execute()) {
                        echo "<h2>File information update successful!</h2>";
                        header("Location: dashboard-users_profile.php");
                        exit;
                    } else {
                        echo "Error: " . "<br>" . $stmt->errorInfo()[2];
                    }
                }
            }
            return false;
        }

        if (uploadFile($_FILES['aadhar_card'], $targetDir, $pdo) &&
            uploadFile($_FILES['user_photo'], $targetDir, $pdo) &&
            uploadFile($_FILES['user_signature'], $targetDir, $pdo)) {
            echo "<h2>File upload successful!</h2>";
        } else {
            echo "<h2>File upload failed!</h2>";
        }
    } else {
        echo "Error: Files not provided.";
    }
}
?>
