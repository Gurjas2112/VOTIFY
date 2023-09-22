<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <?php
        // Start a session (place this at the top of your file)
        session_start();

        // Check if user data is available in session
        if (isset($_SESSION['user_data'])) {
            $userData = $_SESSION['user_data'];
            echo '<p><strong>Name:</strong> ' . $userData['Name'] . '</p>';
            echo '<p><strong>Email:</strong> ' . $userData['Email'] . '</p>';
            echo '<p><strong>Phone Number:</strong> ' . $userData['PhoneNumber'] . '</p>';
            echo '<p><strong>Date of Birth:</strong> ' . $userData['DateofBirth'] . '</p>';
            
            echo '<p><strong>Address:</strong> ' . $userData['Address'] . '</p>';
            
        } else {
            echo '<p>User data not found.</p>';
        }
        ?>
    </div>
</body>
</html>
