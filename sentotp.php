<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'db_connect.php';
require 'functions.php';
require 'vendor/autoload.php'; 
$mail = new PHPMailer(true);
"<script>
const otpForm = ../index.php#recovery;
</script>
";
if(!empty($_POST['email']))
{
    $email=$_POST['email'];
    $otp=rand(100000,999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;
    $_SESSION['is_expired'] = $is_expired = false;
    $_SESSION['time_start'] = time();
    $_SESSION['time_end'] = $_SESSION['time_start'] + 20; // OTP expires in 20 seconds  

    $query="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        $sql ="INSERT INTO otp_recovery(email,otp,is_expired) VALUES ('gurjasgandhi76@gmail.com','$otp','$is_expired')";
        if($conn->query($sql) !== TRUE) {
        echo "Error storing OTP in database";
        $conn->close();
        exit();
        }
        $query="SELECT * FROM otp_recovery WHERE email='$email'";
        $query="UPDATE otp_recovery SET otp='$otp' WHERE email='$email'";
        $result=mysqli_query($conn,$query);  
        if($result)
        {
            // Function to send OTP to the email
            send_otp($email,$otp);
            echo "success";
        }
        else
        {
            echo "failed";
        }
        
    $conn->close();
    }
    else
    {
        echo "Email does not exist";
    }
}
 
?> 

