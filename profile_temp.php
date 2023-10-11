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
        // Include your database connection file (replace with the correct details)
        include 'db_connect.php';

        // Start a session (place this at the top of your file)
        session_start();

        // Check if user data is available in session
        if (isset($_SESSION['user_data'])) {
            $userData = $_SESSION['user_data'];

            try {
                // Create a PDO instance (replace with your database details)
                $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

                // Set the PDO error mode to exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare a SQL statement to retrieve user data
                $stmt = $pdo->prepare("SELECT Name, Email, PhoneNumber, DateofBirth, Address FROM users WHERE id = :user_id");
                $stmt->bindParam(':user_id', $userData['id']);
                $stmt->execute();

                // Fetch user data
                $userProfile = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($userProfile) {
                    echo '<p><strong>Name:</strong> ' . $userProfile['Name'] . '</p>';
                    echo '<p><strong>Email:</strong> ' . $userProfile['Email'] . '</p>';
                    echo '<p><strong>Phone Number:</strong> ' . $userProfile['PhoneNumber'] . '</p>';
                    echo '<p><strong>Date of Birth:</strong> ' . $userProfile['DateofBirth'] . '</p>';
                    echo '<p><strong>Address:</strong> ' . $userProfile['Address'] . '</p>';
                } else {
                    echo '<p>User data not found.</p>';
                }
            } catch (PDOException $e) {
                // Handle database connection or query errors
                echo "Database error: " . $e->getMessage();
            }
        } else {
            echo '<p>User data not found.</p>';
        }
        ?>
    </div>
</body>
</html>
