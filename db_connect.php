


<?php
// Database connection parameters
$db_host = "localhost"; // database host name or IP address
$db_name = "votify"; // database name
$db_user = "root"; // database username
$db_pass = ""; // database password

try {
    // PDO instance
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handling database connection errors
    die("Database connection failed: " . $e->getMessage());
}
