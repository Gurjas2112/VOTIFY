<?php
// Include the database connection configuration
include 'db_connect.php'; // Replace with your actual database configuration file

// Initialize an empty error message
$error_message = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user input
    $username = filter_input(INPUT_POST, 'signup_u', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'signup_e', FILTER_SANITIZE_EMAIL);
    $password = $_POST['signup_p'];
    $confirm_password = $_POST['signup_c_p'];

    // Perform input validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        try {
            // Create a PDO instance
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if the username is already taken
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                $error_message = "Username is already taken.";
            } else {
                // Hash the password before storing it in the database
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user into the database
                $insert_stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $insert_stmt->bindParam(':username', $username);
                $insert_stmt->bindParam(':email', $email);
                $insert_stmt->bindParam(':password', $hashed_password);
                $insert_stmt->execute();

                // Redirect to the login page after successful registration
                //display the text message the you have successfully registered using inline css and javascript
                echo "<script type='text/javascript'>alert('You have successfully registered!');</script>";
                
                header('Location: homepage.php');
                exit();
            }
        } catch (PDOException $e) {
            // Database connection or query error
            $error_message = "Database error: " . $e->getMessage();
        }
    }
}
?>