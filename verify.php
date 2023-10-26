<?php
session_start();

require 'db_connect.php'; // Assuming this file contains your PDO database connection
require 'functions.php';
require 'vendor/autoload.php';

// Accept OTP from user
if (!empty($_POST['otp'])) {
    $otp = $_POST['otp'];
    $email = $_SESSION['signup_email'];
    $isExpired = $_SESSION['is_expired'];
    $expiry = $_SESSION['time_end'];
    $timeStart = $_SESSION['time_start'];
    $timeEnd = $_SESSION['time_end'];
    $timeNow = time();
    $timeLeft = $timeEnd - $timeNow;
    $timeLeft = floor($timeLeft % 60);

    if ($isExpired) {
        echo "OTP expired";
        exit();
    } else {
        if ($timeNow > $timeEnd) {
            $_SESSION['is_expired'] = true;
            $sql = "DELETE FROM otp_recovery WHERE email=:email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            echo "OTP expired";
            exit();
        } else {
            $query = "SELECT * FROM otp_recovery WHERE email=:email AND otp=:otp AND is_expired!=1 AND NOW() <= DATE_ADD(created_at, INTERVAL 20 SECOND)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':otp', $otp, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count > 0) {
                $query = "UPDATE otp_recovery SET is_expired = 1 WHERE email = :email";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: otpForm2.php");
                exit();
            } else {
                echo "Invalid OTP";
                exit();
            }
        }
    }
}
?>
