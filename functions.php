<?php

// Import the necessary classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer library
require 'vendor/autoload.php';

// Function to send OTP to the email
function send_otp($email, $otp)
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    try {
        // Enable SMTP debugging
        $mail->SMTPDebug = 2;
        // Set mailer to use SMTP
        $mail->isSMTP();
        // Specify main and backup SMTP servers
        $mail->Host = 'smtp.gmail.com';
        // Enable SMTP authentication
        $mail->SMTPAuth = true;
        // SMTP username
        $mail->Username = 'gurjasgandhi76@gmail.com';
        // SMTP password
        $mail->Password = 'upddehiveybylvvr';
        // Enable TLS encryption
        $mail->SMTPSecure = 'ssl';
        // TCP port to connect to
        $mail->Port = 465;

        // Set the sender and recipient email addresses
        $mail->setFrom('gurjasgandhi76@gmail.com', 'Votify');
        $mail->addAddress($email);

        // Set email format to HTML
        $mail->isHTML(true);
        // Set the email subject and body
        $mail->Subject = 'Votify - Password Recovery';
        $mail->Body = 'Your OTP is ' . $otp;
        // Send the email
        $mail->send();
        // Print a success message
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        // Print an error message if the email could not be sent
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to delete OTP from database
function delete_otp($email)
{
    // Include the database connection file
    require "db_connect.php";

    // Construct the SQL query to delete the OTP for the specified email
    $query = "DELETE FROM otp_recovery WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    // Execute the query
    if ($stmt->execute()) {
        return 1;
    } else {
        return 0;
    }
}

// Function to verify OTP
function verify_otp($email, $otp)
{
    // Include the database connection file
    require "db_connect.php";

    // Construct the SQL query to check if the OTP is valid for the specified email
    $query = "SELECT * FROM otp_recovery WHERE email = :email AND otp = :otp AND is_expired != 1 AND NOW() <= DATE_ADD(created_at, INTERVAL 20 SECOND)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':otp', $otp, PDO::PARAM_STR);

    // Execute the query
    if ($stmt->execute()) {
        // Get the number of rows returned by the query
        $count = $stmt->rowCount();
        // If the OTP is valid, mark it as expired and return 1, otherwise return 0
        if ($count > 0) {
            $query = "UPDATE otp_recovery SET is_expired = 1 WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}
?>
