<?php

include 'db_connect.php'; // Replace with your actual database configuration file
session_start();
$userID = $_SESSION['user_id'];
// Initialize variables to store user data
$name = $aadharCard = $phoneNumber = $dateOfBirth = $age = $Email = $address = $gender1 = $gender2 = $gender3 = $city = $state = $country = "";
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
// Set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// SQL query to select user data into the database
$sql = "SELECT * FROM users WHERE id = $userID";
// Prepare the SQL statement
$stmt = $pdo->prepare($sql);
// Execute the statement
$stmt->execute();
// Fetch the rows from the database
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// Store the fetched user data into the variables
$name = $user['Name'];
$aadharCard = $user['AadharCard'];
$phoneNumber = $user['PhoneNumber'];
$dateOfBirth = $user['DateOfBirth'];
$age = $user['Age'];
$Email = $user['Email'];
$gender1 = $user['Gender1'];
$gender2 = $user['Gender2'];
$gender3 = $user['Gender3'];
$address = $user['Address'];
$city = $user['City'];
$state = $user['State'];
$country = $user['Country'];
$photoDoc = $user['photoDoc'];
$aadharCardDoc = $user['adhardoc'];

// Close the database connection
unset($pdo);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>VOTIFY - Application Form</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="img/logo1.png" alt="VOTIFY Logo" class="logo" width = "100px" height = "100px">
            <h1>VOTIFY</h1>
        </div>
        <h2>Application Form</h2>
        <div class="form-fields">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dateOfBirth); ?></p>
        <p><strong>Aadhar Card Number:</strong> <?php echo htmlspecialchars($aadharCard); ?></p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phoneNumber); ?></p>
        <p><strong>Email Address:</strong> <?php echo htmlspecialchars($Email); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?>, <?php echo htmlspecialchars($city); ?>, <?php echo htmlspecialchars($country); ?></p>
       <p><strong>Photo:</strong> <img src="<?php echo htmlspecialchars($photoDoc); ?>" alt="Uploaded Photo" width="200px"></p>
        <p><strong>Aadhaar Card:</strong> <img src="<?php echo htmlspecialchars($aadharCardDoc); ?>" alt="Uploaded Aadhaar" width="150px"></p>
    </div>

    <script src="script.js"></script>
</body>

</html>