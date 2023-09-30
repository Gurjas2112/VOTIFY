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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/index.css" rel="stylesheet">

  <!--progress tracker-->
  <link rel="stylesheet" href="assets/css/forms_elements.css" />
  

    


</head>

<body>


 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo1.png" alt="">
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
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
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
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    
      <li class="nav-item">
        <a class="nav-link collapsed" href="forms-elements.php">
          <i class="bi bi-journal-text"></i>
          <span>Online Registration</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.php">
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
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Registration</li>
         
        </ol>
      </nav>
    </div><!-- End Page Title -->


              
              
    <form id="myForm" action="user_reg_backend.php" method="POST" onsubmit="return validateForm()">
    
               
                  <div class="input-group">
                   
                      <label for="inputText" class="col-sm-2 col-form-label">Full Name as per Aadhar card</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name"  required>
                      </div>
                    
                    </div>
                    <div class="input-group">
              
                      <label for="inputText" class="col-sm-2 col-form-label">Aadhar Card Number:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="aadhar_no" name="aadhar_no"  required>
                      </div>
          
                    </div>
                    <div class="input-group">
          
                      <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number"  required> 
                      </div>
            
                    </div>



                    <div class="input-group">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDate" name="inputDate"  required>
                      </div>
                   </div>

                   <div class="input-group">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="Email" name="Email"  required>
                      </div>
                   </div>


                    
    
                   
                    <div class="input-group">
        
                      <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" style="height: 100px" id="address" name="address"  required></textarea>
                      </div>
          
                    </div>

                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="option1" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Male
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="option2">
                          <label class="form-check-label" for="gridRadios2">
                            Female
                          </label>
                        </div>
                        <div class="form-check disabled">
                          <input class="form-check-input" type="radio" name="gender" id="gridRadios" value="option3">
                          <label class="form-check-label" for="gridRadios3">
                            Other
                          </label>
                        </div>
                      </div>
                    </fieldset>
                    
                    
                    <div class="form-group row">
          <label for="state" class="col-sm-2 col-form-label">Select a State:</label>
          <div class="col-sm-10">
            <select class="form-select" id="state" aria-label="Select a State" name="state" required>
              <option selected>Select a State</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Bihar">Bihar</option>
              <option value="Goa">Goa</option>
                    <option> Karnataka </option>
                <option> Maharshtra</option>
                <option> Arunachal Pradesh </option>
                <option> Haryana </option>
                <option> Gujarat </option>
                <option> Himachal Pradesh </option>
                <option> Assam </option>
                <option> Manipur </option>
                <option> Kerela</option>
                <option> Chattisgrah </option>
                <option> Punjab </option>
                <option> Tripura </option>
                <option> Mizoram </option>
                <option> West Bengal </option>
                <option> Jharkhand </option>
                <option> Tamil Nadu </option>
                <option> Madhya Pradesh </option>
                <option> Sikkim </option>
                <option> Rajasthan </option>
                <option> Uttar Pradesh </option>
                <option> Odhisha </option>
                <option> Nagaland </option>
                <option> Jammu Kashmir </option>
                <option> Meghalaya </option>
                <option> Uttarakhand</option>
                <option> Telangana </option>
            </select>
          </div>
        </div><br>
        <div class="row mb-3">
          <label for="city" class="col-sm-2 col-form-label">City</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="city" name="city">
          </div>
        </div>

               
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nationality</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nationality" name="nationality" value="Indian">
                    </div>
                  </div>
    
                 


        <div class="btns-group">
            <center>
            <button type="submit" class="btn btn-next width-50 ml-auto" onclick="redirectToForms-elements2()">Save and Next</button>

            </center>
        </div>

<script>
        function validateForm() {
            // Get references to form fields
            var name = document.getElementById("name").value;
            var aadhar_no = document.getElementById("aadhar_no").value;
            var mobile_number = document.getElementById("mobile_number").value;
            var inputDate = document.getElementById("inputDate").value;
            var email = document.getElementById("email").value;
            var address = document.getElementById("address").value;
            var city = document.getElementById("city").value;
            var state = document.getElementById("state").value;
            var country = document.getElementById("country").value;

            // Check if any of the fields are empty
            if (name === "" || aadhar_no === "" || mobile_number === "" || inputDate === ""|| email === "" || address === "" || city === "" || state === "" || country === "") {
                alert("Please fill in all the fields.");
                return false; // Prevent form submission
            }

            // If all fields are filled, allow form submission
            return true;
        }
    </script>
              
              </form>
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
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/camupload.js"></script>
  <script src="assets/js/forms_register.js"></script>
  <script src="state_city.js"></script>

</body>
</html>