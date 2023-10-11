<?php
$db_host = "localhost"; // Your database host (usually "localhost")
$db_name = "votify"; // Your database name
$db_user = "root"; // Your database username
$db_pass = ""; // Your database password (leave it empty if there's no password)

try {
    // Create a PDO connection to the database
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If the connection is successful, you can perform database operations using $pdo
    echo "Connected to the database!";
} catch (PDOException $e) {
    // If there is an error in connecting to the database, PDO will throw an exception
    echo "Connection failed: " . $e->getMessage();
}
?>
