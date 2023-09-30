<?php
$servername = "localhost";
$database = "votify";
$dbuser = "root";
$dbpwd = "";

// Create a connection to the database
$conn = mysqli_connect($servername, $dbuser, $dbpwd, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected to the database!";
}


?>

