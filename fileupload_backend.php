<?php
// Include the database connection configuration
include 'db_connect.php'; // Replace with your actual database configuration file

// Initialize a session to access user data
session_start();

// Check if the user is logged in (you can implement your authentication logic here)
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}

// Function to perform OCR verification on the Aadhar Card
function performOCRVerification($file) {
    // Check if the file is uploaded successfully
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false; // File upload error
    }

    // Specify the path to the Python script and the input image file
    $pythonScript = 'python_code/ocr_verification.py'; // Replace with the actual path to your Python script
    $inputImage = $file['tmp_name'];

    // Execute the Python script and capture its output
    exec("python $pythonScript $inputImage", $output, $returnCode);

    // Check the return code to determine success
    if ($returnCode === 0) {
        // The Python script executed successfully
        // Return true or false based on verification results
        return parsePythonOutput1($output);
    } else {
        // Handle the case where the Python script encountered an error
        return false;
    }
}

function parsePythonOutput1($output) {
    // Parse the output from the Python script to determine the verification result
    if (count($output) > 0) {
        $lastOutputLine = end($output);
        if (strpos($lastOutputLine, "Verification successful") !== false) {
            return true; // Verification successful
        }
    }
    return false; // Verification failed
}

// Function to perform facial recognition on the user's photo
function performFacialRecognition($file) {
    // Check if the file is uploaded successfully
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false; // File upload error
    }

    // Specify the path to the Python script and the input image file
    $pythonScript = 'python_code/face_recognition.py'; // Replace with the actual path to your Python script
    $inputImage = $file['tmp_name'];

    // Execute the Python script and capture its output
    exec("python $pythonScript $inputImage", $output, $returnCode);

    // Check the return code to determine success
    if ($returnCode === 0) {
        // The Python script executed successfully
        // Return true or false based on facial recognition results
        return parsePythonOutput2($output);
    } else {
        // Handle the case where the Python script encountered an error
        return false;
    }
}

function parsePythonOutput2($output) {
    // Parse the output from the Python script to determine the facial recognition result
    if (count($output) > 0) {
        $lastOutputLine = end($output);
        if (strpos($lastOutputLine, "Facial recognition successful") !== false) {
            return true; // Facial recognition successful
        }
    }
    return false; // Facial recognition failed
}


// Function to upload a document to the server
function uploadDocument($file) {
    // Specify the directory where documents will be stored
    $uploadDir = 'uploads/';

    // Create a unique file name to prevent conflicts
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uniqueFileName = uniqid('document_') . '.' . $fileExtension;
    
    // Define the full path for the uploaded document
    $destination = $uploadDir . $uniqueFileName;

    // Move the uploaded file to the destination
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return $destination;
    } else {
        return false; // File upload failed
    }
}

// Retrieve user information (you can replace this with your actual database query)
$user_id = $_SESSION['user_id']; // Assuming you store the user's ID in the session
$user_info = []; // Initialize an array to store user data

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a SQL statement to retrieve user information based on the user's ID
    $stmt = $pdo->prepare("SELECT username, email, Name, AadharCard, PhoneNumber, DateOfBirth, Age, Address, Gender, City, State, Country, profile_pic, RegistrationStatus, adhardoc, photodoc FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Fetch the user's information
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Database connection or query error
    // Handle the error appropriately (e.g., display an error message)
    echo "Database error: " . $e->getMessage();
}

// Check if Aadhar Card and Photo documents are uploaded
if (isset($_FILES['aadhar_card']) && isset($_FILES['user_photo'])) {
    $aadharCardFile = $_FILES['aadhar_card'];
    $userPhotoFile = $_FILES['user_photo'];

    // Perform OCR verification on the Aadhar Card
    $isAadharVerified = performOCRVerification($aadharCardFile);

    // Perform facial recognition on the user's photo
    $isFacialRecognitionVerified = performFacialRecognition($userPhotoFile);

    // If both verifications are successful, upload the documents
    if ($isAadharVerified && $isFacialRecognitionVerified) {
        $aadharCardPath = uploadDocument($aadharCardFile);
        $userPhotoPath = uploadDocument($userPhotoFile);
        
        // Update the user's data in the database with the uploaded document paths
        try {
            $stmt = $pdo->prepare("UPDATE users SET adhardoc = :adhardoc, photodoc = :photodoc, RegistrationStatus = 'Verified' WHERE id = :user_id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':adhardoc', $aadharCardPath);
            $stmt->bindParam(':photodoc', $userPhotoPath);
            $stmt->execute();
            
            // Redirect to a success page or display a success message
            header('Location: success_page.php');
            exit();
        } catch (PDOException $e) {
            // Handle the database update error
            echo "Database error: " . $e->getMessage();
        }
    }
}

// If verification or upload fails, display an error message or handle the error appropriately
echo "Document verification or upload failed.";

?>
