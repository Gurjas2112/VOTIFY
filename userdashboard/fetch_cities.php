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

    // Check if state_id is provided in the URL
    if (isset($_GET['state_id'])) {
        $state_id = $_GET['state_id'];

        // Prepare a SQL statement to fetch cities based on state_id
        $stmt = $pdo->prepare("SELECT * FROM cities WHERE state_id = :state_id");
        $stmt->bindParam(':state_id', $state_id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the cities as an associative array
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the cities as JSON
        echo json_encode($cities);
    } else {
        echo json_encode(array()); // Return an empty array if state_id is not provided
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
