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

    // Check regular user credentials
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the login_password (replace with your password hashing method) and login_username
        if (password_verify($password, $row["password"])) {
            // Regular user login successful
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["profile_pic"] = $row["profile_pic"]; // Assuming you have a profile picture field in your database
            // Redirect to the homepage or another page upon successful login
            header("Location: homepage.php"); // Change the URL as needed
            exit();
        } else {
            // Password is incorrect for regular user
            echo "Incorrect password. <a href='index.php'>Try again</a>";
        }
    } else {
        // Check admin user credentials
        $admin_sql = "SELECT * FROM admin_login WHERE admin_username = 'admin'";
        $admin_result = mysqli_query($conn, $admin_sql);

        if (mysqli_num_rows($admin_result) == 1) {
            $admin_row = mysqli_fetch_assoc($admin_result);

            // Verify the login_password for admin user (replace with your password hashing method)
            if ($password === $admin_row["admin_password"]) {
                // Admin user login successful
                $_SESSION["admin_id"] = $admin_row["id"];
                $_SESSION["admin_username"] = $admin_row["admin_username"];
                $_SESSION["admin_profile_pic"] = $admin_row["admin_profile_pic"]; // Assuming you have a profile picture field in your admin_login table
                // Redirect to the admin dashboard or another page upon successful login
                header("Location: admin.php"); // Change the URL as needed
                exit();
            } else {
                // Password is incorrect for admin user
                echo "Incorrect password for admin. <a href='index.php'>Try again</a>";
            }
        } else {
            // User not found display alert message
            echo "<script>alert('Invalid Username or Password');</script>";
        }
    }
}
?>
