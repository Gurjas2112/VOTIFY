<?php
session_start();
require 'db_connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'functions.php'; // Include your other necessary functions file
require 'vendor/autoload.php'; // Include any necessary vendor/autoload file

if(!empty($_POST['login_password']) && !empty($_POST['confirm_password'])) {
    $password = $_POST['login_password'];
    $cpassword = $_POST['confirm_password'];
    $email = $_SESSION['signup_email'];

    $is_expired = $_SESSION['is_expired'];
    $expiry = $_SESSION['time_end'];
    $time_start = $_SESSION['time_start'];
    $time_end = $_SESSION['time_end'];
    $time_now = time();

    if ($is_expired) {
        echo "OTP expired";
        exit();
    } else {
        if ($time_now > $time_end) {
            $_SESSION['is_expired'] = true;
            $sql = "DELETE FROM otp_recovery WHERE email=:email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            echo "OTP expired";
            exit();
        } else {
            $query = "SELECT * FROM otp_recovery WHERE email=:email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count > 0) {
                if ($password == $cpassword) {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $updateQuery = "UPDATE users SET password=:password WHERE email=:email";
                    $updateStmt = $conn->prepare($updateQuery);
                    $updateStmt->bindParam(':password', $hashed_password);
                    $updateStmt->bindParam(':email', $email);
                    $updateResult = $updateStmt->execute();
                    header("Location: homepage.php");

                } else {
                    echo "Passwords do not match";
                    exit();
                }
            } else {
                echo "Invalid OTP";
                exit();
            }
        }
    }
}
?>
