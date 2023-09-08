
<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "votify";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle user input
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_message"])) {
    $userMessage = $_POST["user_message"];

    // Insert the user's message into the database
    $sql = "INSERT INTO chat_messages (message) VALUES ('$userMessage')";
    if (mysqli_query($conn, $sql)) {
        // Message inserted successfully
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // You can call your Python script here to get the chatbot's response
    // Replace 'python_script.py' with the actual path to your Python script
    $pythonResponse = shell_exec("python python_code/chat_bot.py \"$userMessage\"");
}
?>