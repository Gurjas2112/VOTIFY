<?php
// Include the database connection configuration
include 'db_connect.php'; // Replace with your actual database configuration file

// Initialize a session to manage user data
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user input
    $username = filter_input(INPUT_POST, 'login_u', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['login_p'];

    // Perform additional input validation to check for a valid username format
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $error_message = "Invalid username format. Please use only letters, numbers, and underscores.";
    } else {
        try {
            // Create a PDO instance
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare a SQL statement to retrieve user information based on the username
            $stmt = $pdo->prepare("SELECT id, username, password, is_admin FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Fetch the user's information
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if a user with the provided username exists
            if ($user) {
                // Verify the entered password against the stored hashed password
                if (password_verify($password, $user['password'])) {
                    // User is authenticated

                    // Store user data in the session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    // Check if the user is an administrator
                    if ($user['is_admin']) {
                        // Redirect to the admin dashboard or perform admin-specific actions
                        header('Location: admin.php'); // Replace with the appropriate admin dashboard page
                        exit();
                    } else {
                        // Redirect to the regular homepage or perform regular user-specific actions
                        header('Location: profile_display.php'); // Replace with the appropriate user dashboard page
                        exit();
                    }
                } else {
                    // Invalid password
                    $error_message = "Invalid password.";
                }
            } else {
                // Invalid username
                $error_message = "Invalid username.";
            }
        } catch (PDOException $e) {
            // Database connection or query error
            $error_message = "Database error: " . $e->getMessage();
        }
    }
}

// If the script reaches this point, it means the form hasn't been submitted yet or authentication failed.
?>
