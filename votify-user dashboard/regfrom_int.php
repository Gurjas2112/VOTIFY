<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
</head>
<body>
<div class="container">
    <?php
    require "db_user_dash.php";
    session_start();

    // Initialize variables to store user data
    $name = $email = $phoneNumber = $dateOfBirth = $address = $gender = $city = $state = $country = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and store user input
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $phoneNumber = $_POST['PhoneNumber'];
        $dateOfBirth = $_POST['DateofBirth'];
        $address = $_POST['Address'];
        $gender = $_POST['Gender'];
        $city = $_POST['City'];
        $state = $_POST['State'];
        $country = $_POST['Country'];

        // SQL query to insert user data into the database
        $sql = "INSERT INTO users (Name, Email, PhoneNumber, DateofBirth, Gender, Address, City, State, Country)
                VALUES ('$name', '$email', '$phoneNumber', '$dateOfBirth', '$gender', '$address', '$city', '$state', '$country')";

        if (mysqli_query($conn, $sql)) {
            echo "<h2>Registration Successful!</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>
     
     

    <form action="" method="POST">
        <div class="title">
            Registration Form
        </div>
        <br><br>
        <div class="form">
            <div class="input_field">
                <label>Name</label>
                <input type="text" class="input" name="Name" required>
            </div>
            <br><br>
            <div class="input_field">
                <label>Email</label>
                <input type="email" class="input" name="Email" required>
            </div>
            <br><br>
            <div class="input_field">
                <label>Phone Number</label>
                <input type="tel" class="input" name="PhoneNumber" required>
            </div>
            <br><br>
            <div class="input_field">
                <label>Date of Birth</label>
                <input type="date" class="input" name="DateofBirth" required>
            </div>
            <br><br>
            <div class="input_field">
                <label>Address</label>
                <textarea name="Address" required></textarea>
            </div>
            <br><br>
            <div class="input_field">
                <label>Gender</label>
                <select name="Gender">
                    <option value="Not Selected">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <br><br>
            <div class="input_field">
                <label>City</label>
                <input type="text" class="input" name="City" required>
            </div>
            <br><br>
            <div class="input_field">
                <label>State</label>
                <select name="State">
                    <option value="Select">Select</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Bihar">Bihar</option>
                    <option> Goa </option>
                <option> Karnataka </option>
                <option> Maharshtra</option>
                <option> Arunachal Pradesh </option>
                <option> Haryana </option>
                <option> Gujarat </option>
                <option> Himachal Pradesh </option>
                <option> Assam </option>
                <option> Manipur </option>
                <option> Kerela</option>
                <option> Chattisgrah </option>
                <option> Punjab </option>
                <option> Tripura </option>
                <option> Mizoram </option>
                <option> West Bengal </option>
                <option> Jharkhand </option>
                <option> Tamil Nadu </option>
                <option> Madhya Pradesh </option>
                <option> Sikkim </option>
                <option> Rajasthan </option>
                <option> Uttar Pradesh </option>
                <option> Odhisha </option>
                <option> Nagaland </option>
                <option> Jammu Kashmir </option>
                <option> Meghalaya </option>
                <option> Uttarakhand</option>
                <option> Telangana </option>
                </select>
            </div>
            <br><br>
            <div class="input_field">
                <label>Country</label>
                <input type="text" class="input" name="Country" required>
            </div>
            <br><br>
            <div class="input_field">
                <input type="submit" value="Register" class="btn">
            </div>
        </div>
    </form>
</div>
</body>
</html>
