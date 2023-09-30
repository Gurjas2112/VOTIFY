

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Profile</title>
</head>
<body>s
    <h1>User Profile</h1>

    <?php
    // Include the database connection file
    include 'db_user_dash.php';

    // Use prepared statements to prevent SQL injection
    $query1 = "SELECT MAX(UserID) as MaxUserID from users";
    $stmt1 = $conn->prepare($query1);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
        // Fetch the user data
        $userData1 = $result1->fetch_assoc();

        // Store user data in variables
        $userID1 = $userData1['MaxUserID'];
       

        $query = "SELECT Name, Address, Email, photodoc,PhoneNumber from users where UserID=$userID1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        $userName = $userData['Name'];
        $userPhone = $userData['PhoneNumber'];
        $userAddress = $userData['Address'];
        $userEmail = $userData['Email'];
        $userProfileImage = trim($userData['photodoc']);
       
    } else {
        echo "User not found.";
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();

    //require "users-profile.php";
   ?>
</body>
</html>
