<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your database connection details
    $conn = mysqli_connect("localhost", "root", "", "votify");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST["signup_username"];
    $email = $_POST["signup_email"];
    $password = $_POST["signup_password"];
    $confirmPassword = $_POST["signup_confirm_password"];

    // Validate and sanitize user inputs
    $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);

    // Check if the username already exists
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Username already exists. <a href='index.php'>Try again</a>";
    } else {
        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "Passwords do not match. <a href='index.php'>Try again</a>";
        } else {
            // Hash the password (use a secure hashing algorithm)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Check if the email already exists
            $checkQuery = "SELECT * FROM users WHERE email = '$email'";
            $checkResult = mysqli_query($conn, $checkQuery);
            if (mysqli_num_rows($checkResult) > 0) {
                echo "Email already exists. <a href='index.php'>Try again</a>";
                exit();
            }
            else{

            // Insert user data into the database
            $insertQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";
            if (mysqli_query($conn, $insertQuery)) {
                //display an alert box with a message that "You have been registered successfully"
                echo "<script>alert('You have been registered successfully')</script>";
                // Redirect to the login page after successful registration
                header("Location: index.php"); // Change the URL as needed
                exit();
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }
        }
    }

    mysqli_close($conn);
}
?>
