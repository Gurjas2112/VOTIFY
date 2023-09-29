<?php
// Include your database connection configuration here
$host = "localhost"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "state_city_db"; // Your database name

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a SQL statement to fetch all states
    $stmt = $pdo->prepare("SELECT * FROM states");
    $stmt->execute();

    // Fetch the states as an associative array
    $states = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the states as JSON
    echo json_encode($states);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
