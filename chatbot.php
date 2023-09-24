<?php
// Replace these variables with your actual database credentials
$host = 'localhost';
$database = 'votify';
$username = 'root';
$password = '';

// Sample bot responses
$sampleResponses = [
    "Hello! How can I assist you today?",
    "I'm here to help. What can I do for you?",
    "Great to see you! What's on your mind?",
    "Ask me anything, and I'll do my best to assist you.",
    "Hi there! How may I be of service?"
];

try {
    // Create a PDO database connection
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle the user's message received via POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve user's message from the POST data
        $requestData = json_decode(file_get_contents('php://input'), true);
        $userMessage = $requestData['userMessage'];

        // Process the user's message (you can replace this with your own logic)
        $botResponse = "This is the bot's response to: " . $userMessage;

        // Insert user's message and bot's response into the chat_history table
        $insertQuery = "INSERT INTO chat_history (user_message, bot_response) VALUES (:userMessage, :botResponse)";
        $stmt = $pdo->prepare($insertQuery);

        // Bind parameters and execute the query
        $stmt->bindParam(':userMessage', $userMessage);
        $stmt->bindParam(':botResponse', $botResponse);
        
        if ($stmt->execute()) {
            // Data inserted successfully
            $response = array(
                'response' => $botResponse
            );

            // Send the response as JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Handle database insertion error
            $response = array(
                'error' => 'Database error: ' . $stmt->errorInfo()[2]
            );

            // Send the error response as JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        // Handle other types of requests or errors
        http_response_code(405); // Method Not Allowed
        echo "Invalid request method.";
    }

    // Insert sample bot responses into the sample_bot_responses table
    $insertSampleResponseQuery = "INSERT INTO sample_bot_responses (response_text) VALUES (:responseText)";
    $stmtSampleResponse = $pdo->prepare($insertSampleResponseQuery);

    foreach ($sampleResponses as $responseText) {
        $stmtSampleResponse->bindParam(':responseText', $responseText);
        $stmtSampleResponse->execute();
    }

    // Echo a success message for sample bot responses
    echo "Sample bot responses inserted successfully.";

} catch (PDOException $e) {
    // Handle database connection error
    $response = array(
        'error' => 'Database connection error: ' . $e->getMessage()
    );

    // Send the error response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
