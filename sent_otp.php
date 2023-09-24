<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'db_connect.php';
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
    $_SESSION['time_end'] = $_SESSION['time_start'] + 20; // OTP expires in 20 seconds

    // Check if the email exists using PDO
    $query = "SELECT * FROM users WHERE email=:email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        // Insert OTP into the database
        $query = "INSERT INTO otp_recovery (email, otp, is_expired) VALUES (:email, :otp, :is_expired)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':otp', $otp, PDO::PARAM_INT);
        $stmt->bindParam(':is_expired', $is_expired, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            // Function to send OTP to the email
            send_otp($email, $otp);
            echo "success";
        } else {
            echo "failed to insert OTP into the database";
        }
    } else {
        echo "Email does not exist";
    }
}
?>

