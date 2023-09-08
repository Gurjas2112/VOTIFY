<?php
session_start();

require 'db_connect.php';
require 'functions.php';
require 'vendor/autoload.php';

// Accept passwords from user
if(!empty($_POST['login_password']) && !empty($_POST['confirm_password']))
{
    $password=$_POST['password'];
    $cpassword=$_POST['confirm_password'];
    $email=$_SESSION['signup_email'];
    $is_expired=$_SESSION['is_expired'];
    $expiry=$_SESSION['time_end'];
    $time_start=$_SESSION['time_start'];
    $time_end=$_SESSION['time_end'];
    $time_now=time();
    $time_left=$time_end-$time_now;
    $time_left=floor($time_left%60);
    if($is_expired)
    {
        echo "OTP expired";
        exit();
    }
    else
    {
        if($time_now > $time_end)
        {
            $_SESSION['is_expired'] = true;
            $sql = "DELETE FROM otp_recovery WHERE email='$email'";
            echo "OTP expired";
            exit();
        }
        else
        {
            $query="SELECT * FROM otp_recovery WHERE email='$email' AND is_expired!=1 AND NOW() <= DATE_ADD(created_at, INTERVAL 20 SECOND)";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
            if($count>0)
            {
                if($password==$cpassword)
                {
                    $query="UPDATE users SET password='$password' WHERE email='$email'";
                    $result=mysqli_query($conn,$query);
                    if($result)
                    {
                        $query="UPDATE otp_recovery SET is_expired = 1 WHERE email = '$email'";
                        $result=mysqli_query($conn,$query);
                        echo "success";
                        exit();
                    }
                    else
                    {
                        echo "failed";
                        exit();
                    }
                }
                else
                {
                    echo "Passwords do not match";
                    exit();
                }
            }
            else
            {
                echo "Invalid OTP";
                exit();
            }
        }
    }
}
?>