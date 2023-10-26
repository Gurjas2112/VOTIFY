
<?php
// Include the database configuration file
include 'db_connect.php';

// Include the mpdf library
require 'vendor/autoload.php';

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_info = []; // Initialize an array to store user data
    $registration_submitted = true;
    $pdf_generated = true;
    
    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Prepare a SQL statement to retrieve user information based on the user's ID
        $stmt = $pdo->prepare("SELECT username, email,Name,AadharCard,PhoneNumber,DateOfBirth,Age,Address,Gender1,Gender2,Gender3,City,State,Country, profile_pic,RegistrationStatus,adhardoc,photodoc FROM users WHERE id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    
        // Fetch the user's information
        $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Database connection or query error
        // Handle the error appropriately (e.g., display an error message)
        echo "Database error: " . $e->getMessage();
    }
    
    // Assuming your database connection is established in db_connect.php, you can use it like this:
    include 'db_connect.php'; // Include the database connection file
    $pdo = new PDO("mysql:host=localhost;dbname=votify", "root", ""); // Replace with your database details

    // Function to generate a PDF and save the file path in the database
    function generatePDF($user_id, $pdo) {
        // Create an instance of the mPDF class
        $mpdf = new \Mpdf\Mpdf();

        // Your code to fetch registration details from the database and format them in HTML
        $registration_submitted = true; // You need to implement this logic

        // Check if the user has generated the PDF
        $pdf_generated = true; // You need to implement this logic

        // Handle form submission to close registration forms and generate PDF
        if (isset($_POST['close_registration_forms'])) {
            if ($registration_submitted && $pdf_generated) {
                // Add logic to close registration forms for the user in the database
                if (function_exists('closeRegistrationForms') && closeRegistrationForms($user_id, $pdo)) {
                    // Registration forms closed successfully
                    header('Location: acknowledge_page.php');
                    exit();
                } else {
                    // Error occurred while closing forms
                    $error_message = "Error: Unable to close registration forms.";
                }
            }
        }

        // Add logic to generate a PDF of the registration details
        if (isset($_POST['generate_pdf'])) {
            if ($registration_submitted) {
                // Generate the PDF and provide a download link
                if (function_exists('generatePDF')) {
                    $pdf_path = generatePDF($user_id, $pdo);
                    if ($pdf_path) {
                        // PDF generated successfully
                        $pdf_generated = true;
                    } else {
                        // Error occurred while generating PDF
                        $error_message = "Error: Unable to generate PDF.";
                    }
                } else {
                    // Function not found
                    $error_message = "Error: Function generatePDF not found.";
                }
            }
        }

        // Function to fetch user registration details from the database
        function fetchRegistrationDetails($user_id, $pdo) {
            $sql = "SELECT * FROM users WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['user_id' => $user_id]);

            if ($stmt && $stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } else {
                return false; // User not found in the database
            }
        }

        // Get the user's registration details
        $userDetails = fetchRegistrationDetails($user_id, $pdo);

        if ($userDetails) {
            // Format the registration details as HTML
            $html = '<h1>Registration Details</h1>';
            $html .= '<p>User Name: ' . $userDetails['username'] . '</p>';
            $html .= '<p>Email: ' . $userDetails['email'] . '</p>';
            // Add more details as needed

            // Display the HTML
            echo $html;
        } else {
            // User not found or error occurred
            echo 'Error: Unable to fetch registration details.';
        }

        // Generate the PDF content
        $pdfContent = '<h1>Registration Details</h1>';
        $pdfContent .= '<p>User Name: John Doe</p>'; // Replace with actual user details

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($pdfContent);

        // Save the PDF file to a directory
        $pdfFilePath = 'pdfs/registration_details_' . $user_id . '.pdf';
        $mpdf->Output($pdfFilePath, \Mpdf\Output\Destination::FILE);

        // Save the PDF file path in the database for the user (you need to implement this logic)

        return $pdfFilePath;
    }

    // Handle form submission to generate PDF
    if (isset($_POST['generate_pdf'])) {
        if ($registration_submitted) {
            // Generate the PDF and save the file path in the database
            $pdf_path = generatePDF($user_id, $pdo);
            if ($pdf_path) {
                // PDF generated successfully
                $pdf_generated = true;
            } else {
                // Error occurred while generating PDF
                $error_message = "Error: Unable to generate the PDF.";
            }
        }
    }

    // closeRegistrationForms() function
    function closeRegistrationForms($user_id, $pdo) {
        // Add logic to close registration forms for the user in the database
        return true;
    }
} else {
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profile-Votify</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="votify-user dashboard/assets/img/favicon.png" rel="icon">
  <link href="votify-user dashboard/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="votify-user dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="votify-user dashboard/assets/css/index.css" rel="stylesheet">

    
</head>
<body>
    
      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="dashboard-mainpage.php" class="logo d-flex align-items-center">
    <img src="votify-user dashboard/assets/img/logo1.png" alt="">
    <span class="d-none d-lg-block">Votify</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

  

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

    
        <li class="notification-item">
         

              <div>
                <h4>Registration Status</h4>
            <p> <?php echo $user_info['RegistrationStatus']; ?></p>
          
              </div>
            </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
      
          <div>
            <h4>Polling Station Information</h4>
            <p>"Find your nearest polling station: [Link]. Make sure you know where to cast your vote on Election Day."</p>
        
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>


        <li class="notification-item">
          <div>
            <h4>Election Results</h4>
            <p>"Stay tuned for live election results on [Date].</p>
          
          </div>
        </li>


      

       


      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->



    <li class="nav-item dropdown pe-3">

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $user_info['photodoc']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user_info['Name'];; ?></span>
          </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li>
              <a class="dropdown-item d-flex align-items-center" href="dashboard-mainpage.php">
                <i class="bi bi-person"></i>
                <span>Dashboard</span>
              </a>
            </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="dashboard-users_profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
       <li>
          <a class="dropdown-item d-flex align-items-center" href="dashboard-pages_faq.php">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="profile_display.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard-mainpage.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


 

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard-forms-elements1.php">
      <i class="bi bi-journal-text"></i>
      <span>Online Registration</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link " href="dashboard-users_profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard-pages_faq.php">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->


</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
    
    <div class="pagetitle">
      <h1>Users Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-mainpage.php">Home</a></li>
          <li class="breadcrumb-item active">Users Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


   
    
</main><!-- End #main -->
<div>
 <!-- Display Aadhar Card Document if available -->
 <div style="text-align: center; padding: 20px;">
        <h1>Registration Acknowledgement</h1>
        <?php
        // Check if a success message is provided via GET parameter
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
            echo '<p style="color: green;">' . htmlspecialchars($message) . '</p>';
        } else {
            echo '<p>Thank you for registering.</p>';
        }
        ?>
        <a href="dashboard-mainpage.php">Go to Dashboard</a>
        <br>
        <a href="pdf.php">View pdf</a>
    </div>

    <!-- Display User Profile Information -->
    <main>
        <!-- Your page content here -->

        <?php if (!$registration_submitted) : ?>
            <!-- Display a message to inform the user to complete registration forms -->
            <p>Please complete the registration forms before proceeding.</p>
        <?php elseif (!$pdf_generated) : ?>
            <!-- Display a preview of the registration application -->
            <p>Preview your registration application:</p>
            <!-- Include the form fields and data for the user to review -->
            <form action="acknowledge_page.php" method="post">
                <!-- Include form fields for previewing the application data -->
                <input type="submit" name="close_registration_forms" value="Close Registration Forms">
                <input type="submit" name="generate_pdf" value="Generate PDF">
            </form>
        <?php endif ?>
    </main>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>VOTIFY</span></strong>. All Rights Reserved
  </div>
  <div class="credits">

    Designed by <a href=""></a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="votify-user dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="votify-user dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="votify-user dashboard/assets/vendor/chart.js/chart.umd.js"></script>
<script src="votify-user dashboard/assets/vendor/echarts/echarts.min.js"></script>
<script src="votify-user dashboard/assets/vendor/quill/quill.min.js"></script>
<script src="votify-user dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="votify-user dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="votify-user dashboard/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="votify-user dashboard/assets/js/main.js"></script>

</body>
</html>
    