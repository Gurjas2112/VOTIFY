<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include the PHPMailer autoloader

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server address
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gurjasgandhi76@gmail.com'; // SMTP username
        $mail->Password   = 'upddehiveybylvvr'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $fullName); // Sender's email and name
        $mail->addAddress('gurjasgandhi76@gmail.com'); // Recipient's email address

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "Full Name: $fullName<br>Email: $email<br>Message: $message";

        $mail->send();
        // echo script alert "Message has been sent!";
        echo "<script>alert('Message has been sent!')</script>";
        echo "<script>window.location.href='homepage.php';</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
