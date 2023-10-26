<?php
// Database connection configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'votify';

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Query to retrieve election data including candidate images
$query = '
    SELECT e.election_name, e.election_date, c.name AS candidate_name, pl.location_name, c.image AS candidate_image
    FROM Elections AS e
    JOIN ElectionCandidates AS ec ON e.election_id = ec.election_id
    JOIN Candidates AS c ON ec.candidate_id = c.candidate_id
    JOIN ElectionLocations AS el ON e.election_id = el.election_id
    JOIN PollingLocations AS pl ON el.location_id = pl.location_id
';

// Execute the query
$result = $mysqli->query($query);

// Check if the query was successful
if (!$result) {
    die('Error in query: ' . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Information Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/election_info.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
    <h1>Election Information Page</h1>
    <table>
        <tr>
            <th>Election Name</th>
            <th>Election Date</th>
            <th>Candidate Name</th>
            <th>Candidate Image</th>
            <th>Polling Location</th>
        </tr>
        <?php
        // Display election data in the table
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['election_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['election_date']) . '</td>';
            echo '<td>' . htmlspecialchars($row['candidate_name']) . '</td>';
            echo '<td><img src="' . htmlspecialchars($row['candidate_image']) . '" alt="Candidate Image" width="100"></td>';
            echo '<td>' . htmlspecialchars($row['location_name']) . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <a class="back-link" href="homepage.php">Back to homepage</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$mysqli->close();
?>
