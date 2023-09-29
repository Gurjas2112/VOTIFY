<?php
// Start the session
session_start();

require 'db_user_dash.php'; // Include your database connection

echo("<h1>File Upload</h1>");
// You should set 'lastUserID' here based on your login or registration logic
//$_SESSION['lastUserID'] = $lastUserID;// Replace with your user ID retrieval logic
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    

    // Check if the form fields exist and have values
    if (isset($_FILES['aadhar_card']) && isset($_FILES['user_photo']) && isset($_FILES['user_signature'])) {
       
        // Function to upload a file, store it in the specified directory, and update the database
        function uploadFile($file, $targetDir, $conn) {
            $aadharText = $_FILES['aadhar_card']['name'];
            $photoText = $_FILES['user_photo']['name'];
            $signatureText = $_FILES['user_signature']['name'];
            
            if (!empty($file['name'])) {
                $allowedExtensions = array("jpg", "pdf");
                $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

                if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                    $uniqueFilename = $file['name'];
                    $targetFile = $targetDir . $uniqueFilename;
                    $sql="SELECT max(UserID) from users";
                    if(mysqli_query($conn, $sql)){
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $userID = $row['max(UserID)'];
                    }
                    else{
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                        $sql = "UPDATE users SET adhardoc = ?, photodoc = ?, signdoc = ? WHERE UserID = $userID";

                    // Prepare the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $aadharText, $photoText, $signatureText);
                    
                    if ($stmt->execute()) {
                        echo "<h2>File information update successful!</h2>";
                        // Redirect to users-profile.php after successful upload
                        header("Location: users-profile.php");
                        exit;
                    } else {
                        echo "Error: " . "<br>" . mysqli_error($conn);
                    }

                        if ($stmt->execute()) {
                            $stmt->close();
                            return true;
                        }
                    }
                }
            }

            return false;
        }

        if (uploadFile($_FILES['aadhar_card'], $targetDir,$conn) &&
            uploadFile($_FILES['user_photo'], $targetDir, $conn) &&
            uploadFile($_FILES['user_signature'], $targetDir, $conn)) {
            echo "Aadhar Card, Photo, and Signature uploaded successfully and data updated in the database.<br>";
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

// if (!empty($adharCardPath) && !empty($photoPath) && !empty($signaturePath)) {
//     echo "<h2>Aadhar Card:</h2>";
//     echo "<img src='" . $adharCardPath . "' alt='Aadhar Card'>";

//     echo "<h2>User Photo:</h2>";
//     echo "<img src='" . $photoPath . "' alt='User Photo'>";

//     echo "<h2>User Signature:</h2>";
//     echo "<img src='" . $signaturePath . "' alt='User Signature'>";
// } else {
//     echo "No documents found for this user in the database.";
// }

// Close the database connection
$conn->close();
?>
