<?php
session_start();

require 'db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'functions.php';
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

if (!empty($_POST['signup_email'])) {
    $email = $_POST['signup_email'];
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['signup_email'] = $email;
    $_SESSION['is_expired'] = $is_expired = false;
    $_SESSION['time_start'] = time();
    $_SESSION['time_end'] = $_SESSION['time_start'] + 60000; // OTP expires in 20 seconds

    // Check if the email exists using PDO
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Insert OTP into the database
        $query = "INSERT INTO otp_recovery (email, otp, is_expired) VALUES (:email, :otp, :is_expired)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':otp', $otp, PDO::PARAM_INT);
        $stmt->bindParam(':is_expired', $is_expired, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            // Send the email using the new function
            if (send_otp($email, $otp)) {
            } else {
                header("Location: otpForm1.php");
            }
        } else {
            echo "failed to insert OTP into the database";
        }
    } else {
        echo "Email does not exist";
    }
}
?>
