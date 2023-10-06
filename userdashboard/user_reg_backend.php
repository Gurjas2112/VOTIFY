<?php
require "db_user_dash.php"; // Include your database connection file
session_start();

// Initialize variables to store user data
$lastUserID = $name = $aadharCard = $phoneNumber = $dateOfBirth= $Email = $address = $gender = $city = $state = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and store user input, and perform basic validation if needed
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $aadharCard = mysqli_real_escape_string($conn, $_POST['aadhar_no']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['inputDate']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $country = mysqli_real_escape_string($conn, $_POST['nationality']);
    
    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (Name, AadharCard, PhoneNumber, DateofBirth, Email, Gender, Address, City, State, Country) 
            VALUES ('$name', '$aadharCard', '$phoneNumber', '$dateOfBirth', '$Email', '$gender', '$address', '$city', '$state', '$country')";

    if (mysqli_query($conn, $sql)) {
         $flag1 = true;
        echo "<h2>Registration Successful!</h2>";

        // SQL query to get the last inserted UserID
        $SQL = "SELECT max(UserID) FROM users";
        if ($result = mysqli_query($conn, $SQL)) {
            $row = mysqli_fetch_array($result);
            $lastUserID = $row['max(UserID)'];
            $_SESSION['lastUserID'] = $lastUserID;
            echo "<h2>Your User ID is: $lastUserID</h2>";
            if($flag1 == true){
                header("Location: fileupload_frontend.php"); // Replace "forms_2.html" with the actual path to your next page
                exit;} // Make sure to exit the script to prevent further execution
            
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
    

?>
