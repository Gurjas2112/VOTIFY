<?php
// Include database connection and composer autoload
include 'db_connect.php';
require_once 'vendor/autoload.php';

// Start session and fetch user ID from session variable
session_start();
$userID = $_SESSION['user_id'];


try {
    // Establish database connection
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch user data from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$userID]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $states = $_SESSION['state'] = $user['State'];
    $sql = $pdo->prepare("SELECT name FROM states WHERE id = $states");
    // Retrieve the state name from the database
    $sql->execute();
    $state = $sql->fetch(PDO::FETCH_ASSOC);
    $stateName = $state['name'];
    $cities = $_SESSION['city'] = $user['City'];
    $sql1 = $pdo->prepare("SELECT name FROM cities WHERE id = $cities");
    // Retrieve the city name from the database
    $sql1->execute();
    $city = $sql1->fetch(PDO::FETCH_ASSOC);
    $cityName = $city['name'];
    $gender1 = $_SESSION['Gender'] = $user['Gender1'];
    $sql2 = $pdo->prepare("SELECT Gender1 FROM users WHERE id = $userID");
    $sql2->execute();
    $gender = $sql2->fetch(PDO::FETCH_ASSOC);
    $gender2 = $_SESSION['Gender'] = $user['Gender2'];
    $sql3 = $pdo->prepare("SELECT Gender2 FROM users WHERE id = $userID");
    $sql3->execute();
    $gender = $sql3->fetch(PDO::FETCH_ASSOC);
    $gender3 = $_SESSION['Gender'] = $user['Gender3'];
    $sql4 = $pdo->prepare("SELECT Gender3 FROM users WHERE id = $userID");
    $sql4->execute();
    $gender = $sql4->fetch(PDO::FETCH_ASSOC);
    $selectedGender = '';
    if ($gender1) {
        $selectedGender = $gender1;
    } elseif ($gender2) {
        $selectedGender = $gender2;
    } elseif ($gender3) {
        $selectedGender = $gender3;
    }


    // Close the database connection
    unset($pdo);

    // Create a new mPDF document
    $mpdf = new \Mpdf\Mpdf();

    // HTML content to be added to the PDF
    $html = '
    <html>
    <head>

    </head>

    <table width="100%" style="border-collapse: collapse;">
        <tr>
            <td style="width: 50%; text-align: left;">
                <!-- Left-aligned image -->
                <img src="img/logo1.jpg" alt="VOTIFY Logo" height="100px" style="box-sizing: border-box;">
            </td>
            <td colspan="2">
                <!-- Center-aligned VOTIFY heading -->
                <center><h1>VOTIFY</h1></center>
                <hr>
            </td>
            <td style="width: 50%; text-align: right;">
                <!-- Right-aligned image -->
                <img src="img/logo1.jpg" alt="VOTIFY Logo" height="100px" style="box-sizing: border-box;">
            </td>
        </tr>
    </table>
    <!-- Application Form heading inside break line-->
    <div class="nine">
       <hr> <center><h2 style = "text-align:center;">Application Form</h2></center>
        <hr>
      </div><br>
      <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
      <tr>
        <td><strong>Application ID:</strong></td>
        <td>VOT00' . htmlspecialchars($user['id']) .
        '</td>
      <tr>
          <td><strong>Name:</strong></td>
          <td>' . htmlspecialchars($user['Name']) . '</td>
      </tr>
      <tr>
          <td><strong>Date of Birth:</strong></td>
          <td>' . htmlspecialchars($user['DateOfBirth']) . '</td>
      </tr>
      <tr>
            <td><strong>Gender:</strong></td>
            <td>' . htmlspecialchars($selectedGender) . '</td>
        </tr>
      <tr>
        <td><strong>Age:</strong></td>
        <td>' . htmlspecialchars($user['Age']) . '</td>
        </tr>
      <tr>
          <td><strong>Aadhar Card Number:</strong></td>
          <td>' . htmlspecialchars($user['AadharCard']) . '</td>
      </tr>
      <tr>
          <td><strong>Phone Number:</strong></td>
          <td>' . htmlspecialchars($user['PhoneNumber']) . '</td>
      </tr>
      <tr>
          <td><strong>Email Address:</strong></td>
          <td>' . htmlspecialchars($user['email']) . '</td>
      </tr>
      <tr>
          <td><strong>Address:</strong></td>
          <td>' . htmlspecialchars($user['Address']) . '</td>
      </tr>
      <tr>
          <td><strong>City:</strong></td>
          <td>' . htmlspecialchars($cityName) . '</td>
      </tr>
      <tr>
            <td><strong>State:</strong></td>
            <td>' . htmlspecialchars($stateName) . '</td>
      <tr>
          <td><strong>Nationality:</strong></td>
          <td>' . htmlspecialchars($user['Country']) . '</td>
      </tr>
      <tr>
            <td><strong>Photo:</strong></td>
            <td><img src="' . htmlspecialchars($user['photodoc']) . '" alt="Uploaded Photo" height = "80px" width="100px"></td>
      </tr>
      <tr>
            <td><strong>Aadhaar Card:</strong></td>
            <td><img src="' . htmlspecialchars($user['adhardoc']) . '" alt="Uploaded Aadhaar" height = "80px" width="100px"></td>
    </tr>
  </table>
  <!-- include date and time at the bottom of the page -->
    <div class="date" style = "text-align:right">
        <p>Date: ' . date("d-m-Y"). '</p>
    <footer>
        <p style = "text-align:center;position:absolute;bottom:10">@Copyright Votify 2023- All Right Reserved.</p>
    </footer>
</html>';


    // Write HTML content to the PDF
    $mpdf->WriteHTML($html);

    // Output PDF file directly to the browser
    $mpdf->Output('application_form.pdf', 'D');
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
} catch (\Mpdf\MpdfException $e) {
    // Handle mPDF errors
    echo "Error: " . $e->getMessage();
} catch (Exception $e) {
    // Handle other generic errors
    echo "Error: " . $e->getMessage();
}
?>
