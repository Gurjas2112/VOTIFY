<?php
require "db_user_dash.php"; // Include your database connection file
session_start();

$userID = $_SESSION['user_id'];
// Initialize variables to store user data
$name = $aadharCard = $phoneNumber = $dateOfBirth = $age = $Email = $address = $gender1 = $gender2 = $gender3 = $city = $state = $country = "";

$errors = []; // Array to store validation errors

// Fetch the user's data from the database
try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to fetch user data
    $sql = "SELECT * FROM users WHERE id = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();

    // Fetch the user's data
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_data) {
        // Assign user data to variables
        $name = $user_data['Name'];
        $aadharCard = $user_data['AadharCard'];
        $phoneNumber = $user_data['PhoneNumber'];
        $dateOfBirth = $user_data['DateOfBirth'];
        $age = $user_data['Age'];
        $Email = $user_data['email'];
        $address = $user_data['Address'];
        $gender1 = $user_data['Gender1'];
        $gender2 = $user_data['Gender2'];
        $gender3 = $user_data['Gender3'];
        $city = $user_data['City'];
        $state = $user_data['State'];
        $country = $user_data['Country'];
    }
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and store user input
    $name = $_POST['name'];
    $aadharCard = $_POST['aadhar_no'];
    $phoneNumber = $_POST['mobile_number'];
    $dateOfBirth = $_POST['dob'];
    $age = $_POST['age'];
    $Email = $_POST['Email'];
    $address = $_POST['address'];
    $gender1 = $_POST['gender'];
    // Check if gender2 and gender3 are set
    $gender2 = isset($_POST['gender2']) ? $_POST['gender2'] : '';
    $gender3 = isset($_POST['gender']) ? $_POST['gender'] : '';
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['nationality'];

    // Calculate the registration progress based on the number of fields filled
    $filledFields = count(array_filter([$name, $aadharCard, $phoneNumber, $dateOfBirth, $age, $Email, $address, $gender1, $gender2, $gender3, $city, $state, $country]));
    $registrationProgress = ($filledFields / 13) * 100;

    // Check if any of the fields are empty
    if (empty($name) || empty($aadharCard) || empty($phoneNumber) || empty($dateOfBirth) || empty($age) || empty($Email) || empty($address) || empty($city) || empty($state) || empty($country)) {
        $errors['empty_fields'] = "Please fill in all the fields.";
    } else {
        // Perform server-side validation
        if (empty($name)) {
            $errors['name'] = "Full Name is required";
        } elseif (!preg_match("/^[A-Z\s]+$/", $name)) {
            $errors['name'] = "Invalid characters in Full Name";
        }

        if (empty($aadharCard) || !preg_match("/^\d{12}$/", $aadharCard)) {
            $errors['aadhar_no'] = "Aadhar number should be 12 digits.";
        }

        if (empty($phoneNumber) || !preg_match("/^\+91\d{10}$/", $phoneNumber)) {
            $errors['mobile_number'] = "Mobile number should start with '+91' and be followed by 10 digits.";
        }

        if (empty($dateOfBirth)) {
            $errors['dob'] = "Date of Birth is required";
        }

        if (empty($Email) || !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $errors['Email'] = "Invalid Email format";
        }

        if (empty($address)) {
            $errors['address'] = "Address is required";
        }

        if (empty($city)) {
            $errors['city'] = "City is required";
        }

        // If gender is not selected, add an error message
        if (empty($gender1) && empty($gender2) && empty($gender3)) {
            $errors['gender'] = "Gender is required";
        }

        if (empty($state)) {
            $errors['state'] = "State is required";
        }

        if (empty($country)) {
            $errors['nationality'] = "Country is required";
        }
    }

    // Check if there are any validation errors
    if (count($errors) === 0) {
        try {
            // Create a PDO instance
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL query to update user data in the database, including the registration progress
            $sql = "UPDATE users SET 
                Name = :name, 
                AadharCard = :aadharCard, 
                PhoneNumber = :phoneNumber, 
                DateOfBirth = :dateOfBirth, 
                Age = :age, 
                Email = :Email, 
                Gender1 = :gender, 
                Gender2 = :gender, 
                Gender3 = :gender, 
                Address = :address, 
                City = :city, 
                State = :state, 
                Country = :country, 
                profile_progress = :profileProgress 
                WHERE id = $userID";

            // Prepare the SQL statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':aadharCard', $aadharCard);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':dateOfBirth', $dateOfBirth);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':gender', $gender1);
            $stmt->bindParam(':gender', $gender2);
            $stmt->bindParam(':gender', $gender3);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':profileProgress', $registrationProgress);

            // Execute the SQL statement
            if ($stmt->execute()) {
                echo "<h2>Registration Successful!</h2>";

                // Get the last inserted UserID
                $lastUserID = $pdo->lastInsertId();
                $_SESSION['lastUserID'] = $lastUserID;
                // Redirect to the next page after successful registration
                header("Location: dashboard-forms-elements2.php");
                exit; // Make sure to exit the script to prevent further execution
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            // Handle PDO exceptions
            echo "Error: " . $e->getMessage();
        }
    }
}
?>