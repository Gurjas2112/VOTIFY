<?php
// Include JpGraph library files
require_once('jpgraph-4.4.2/jpgraph-4.4.2/src/jpgraph.php');
require_once('jpgraph-4.4.2/jpgraph-4.4.2/src/jpgraph_pie.php');

// Database connection code goes here (PDO version)
$servername = "localhost";
$username = "root";
$password = "";
$database = "votify";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Retrieve data from the database using PDO
$sql = "SELECT COUNT(*) as count, RegistrationStatus FROM users WHERE is_admin = 0 GROUP BY RegistrationStatus";
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = array();
$labels = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row['count'];
    $labels[] = $row['RegistrationStatus'];
}

// Create a new pie chart object
$graph = new PieGraph(265, 265);

// Create a pie plot with the retrieved data
$pieplot = new PiePlot($data);

// Set the pie plot labels
$pieplot->SetLegends($labels);

// Set custom colors for the pie chart sections
$customColors = array('royalblue', 'skyblue');
$pieplot->SetSliceColors($customColors);

// Add the pie plot to the graph
$graph->Add($pieplot);

// Set graph title
$graph->title->Set("Registration Status");

// Send the appropriate headers and display the graph
header("Content-type: image/png");

// Reduce margins specifically for PNG output
$graph->SetMargin(5, 5, 5, 5);

$graph->Stroke();
?>
