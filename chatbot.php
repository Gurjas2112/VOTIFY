<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votify";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"]; // Assuming you're sending a message via AJAX

    // Perform a simple database query
    $sql = "SELECT response FROM chatbot_responses WHERE keyword = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $message);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Check if there are results
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = $row["response"];
    } else {
        // If no matching keyword is found, provide a default response
        $response = "I'm sorry, I couldn't understand your request.";
    }
    
    // Close the prepared statement
    $stmt->close();
    
    // Send the response back to the client
    echo json_encode(["message" => $response]);

    // Close the database connection
    $conn->close();
}
?>
