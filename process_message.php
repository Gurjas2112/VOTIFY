<?php
// Get the user's message from the request
$input = json_decode(file_get_contents('php://input'), true);
$userMessage = strtolower($input['userMessage']);

// Define bot responses based on user input
$botResponses = array(
    'hi' => 'Hello there!',
    'hello' => 'Hi! How can I assist you today?',
    'identification documents' => 'Uploading your documents is easy. Here\'s how:
    1. Log in to your account.
    2. Navigate to your dashboard.
    3. Click on the "Document Upload" section.
    4. Follow the on-screen instructions to upload your identification documents.',
    'Voting process' => 'Certainly! Here\'s an overview of the voting process:
    1. Voter Registration: Ensure you are a registered voter by providing your details and necessary documents.
    2. Candidate Information: Access information about candidates and their platforms.
    3. Voting Day: On the election day, visit your polling station and cast your vote.
    4. Results: Stay tuned for the election results, which will be available on your dashboard.',
    'can i see real-time voting data?' => 'Yes, you can! We provide real-time data and analytics on your dashboard. You can check the latest voting statistics there.',
    'i need assistance with something else' => 'Of course! Feel free to ask any questions or let me know how I can assist you further.',
    'logout' => 'You have been successfully logged out. If you have any more questions in the future, don\'t hesitate to ask!',
    'what is this website?' => 'This website is Votify, an online platform for voter registration, candidate information, and real-time voting data. How can I assist you further?',
);

// Generate a bot response
$botResponse = isset($botResponses[$userMessage]) ? $botResponses[$userMessage] : "I'm sorry, I don't understand that yet.";

// Simulate some processing time (you can remove this in production)
usleep(500000); // Sleep for 0.5 seconds

// Return the bot response in JSON format
$response = array('botResponse' => $botResponse);
header('Content-Type: application/json');
echo json_encode($response);
?>
