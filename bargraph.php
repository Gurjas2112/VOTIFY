<?php
// Include JpGraph library files
require_once('jpgraph-4.4.2/jpgraph-4.4.2/src/jpgraph.php');
require_once('jpgraph-4.4.2/jpgraph-4.4.2/src/jpgraph_bar.php');

try {
    // Database connection code using PDO
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "votify";

    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the database
    $sql = "SELECT FLOOR(Age / 10) * 10 AS AgeRange, COUNT(*) AS UserCount 
            FROM users 
            WHERE Age >= 18 AND Age <= 88 AND is_admin = 0 
            GROUP BY AgeRange 
            ORDER BY AgeRange";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $data = array();
    $labels = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row['UserCount'];
        $labels[] = $row['AgeRange'] . '-' . ($row['AgeRange'] + 9);
    }

    // Create a new graph object
    $graph = new Graph(800, 400);
    $graph->SetScale("textlin");

    // Create a bar plot with the retrieved data
    $barplot = new BarPlot($data);

    // Set the labels for X-axis
    $graph->xaxis->SetTickLabels($labels);
    $graph->xaxis->SetTextLabelInterval(1); // Show every label

    // Add the bar plot to the graph
    $graph->Add($barplot);

    // Set graph title and axis labels
    $graph->title->Set("Number of Users in Age Ranges");
    $graph->xaxis->title->Set("Age Ranges");
    $graph->yaxis->title->Set("Number of Users");

    // Send the appropriate headers and display the graph
    header("Content-type: image/png");
    $graph->Stroke();

} catch(PDOException $e) {
    // Log the error instead of displaying it to the user for security reasons
    error_log("Connection failed: " . $e->getMessage());
    // Optionally, you can display a generic error message to the user
    echo "An error occurred while generating the graph.";
}
?>