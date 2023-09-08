<?php
// Retrieve the user message from the POST request
$userMessage = $_POST['message'];

// Execute the Python script and pass the user message as a command line argument
$botResponse = exec("python chat_bot.py \"$userMessage\"");

// Return the bot response to the user
echo $botResponse;
?>