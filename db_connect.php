


<?php
// Database connection parameters
$db_host = "localhost"; // Replace with your database host name or IP address
$db_name = "votify"; // Replace with your database name
$db_user = "root"; // Replace with your database username
$db_pass = ""; // Replace with your database password

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection errors
    die("Database connection failed: " . $e->getMessage());
}
