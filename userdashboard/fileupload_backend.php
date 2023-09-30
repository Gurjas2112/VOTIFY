
<?php
// Start the session
session_start();

require 'db_user_dash.php'; // Include your database connection

echo("<h1>File Upload</h1>");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Check if the form fields exist and have values
    if (isset($_FILES['aadhar_card']) && isset($_FILES['user_photo']) && isset($_FILES['user_signature'])) {
        // Function to upload all files, store them in the specified directory, and update the database
        function uploadFiles($targetDir, $conn) {
            $uploadedFiles = [];
            $allowedExtensions = array("jpg", "pdf");

            foreach (['aadhar_card', 'user_photo', 'user_signature'] as $inputName) {
                $file = $_FILES[$inputName];

                if (!empty($file['name'])) {
                    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

                    if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                        $uniqueFilename = $file['name'];
                        $targetFile = $targetDir . $uniqueFilename;

                        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                            $uploadedFiles[$inputName] = $targetFile; // Store the full path to the uploaded file
                        }
                    }
                }
            }

            return $uploadedFiles;
        }

        $uploadedFiles = uploadFiles($targetDir, $conn);

        if (count($uploadedFiles) === 3) {
            // All files uploaded successfully
            $aadharText = $uploadedFiles['aadhar_card'];
            $photoText = $uploadedFiles['user_photo'];
            $signatureText = $uploadedFiles['user_signature'];

            $sql = "SELECT max(UserID) FROM users";
            if (mysqli_query($conn, $sql)) {
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $userID = $row['max(UserID)'];
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            $sql = "UPDATE users SET adhardoc = ?, photodoc = ?, signdoc = ? WHERE UserID = ?";
            // Prepare the statement
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $aadharText, $photoText, $signatureText, $userID);

            if ($stmt->execute()) {
                echo "<h2>File information update successful!</h2>";
                // Redirect to users-profile.php after successful upload
                header("Location: users-profile.php");
                exit;
            } else {
                echo "Error: " . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading one or more files.<br>";
        }
    }
}

// Display images from the database
$sql = "SELECT adhardoc, photodoc, signdoc FROM users WHERE userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $lastUserID);
$stmt->execute();
$stmt->bind_result($adharCardPath, $photoPath, $signaturePath);
$stmt->fetch();

// Close the database connection
$conn->close();
?>
