<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizenship and Nationality</title>
    <style>
        /* Styles as before */
    </style>
</head>
<body>
<form action="" method="POST">
    <!-- Citizenship Status Section -->
    <label>Citizenship Status</label>
    <div class="dropdown-container">
        <!-- Radio buttons and labels with appropriate classes -->
        <div class="dropdown">
            <input type="radio" name="citizenship_status" id="option1" class="dropdown-toggle" value="Citizen">
            <label for="option1" class="dropdown-label">Citizen</label>
        </div>

        <div class="dropdown">
            <input type="radio" name="citizenship_status" id="option2" class="dropdown-toggle" value="Permanent Citizen">
            <label for="option2" class="dropdown-label">Permanent Citizen</label>
        </div>

        <div class="dropdown">
            <input type="radio" name="citizenship_status" id="option3" class="dropdown-toggle" value="NRI">
            <label for="option3" class="dropdown-label">NRI</label>
        </div>
    </div>

    <!-- Country of Citizenship Section -->
    <div class="input-field">
        <label class="input-label">Country of Citizenship</label>
        <input type="text" class="input" name="country_of_citizenship" required>
    </div>

    <!-- Nationality Section -->
    <div class="input-field">
        <label class="input-label">Nationality</label>
        <input type="text" class="input" name="nationality" required>
    </div>

    <!-- Your button container -->
    <div class="button-container">
        <input type="button" value="Previous" class="button" onclick="window.location.href='REGFORM.php'">
        <input type="submit" value="Save and Next" class="button">
    </div>
</form>

<?php
// Include your database connection script (e.g., db_user_dash.php)
require 'db_user_dash.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if the form is submitted
    // Sanitize and validate input (you can add more validation as needed)
    $citizenship_status = $_POST['citizenship_status'];
    $country_of_citizenship = $_POST['country_of_citizenship'];
    $nationality = $_POST['nationality'];

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, "INSERT INTO voterinformation (citizenship_status, country_of_citizenship, nationality) 
    VALUES (?, ?, ?)");

    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "sss", $citizenship_status, $country_of_citizenship, $nationality);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Data inserted into Database";
        } else {
            echo "Failed to insert data into Database: " . mysqli_error($conn); // Provide error message
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement: " . mysqli_error($conn); // Provide error message
    }
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
