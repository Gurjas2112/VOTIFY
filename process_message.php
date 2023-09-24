<?php
// Establish a database connection (replace these with your database credentials)

$pdo = new PDO("mysql:host=localhost;dbname=votify", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Handling incoming POST data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $userMessage = $data->userMessage;

    // Store the user's message
    if (!empty($userMessage)) {
        $userMessageStored = storeUserMessage($userMessage, $pdo);
        if (!$userMessageStored) {
            echo json_encode(array("error" => "Failed to store user message."));
            http_response_code(500);
            exit;
        }
    }

    // Your custom bot logic based on user input
    $botResponse = generateBotResponse($userMessage);

    // Store the bot's response
    $botResponseStored = storeBotResponse($botResponse, $pdo);
    if (!$botResponseStored) {
        echo json_encode(array("error" => "Failed to store bot response."));
        http_response_code(500);
        exit;
    }

    echo json_encode(array("botResponse" => $botResponse));
    http_response_code(200);
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(array("error" => "Invalid request."));
}

// Function to store the user's message in the database
function storeUserMessage($message, $pdo) {
    try {
        $stmt = $pdo->prepare("INSERT INTO user_messages (message) VALUES (:message)");
        $stmt->bindParam(":message", $message);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Function to store the bot's response in the database
function storeBotResponse($message, $pdo) {
    try {
        $stmt = $pdo->prepare("INSERT INTO bot_responses (message) VALUES (:message)");
        $stmt->bindParam(":message", $message);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Function to generate bot response based on user input
function generateBotResponse($userMessage) {
    // Normalize user input to lowercase for easier comparison
    $userMessage = strtolower($userMessage);

    // Check for keywords in the user's message and generate responses accordingly
    if (strpos($userMessage, "register") !== false) {
        return "Sure! To register for voting, please provide your personal information and required documents.";
    } elseif (strpos($userMessage, "upload documents") !== false) {
        return "To upload your documents, go to your dashboard and click on 'Document Upload.' Then, follow the on-screen instructions.";
    } elseif (strpos($userMessage, "update profile") !== false) {
        return "You can update your profile information in the 'Profile' section of your dashboard. What information would you like to update?";
    } elseif (strpos($userMessage, "voting process") !== false || strpos($userMessage, "voting FAQs") !== false) {
        // Provide information about the voting process or FAQs
        return "Certainly! Here are some common FAQs about the voting process...";
    } elseif (strpos($userMessage, "real-time data") !== false) {
        // Provide information about real-time voting data
        return "Yes, we provide real-time data and analytics on the dashboard. You can check the latest voting statistics there.";
    } elseif (strpos($userMessage, "help") !== false) {
        // Offer assistance for general inquiries
        return "Of course! Feel free to ask any questions or let me know how I can assist you further.";
    } elseif (strpos($userMessage, "logout") !== false) {
        // Handle logout request
        return "You have been successfully logged out. If you have any more questions in the future, don't hesitate to ask!";
    } else {
        // Default response for unrecognized queries
        return "I'm sorry, I couldn't understand your request. Please feel free to ask another question.";
    }
}
