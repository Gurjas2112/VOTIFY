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
// Fetch user registration data and pre-fill the form fields
$userData = []; // Initialize an array to store user registration data
// Retrieve user information (you can replace this with your actual database query)
$user_id = $_SESSION['user_id']; // Assuming you store the user's ID in the session
$user_info = []; // Initialize an array to store user data

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a SQL statement to retrieve user information based on the user's ID
    $stmt = $pdo->prepare("SELECT username, email,Name,AadharCard,PhoneNumber,DateOfBirth,Age,Address,Gender,City,State,Country, profile_pic FROM users WHERE id = :user_id");
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
  <link href="votify-user dashboard/assets/img/favicon.png" rel="icon">
  <link href="votify-user dashboard/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="votify-user dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="votify-user dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="votify-user dashboard/assets/css/index.css" rel="stylesheet">

  <!--progress tracker-->
  <link rel="stylesheet" href="votify-user dashboard/assets/css/forms_elements.css">
  
<style type="text/css">
  .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        .success {
            color: green;
            font-size: 12px;
            margin-top: 5px;
        }
      </style>


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
            <li class="dropdown-footer">
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
        <a class="nav-link collapsed" href="dashboard-users_profile.php">
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
      <h1>Registration Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-mainpage.php">Home</a></li>
          <li class="breadcrumb-item">Registration</li>
         
        </ol>
      </nav>
    </div><!-- End Page Title -->


              
              
    <form id="myForm" action="user_reg_backend.php" method="POST" onsubmit="return validateForm()">
    
               
                  <div class="input-group">
                   
                      <label for="inputText" class="col-sm-2 col-form-label">Full Name as per Aadhar card</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name"  required value="<?php echo $user_info['Name']; ?>">
                      
                      
                        <span class="error" id="name-error"></span>
                        <span class="success" id="name-success"></span>
                      </div>
                    
                    </div>
                    <div class="input-group">
        <label for="inputText" class="col-sm-2 col-form-label">Aadhar Card Number:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" required value="<?php echo $user_info['AadharCard']; ?>">
          <span class="error" id="aadhar-error"></span>
          <span class "success" id="aadhar-success"></span>
        </div>
      </div>
                    <div class="input-group">
          
                      <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="mobile_no" name="mobile_number"  required value="<?php echo $user_info['PhoneNumber']; ?>" > 
                        <span class="error" id="number-error"></span>
                        <span class="success" id="number-success"></span>
                      </div>
            
                    </div>


                    <div class="input-group">
                        <label for="inputdate" class="col-sm-2 col-form-label" >Date Of Birth</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control"  id="dob" name="dob"  required value="<?php echo $user_info['DateOfBirth']; ?>">
                      </div>
                   </div>

                   
                   <div class="input-group">
                        <label for="age" class="col-sm-2 col-form-label">Age Based on the birthdate:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="age" name="age" readonly value="<?php echo $user_info['Age']; ?>">

                        <span class="error" id="age-error"></span>
        <!--display correct age message below the textfield-->
        <span class="success" id="age-success"></span>
       
                      </div>
                   </div>
                   <div class="input-group">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <div class="blue-box">
            <input type="email" class="form-control" id="email" name="Email" value="<?php echo $user_info['email']; ?>" readonly>
        </div>
    </div>
</div>
<div class="input-group">
    <label for="address" class="col-sm-2 col-form-label">Address:</label>
    <div class="col-sm-10">
        <input type="address" id="address" name="address" required value="<?php echo $user_info['Address']; ?>" >

        <span class="error" id="address-error"></span>
        <span class="success" id="address-success"></span>
    </div>
</div>
<script>
document.querySelector('form').addEventListener('submit', function (event) {
    var addressInput = document.getElementById('address');
    var addressError = document.getElementById('address-error');
    var addressSuccess = document.getElementById('address-success');

    addressError.textContent = '';
    addressSuccess.textContent = '';

    var addressValue = addressInput.value.trim();

    // Define a regular expression pattern for the expected format
    var addressPattern = /^Flat no: \d+, Bld no: \d+, [\w\s]+, [\w\s]+, [\w\s]+, \d+$/;

    if (!addressPattern.test(addressValue)) {
        addressError.textContent = 'Address should be in the format "Flat no: , Bld no: , Locality, Area, City, and Pin code"';
        addressInput.focus();
        event.preventDefault();
    } else {
        addressSuccess.textContent = 'Address is in the correct format.';
    }
});
</script>

                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="option1" checked value="<?php echo $user_info['Gender']; ?>">
                          <label class="form-check-label" for="gridRadios1">
                            Male
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="option2" value="<?php echo $user_info['Gender']; ?>">
                          <label class="form-check-label" for="gridRadios2">
                            Female
                          </label>
                        </div>
                        <div class="form-check disabled">
                          <input class="form-check-input" type="radio" name="gender" id="gridRadios" value="option3" value="<?php echo $user_info['Gender']; ?>">
                          <label class="form-check-label" for="gridRadios3">
                            Other
                          </label>
                        </div>
                      </div>
                    </fieldset>
                    
                    
                    <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">Select a State:</label>
          <div class="col-sm-10">
            <select class="form-select" id="state" aria-label="Select a State" name="state" required value="<?php echo $user_info['State']; ?>">
              <option >Select a State</option>
      
                    </select>
          </div>
        </div>
        <br>
         
        <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">Select a City:</label>
          <div class="col-sm-10">
            <select class="form-select" id="city" aria-label="Select a city" name="city" required value="<?php echo $user_info['City']; ?>">
              <option >Select a city</option>
      
                    </select>
          </div>
        </div>
        <br>  
               
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nationality</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nationality" name="nationality" value="Indian" readonly value="<?php echo $user_info['City']; ?>">
                    </div>
                  </div>
    
                 

                  <div class="btns-group">
            <center>
                <button type="submit" class="btn btn-pre width-50 ml-auto" id="previewSubmitButton">Save and Next</button>
            </center>
        </div>
              
              </form>
              <script>
        // Function to check if there are errors displayed below text fields
        function hasErrors() {
            const errorElements = document.querySelectorAll(".error");
            return Array.from(errorElements).some(
                (errorElement) => errorElement.textContent.trim() !== ""
            );
        }

        // Function to check if all text fields are empty
        function areTextFieldsEmpty() {
            const textFields = document.querySelectorAll("input[type='text']");
            return Array.from(textFields).every((textField) => textField.value.trim() === "");
        }

        // Function to handle the "Save and Next" button click
        document.getElementById('previewSubmitButton').addEventListener('click', function (event) {
            if (hasErrors() || areTextFieldsEmpty()) {
                event.preventDefault();
                alert("Please correct errors and fill in all fields before proceeding.");
            }
        });
    </script>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>VOTIFY</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="">Code Mavericks</a>
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
  <script src="votify-user dashboard/assets/js/camupload.js"></script>
  <script src="forms_register.js"></script>
  <script src="votify-user dashboard/assets/js/state_city.js"></script>

</body>
</html>