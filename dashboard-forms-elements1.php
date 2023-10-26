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

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a SQL statement to retrieve user information based on the user's ID
    $stmt = $pdo->prepare("SELECT username, email, Name, AadharCard, PhoneNumber, DateOfBirth, Age, Address, Gender1, Gender2, Gender3, City, State, Country, profile_pic, RegistrationStatus FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();

    $userID = $_SESSION['user_id'];
    // Fetch the user's information
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user_info is false (no rows returned)
    if (!$user_info) {
        // Redirect to an error page or handle the situation accordingly
        header('Location: error_page.php');
        exit();
    }
    //Session variable for registration status
$_SESSION['registration_status'] = $user_info['RegistrationStatus'];

// If registration status is 'registered' redirect to the acknowledgement page
if ($_SESSION['registration_status'] == 'registered') {
    header('Location: acknowledge_page.php');
    exit();
}
 // Fetch and store the user's selected gender
 // Gender values based on the user data
 $selectedGender1 = ($user_info['Gender1'] === 'Male') ? 'checked' : '';
 $selectedGender2 = ($user_info['Gender1'] === 'Female') ? 'checked' : '';
 $selectedGender3 = ($user_info['Gender1'] === 'Others') ? 'checked' : '';

 
}
catch(PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
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
                <h4>Registration Status</h4>
            <p> <?php echo $user_info['RegistrationStatus']; ?></p>
          
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
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
            <img src="<?php echo $user['photodoc']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $userName; ?></span>
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
                      <div class="col-sm-10">
    <div class="form-check">
            <input class="form-check-input gender-radio" type="radio" name="gender" id="gender1" value="Male" <?php echo $selectedGender1; ?>>
            <label class="form-check-label" for="gender1">Male</label>
        </div>
        <div class="form-check">
            <input class="form-check-input gender-radio" type="radio" name="gender" id="gender2" value="Female" <?php echo $selectedGender2; ?>>
            <label class="form-check-label" for="gender2">Female</label>
        </div>
        <div class="form-check disabled">
            <input class="form-check-input gender-radio" type="radio" name="gender" id="gender3" value="Others" <?php echo $selectedGender3; ?>>
            <label class="form-check-label" for="gender3">Other</label>
        </div>
</div>
                    </fieldset>
                
<script type="text/javascript">

// Get all radio buttons with the 'gender-radio' class
const genderRadios = document.querySelectorAll('.gender-radio');

// Add a click event listener to each radio button
genderRadios.forEach((radio) => {
  radio.addEventListener('click', () => {
    // Uncheck all other radio buttons
    genderRadios.forEach((otherRadio) => {
      if (otherRadio !== radio) {
        otherRadio.checked = false;
      }
    });
  });
});
</script>
                    
                    <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">Select a State:</label>
          <div class="col-sm-10">
            <select class="form-select" id="state" aria-label="Select a State" name="state" required value="<?php echo $stateName; ?>">
              <option >Select a State</option>
      
                    </select>
          </div>
        </div>
        <br>
         
        <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">Select a City:</label>
          <div class="col-sm-10">
            <select class="form-select" id="city" aria-label="Select a city" name="city" required value="<?php echo $cityName; ?>">
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
             document.addEventListener("DOMContentLoaded", function () {
  // Function to validate Full Name
  function validateName() {
    const nameInput = document.getElementById("name");
    const nameError = document.getElementById("name-error");
    const nameSuccess = document.getElementById("name-success");
    const nameRegex = /^[A-Za-z\s]+$/; // Allow letters and spaces in the name

    nameInput.addEventListener("input", function () {
      const name = this.value.trim();
      clearError(nameError);
      clearSuccess(nameSuccess);

      if (name === "") {
        displayError(nameError, "Full Name is required");
      } else if (!nameRegex.test(name)) {
        displayError(nameError, "Invalid characters in Full Name");
      } else {
        displaySuccess(nameSuccess, "Valid Full Name entered");
      }
    });
  }

  // Function to validate Aadhar Card Number
  function validateAadhar() {
    const aadharInput = document.getElementById("aadhar_no");
    const aadharError = document.getElementById("aadhar-error");
    const aadharSuccess = document.getElementById("aadhar-success");
    const aadharRegex = /^\d{12}$/; // Aadhar should be 12 digits

    aadharInput.addEventListener("input", function () {
      clearError(aadharError);
      clearSuccess(aadharSuccess);

      if (!aadharRegex.test(this.value)) {
        displayError(aadharError, "Aadhar number should be 12 digits.");
      } else {
        displaySuccess(aadharSuccess, "Valid Aadhar number entered");
      }
    });
  }

  // Function to validate Phone Number
  function validatePhoneNumber() {
    const phoneNumberInput = document.getElementById("mobile_no");
    const phoneNumberError = document.getElementById("number-error");
    const phoneNumberSuccess = document.getElementById("number-success");
    const phoneNumberRegex = /^\+91\d{10}$/; // Phone number should start with +91 and be followed by 10 digits

    phoneNumberInput.addEventListener("input", function () {
      clearError(phoneNumberError);
      clearSuccess(phoneNumberSuccess);

      if (!phoneNumberRegex.test(this.value)) {
        displayError(phoneNumberError, "Mobile number should start with '+91' and be followed by 10 digits.");
      } else {
        displaySuccess(phoneNumberSuccess, "Valid mobile number entered");
      }
    });
  }

  // Function to calculate age based on Date of Birth
  const dobInput = document.getElementById("dob");
  const ageInput = document.getElementById("age");
  const ageError = document.getElementById("age-error");
  const ageSuccess = document.getElementById("age-success");

  dobInput.addEventListener("change", () => {
    const dob = new Date(dobInput.value);
    const age = calculateAge(dob);

    if (isNaN(age) || age < 18 || age > 100) {
      ageInput.value = "NaN"; // Display "NaN" for invalid ages
      ageError.textContent = "Age must be between 18 and 100";
      clearSuccess(ageSuccess);
    } else {
      clearError(ageError);
      displaySuccess(ageSuccess, "Valid age entered");
      ageInput.value = age;
    }
  });

  function calculateAge(dob) {
    const now = new Date();

    const diff = now.getTime() - dob.getTime();
    const ageDate = new Date(diff);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
  }

  // Function to display an error message
  function displayError(element, message) {
    element.textContent = message;
    element.style.color = "red";
  }

  // Function to clear an error message
  function clearError(element) {
    element.textContent = "";
  }

  // Function to display a success message
  function displaySuccess(element, message) {
    element.textContent = message;
    element.style.color = "green";
  }

  // Initialize validation functions
  validateName();
  validateAadhar();
  validatePhoneNumber();

  // Function to check if there are errors on the page
  function hasErrors() {
    const errorElements = document.querySelectorAll(".error");
    return Array.from(errorElements).some(
      (errorElement) => errorElement.textContent.trim() !== ""
    );
  }

  // Add event listener for the "Save and Next" button
  const saveAndNextButton = document.getElementById("step1-save-and-next");
  saveAndNextButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Check if there are errors on the page or empty fields
    if (hasErrors() || !validateEmptyFields()) {
      alert("Please correct the errors and fill in all fields before proceeding.");
    } else {
      // Move to the next step
      moveToNextStep(1); // Move to Step 2 when the button is clicked
    }
  });

  // Function to validate empty fields
  function validateEmptyFields() {
    const inputs = document.querySelectorAll("input[required]");
    let isValid = true;

    inputs.forEach((input) => {
      if (input.value.trim() === "") {
        isValid = false;
      }
    });

    return isValid;
  }

  // Function to clear all error messages on the page
  function clearAllErrors() {
    const errorElements = document.querySelectorAll(".error");
    errorElements.forEach((errorElement) => (errorElement.textContent = ""));
  }

  // Add event listener for the "Previous" button in Step 2
  document.getElementById("step1-previous").addEventListener("click", function (event) {
    event.preventDefault();
    moveToNextStep(1);
  });

  // Add event listener for the "Save and Next" button in Step 2
  document.getElementById("step2-save-and-next").addEventListener("click", function (event) {
    event.preventDefault();
    clearAllErrors(); // Clear all error messages
    moveToNextStep(2); // Move to Step 3 in this example, change to moveToNextStep(2) if you want to move to Step 2
  });

  // Move to the next step function (You can implement this logic here)
  function moveToNextStep(currentStep) {
    // Determine the next step (you can customize this logic)
    const nextStep = currentStep + 1;

    // Hide the current step
    const currentFormStep = document.getElementById(`step${currentStep}`);
    currentFormStep.style.display = "none";

    // Show the next step
    const nextFormStep = document.getElementById(`step${nextStep}`);
    nextFormStep.style.display = "block";

    // Update the progress bar (if you have one)
    updateProgressBar(currentStep, nextStep);
  }

  function updateProgressBar(currentStep, nextStep) {
    // Remove the "active" class from the current step
    const currentStepElement = document.querySelector(`.step.step${currentStep}`);
    currentStepElement.classList.remove("active");

    // Add the "active" class to the next step
    const nextStepElement = document.querySelector(`.step.step${nextStep}`);
    nextStepElement.classList.add("active");
  }
});

</script>
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