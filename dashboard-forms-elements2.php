<?php
// Include the database connection configuration
include 'db_connect.php'; // Replace with your actual database configuration file

// Initialize a session to access user data
session_start();

// Check if the user is logged in (you can implement your authentication logic here)
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}

// Retrieve user information (you can replace this with your actual database query)
$user_id = $_SESSION['user_id']; // Assuming you store the user's ID in the session
$user_info = []; // Initialize an array to store user data

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a SQL statement to retrieve user information based on the user's ID
    $stmt = $pdo->prepare("SELECT username, email,Name,AadharCard,PhoneNumber,DateOfBirth,Age,Address,Gender,City,State,Country, profile_pic,RegistrationStatus,adhardoc,photodoc FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Fetch the user's information
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Database connection or query error
    // Handle the error appropriately (e.g., display an error message)
    echo "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>User Registration</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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
    <!-- Progress Tracker -->
    <link rel="stylesheet" href="votify-user dashboard/assets/css/forms_elements.css" />
   <style> /* Style for error messages in red */
.error {
    color: #FF0000; /* Red color */
    font-size: 14px;
}

/* Style for success messages in green */
.success {
    color: #008000; /* Green color */
    font-size: 14px;
}
</style>
<body>
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
                    <i class="bi bi-exclamation-circle text-warning"></i>
                    <div>
                      <h4>Registration Confirmation</h4>
                      <p>"Congratulations! Your voter registration has been successfully confirmed. You are now eligible to vote in the upcoming elections."</p>
                      <p>30 min. ago</p>
                    </div>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="notification-item">
                    <i class="bi bi-x-circle text-danger"></i>
                    <div>
                      <h4>Polling Station Information</h4>
                      <p>"Find your nearest polling station: [Link]. Make sure you know where to cast your vote on Election Day."</p>
                      <p>1 hr. ago</p>
                    </div>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="notification-item">
                    <i class="bi bi-info-circle text-primary"></i>
                    <div>
                      <h4>Election Results</h4>
                      <p>"Stay tuned for live election results on [Date].</p>
                      <p>4 hrs. ago</p>
                    </div>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a href="#">Show all notifications</a>
                  </li>
                </ul><!-- End Notification Dropdown Items -->
              </li><!-- End Notification Nav -->
              <li class="nav-item dropdown pe-3">
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $user_info['profile_pic']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user_info['username']; ?></span>
          </a><!-- End Profile Iamge Icon -->
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
                    <a class="dropdown-item d-flex align-items-center" href="dashboard-users_profile.php">
                      <i class="bi bi-gear"></i>
                      <span>Account Settings</span>
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
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard-mainpage.php">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li><!-- End Dashboard Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard-forms-elements2.php">
              <i class="bi bi-journal-text"></i>
              <span>Online Registration</span>
            </a>
          </li>
          <li class="nav-item">
            <a class a="nav-link collapsed" href="dashboard-users_profile.php">
              <i class="bi bi-person"></i>
              <span>Profile</span>
            </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard-pages_faq.php">
              <i class="bi bi-question-circle"></i>
              <span>F.A.Q</span>
            </a><!-- End F.A.Q Page Nav -->
          </li>
        </ul>
    </aside><!-- End Sidebar -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Registration Form</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-mainpage.php">Home</a></li>
                    <li class="breadcrumb-item">Registration</li>
                </ol>
                <p>Please upload only JPG or PDF files.</p>
            </nav>
        </div>
        <!-- Registration Form -->
        <form id="myForm" action="fileupload_backend.php" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Upload Aadhar Card</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="aadhar_card" id="identity_proof" accept=".jpg, .pdf">
                    <span class="error" id="adhardoc-error"></span>
        <span class="success" id="adhardoc-success"></span>
                  </div>
            </div>
        <br>
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Upload Photo</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="user_photo" id="residency_proof" accept=".jpg, .pdf">
                    <span class="error" id="photodoc-error"></span>
        <span class="success" id="photodoc-success"></span>
                  </div>
            </div>
            <br>
          
            <div class="btns-group">
                <center>
                    <a href="dashboard-forms-elements1.php" class="btn btn-prev width-50 ml-auto">Previous</a>
    
                    <button type="submit" class="btn btn-pre width-50 ml-auto" id="previewSubmitButton">Preview and Submit</button>
                </center>
            </div>
        </form>
        <script>
    // Function to validate and handle document uploads
function validateDocumentUpload(inputId, errorSpanId, successSpanId) {
    const fileInput = document.getElementById(inputId);
    const errorSpan = document.getElementById(errorSpanId);
    const successSpan = document.getElementById(successSpanId);

    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const fileSize = file.size / 1024; // Size in kilobytes
        const allowedExtensions = ['jpg', 'pdf'];
        const fileExtension = file.name.split('.').pop().toLowerCase();

        if (fileSize > 2048) { // Maximum file size is 2MB
            errorSpan.innerText = 'File size should not exceed 2MB.';
            successSpan.innerText = ''; // Clear any success message
            fileInput.value = ''; // Clear the file input
        } else if (!allowedExtensions.includes(fileExtension)) {
            errorSpan.innerText = 'Only JPG and PDF files are allowed.';
            successSpan.innerText = ''; // Clear any success message
            fileInput.value = ''; // Clear the file input
        } else {
            errorSpan.innerText = '';
            successSpan.innerText = 'Document uploaded successfully.';
        }
    } else {
        errorSpan.innerText = 'Please upload a document.';
        successSpan.innerText = ''; // Clear any success message
    }
}

// Add event listeners for document uploads
document.getElementById('identity_proof').addEventListener('change', function () {
    validateDocumentUpload('identity_proof', 'adhardoc-error', 'adhardoc-success');
});

document.getElementById('residency_proof').addEventListener('change', function () {
    validateDocumentUpload('residency_proof', 'photodoc-error', 'photodoc-success');
});

// Handle "Preview and Submit" button click
document.getElementById('previewSubmitButton').addEventListener('click', function (event) {
    // Check if documents are not uploaded
    const adharError = document.getElementById('adhardoc-error').innerText;
    const photoError = document.getElementById('photodoc-error').innerText;
    
    if (adharError || photoError) {
        event.preventDefault(); // Prevent form submission if errors exist
        alert('Please fix the errors before submitting.');
    }
});

</script>

    </main>
    <!-- End Main Content -->
    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>VOTIFY</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="">Code Mavericks</a>
        </div>
    </footer>
    <!-- End Footer -->
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
    
</body>
</html>
