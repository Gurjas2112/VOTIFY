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

// Initialize progress counters
$filledFields = 0;

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
        $filledFields++;
        // Update the 'adhardoc' column in the database
        $userId = $_SESSION['user_id'];
    }
}

// Check if the Photo file is uploaded
if (isset($_FILES['user_photo'])) {
    $photoFile = $_FILES['user_photo'];

    // Generate a unique filename for the photo
    $photoFilename = uniqid('photo_') . '.' . pathinfo($photoFile['name'], PATHINFO_EXTENSION);

    // Define the target path for photo upload
    $photoPath = $photoDir . $photoFilename;

    // Move photo file to the target path
    if (move_uploaded_file($photoFile['tmp_name'], $photoPath)) {
        // File uploaded successfully
        $filledFields++;
        // Update the 'photodoc' column in the database
        $userId = $_SESSION['user_id'];
    }
}

// Calculate photo_progress based on the number of fields filled
$totalFields = 2; // Total number of fields (Aadhar card and photo)
$photoProgress = ($filledFields / $totalFields) * 100;

// Update the 'photo_progress' column in the 'users' table
try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Update the 'adhardoc' and 'photodoc' columns in the 'users' table
    $stmt = $pdo->prepare("UPDATE users SET adhardoc = :aadharCardPath, photodoc = :photoPath, photo_progress = :photoProgress, RegistrationStatus = 'registered' WHERE id = :userId");
    $stmt->bindParam(':aadharCardPath', $aadharCardPath);
    $stmt->bindParam(':photoPath', $photoPath);
    $stmt->bindParam(':photoProgress', $photoProgress);
    $stmt->bindParam(':userId', $userId);

    if ($stmt->execute()) {
        ?>

        <script>
            var submit = confirm("Are you sure you want to submit?");
            if (submit) {
                window.location.href = "acknowledge_page.php";
            } else {
                window.location.href = "dashboard-forms-elements2.php";
            }
        </script>

        <?php
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
