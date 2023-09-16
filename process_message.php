<?php
// Establish a database connection (replace these with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votify";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming $userMessage contains the user's message
$userMessage = $_POST['message'];

// Generate a bot response
$botResponse = generateBotResponse($userMessage);

// Insert user message into the chat_history table
$sqlUser = "INSERT INTO chat_history (user_message) VALUES ('$userMessage')";
if ($conn->query($sqlUser) === TRUE) {
    echo "User message inserted successfully<br>";
} else {
    echo "Error: " . $sqlUser . "<br>" . $conn->error;
}

// Insert bot message into the chat_history table
$sqlBot = "INSERT INTO chat_history (bot_message) VALUES ('$botResponse')";
if ($conn->query($sqlBot) === TRUE) {
    echo "Bot message inserted successfully<br>";
} else {
    echo "Error: " . $sqlBot . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

// Function to generate a bot response (replace with your actual logic)
function generateBotResponse($userMessage) {
    // Your bot response generation logic here
    // Example bot responses:
    $responses = array(
        "Hello!",
        "How can I assist you today?",
        "I'm here to help.",
        "Tell me more about what you need.",
        "Sorry, I didn't quite get that. Can you please rephrase?"
    );

    // Select a random response
    $botResponse = $responses[array_rand($responses)];

    return $botResponse;
}
?>
