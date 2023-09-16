<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your database connection details
    $conn = mysqli_connect("localhost", "root", "", "votify");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST["login_username"];
    $password = $_POST["login_password"];

    // Validate and sanitize user inputs without using FILTER_SANITIZE_STRING
    $username = filter_var(trim($username), FILTER_SANITIZE_SPECIAL_CHARS);

    // Check user credentials (replace with your authentication logic)
    $sql = "SELECT * FROM users WHERE username = '$username'";

//check admin user credentials(Replace with your authentication logic)
$admin_sql = "SELECT * FROM admin_login WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the login_password (replace with your password hashing method) and login_username
       // After successful login
$_SESSION["user_id"] = $row["id"];
$_SESSION["username"] = $row["username"];
$_SESSION["profile_pic"] = $row["profile_pic"]; // Assuming you have a profile picture field in your database


            // Redirect to the homepage or another page upon successful login
            header("Location: homepage.php"); // Change the URL as needed
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password. <a href='index.php'>Try again</a>";
        }
    } else {
        // User not found display alert message
        echo "<script>alert('Invalid Username or Password');</script>";
    }
    
    ?>
    