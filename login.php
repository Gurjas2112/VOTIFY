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

    // Additional input validation to check for a valid username format
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $error_message = "Invalid username format. Please use only letters, numbers, and underscores.";
    } else {
        try {
            // PDO instance
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            // PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL statement to retrieve user information based on the username
            $stmt = $pdo->prepare("SELECT id, username, password, is_admin FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Fetching the user's information
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if a user with the provided username exists
            if ($user) {
                // Verifying the entered password against the stored hashed password
                if (password_verify($password, $user['password'])) {
                    // User is authenticated

                    // Store user data in the session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['is_admin'] = $user['is_admin'];

                    // Redirect to the appropriate dashboard
                    if ($_SESSION['is_admin'] == '1') {
                        // Redirect to the admin dashboard
                            header('Location: admin.php'); // Replace with the appropriate admin dashboard page
                    
                    } else {
                        // Redirect to the regular user dashboard
                        header('Location: profile_display.php'); // Replace with the appropriate user dashboard page
                    }
                    exit();
                } else {
                    // Invalid password
                    echo '<script>alert("Invalid password. Please try again."); 
                    window.location.href="homepage.php";
                    </script>';
                }
            } else {
                // Invalid username
                echo '<script>alert("Invalid username. Please try again."); 
                window.location.href="homepage.php";
                </script>';
            } 
        } catch (PDOException $e) {
            // Database connection or query error
            $error_message = "Database error: " . $e->getMessage();
        }
    }
}
?>
