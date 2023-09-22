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

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
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


              <!-- General Form Elements -->
              <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active" data-title="Personal   Details"></div>
                <div class="progress-step" data-title="Citizenship"></div>
                <div class="progress-step" data-title="Document Upload"></div>
                
              </div>
              
              <form id="multistep-form">
                <!-- Step 1 -->
                <div class="form-step form-step-active">
                  <div class="input-group">
                   
                      <label for="inputText" class="col-sm-2 col-form-label">Full Name as per Aadhar card</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name">
                      </div>
                    
                    </div>
                    <div class="input-group">
              
                      <label for="inputText" class="col-sm-2 col-form-label">Aadhar Card Number:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="aadhar_no">
                      </div>
          
                    </div>
                    <div class="input-group">
          
                      <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="mobile_number">
                      </div>
            
                    </div>



<div class="input-group">
    <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
    <div class="col-sm-10">
        <input type="date" class="form-control" id="inputDate" >
    </div>
</div>

                    
    
                   
                    <div class="input-group">
        
                      <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" style="height: 100px" id="address" ></textarea>
                      </div>
          
                    </div>

                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Male
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                          <label class="form-check-label" for="gridRadios2">
                            Female
                          </label>
                        </div>
                        <div class="form-check disabled">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option3">
                          <label class="form-check-label" for="gridRadios3">
                            Other
                          </label>
                        </div>
                      </div>
                    </fieldset>
                    <div class="input-group">
                
                      <label for="inputText" class="col-sm-2 col-form-label">City</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control">
                      </div>
          
                    </div>
                    
                    <div class="input-group">
            
                      <label class="col-sm-2 col-form-label">State</label>
                      <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Select</option>
                          <option value="1">Andhra Pradesh</option>
                          <option value="2">Bihar</option>
                          <option value="3">Goa</option>
                          <option value="4">Karnataka</option>
                          <option value="5">Maharashtra</option>
                          <option value="6">Arunanchal Pradesh</option>
                          <option value="7">Haryana</option>
                          <option value="8">Gujarat</option>
                          <option value="9">Himachal Pradesh</option>
                          <option value="10">Assam</option>
                          <option value="11">Manipur</option>
                          <option value="12">Kerala</option>
                          <option value="13">Chhattisgarh</option>
                          <option value="14">Punjab</option>
                          <option value="15">Tripura</option>
                          <option value="16">Mizoram</option>
                          <option value="17">West Bengal</option>
                          <option value="18">Jharkhand</option>
                          <option value="19">Tamil Nadu</option>
                          <option value="20">Madhya Pradesh</option>
                          <option value="21">Sikkim</option>
                          <option value="22">Rajasthan</option>
                          <option value="23">Uttar Pradesh</option>
                          <option value="24">Odisha</option>
                          <option value="25">Nagaland</option>
                          <option value="26">Jammu Kashmir</option>
                          <option value="27">Maghalaya</option>
                          <option value="28">Uttarkhand</option>
                          <option value="29">Telangana</option>
    
    
    
                        </select>
                      </div>
                      
                    </div>


                    <div class="input-group">
                   
                      <label for="inputText" class="col-sm-2 col-form-label">Country</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control">
                      </div>
                    
                    </div>
    
                 
    
                   
                 
<div class="btns-group">
    <center>
        <a href="#" class="btn btn-next width-50 ml-auto" id="step1-save-and-next">Save and Next</a>
    </center>
</div>
              
                <!-- Step 2 -->

                <div class="form-step">
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Citizenship status</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                        <label class="form-check-label" for="gridRadios1">
                          Citizen
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                          Permanent Resident
                        </label>
                      </div>
                      <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" >
                        <label class="form-check-label" for="gridRadios3">
                          Other
                        </label>
                      </div>
                    </div>
                  </fieldset>
  
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" name="countryOfCitizenship">Country of Citizenship</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" id="countryOfCitizenship">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Three</option>
                        <option value="5">Three</option>
                        <option value="6">Three</option>
                        <option value="7">Three</option>
                        <option value="8">Three</option>
                        <option value="9">Three</option>
                        <option value="10">Three</option>
                        <option value="11">Three</option>
                        <option value="12">Three</option>
                        <option value="13">Three</option>
                        <option value="14">Three</option>
                        <option value="15">Three</option>
                        <option value="16">Three</option>
                        <option value="17">Three</option>
                        <option value="18">Three</option>
                        <option value="19">Three</option>
                        <option value="20">Three</option>
                        <option value="21">Three</option>
                        <option value="22">Three</option>
                        <option value="23">Three</option>
                        <option value="24">Three</option>
                        <option value="25">Three</option>
                        <option value="26">Three</option>
                        <option value="27">Three</option>
                        <option value="28">Three</option>
                        <option value="29">Three</option>
  
  
  
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nationality</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nationality">
                    </div>
                  </div>
                
                
                  <div class="btns-group">
        <center>
            <a href="#" class="btn btn-prev width-50 ml-auto" id="step1-previous">Previous</a>
            <a href="#" class="btn btn-next width-50" id="step2-save-and-next">Save and Next</a>
        </center>
    </div>
</div>
                <!-- Step 3 -->
                <div class="form-step">
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Identity Proof</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  id="identity_proof">
                     <p>(Aadhar Card /Driver's license /Passport)</p> 
                    </div>
                  </div>
            
            
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Residency Proof</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  id="residency_proof">
                      <p>(Utility bill /Rental agreement)</p>
                    </div>
                  </div>
                



                  <!-- HTML for the Upload Photo section -->
                   <div id="upload-photo">
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Upload Photo</label>
                    <div class="col-sm-10">
                      <input type="file" accept="image/*" id="gallery-upload" style="display:none;">
                      <button id="upload-from-gallery">Upload from Gallery</button>
                      <button id="take-photo">Upload from Camera</button><br>
                      <img id="uploaded-image" style="display:none;" src="" alt="Uploaded Photo">
                    </div>
                  </div>
                  </div>
                
            
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Signature</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="signature">
                    </div>
                  </div>
            
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Social Security number</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="social_security">
                    </div>
                  </div>
            
                 
                  <div class="btns-group">
        <center>
            <a href="#" class="btn btn-prev width-50 ml-auto">Previous</a>
            <a href="#" class="btn btn-save width-50" >Save</a>
            <a href="#" class="btn btn-pre width-50 ml-auto" id="multi-step-form-preview_submit">Preview and Submit</a>
        </center>
    </div>
</div> 
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

</body>
</html>