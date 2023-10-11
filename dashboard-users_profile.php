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
    $stmt = $pdo->prepare("SELECT username, email, profile_pic, Name, DateOfBirth, Age, Address, PhoneNumber, RegistrationStatus, City, State, Country, Gender, AadharCard, adhardoc, photodoc, signdoc FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Fetch the user's information
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

    // Extract user data for easier access
    $userName = $user_info['Name'];
    $userEmail = $user_info['email'];
    $userPhone = $user_info['PhoneNumber'];
    $userAddress = $user_info['Address'];
    $userProfileImage = $user_info['profile_pic']; // Assuming this is the profile picture filename
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


    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <img src="uploads/<?php echo trim($userProfileImage); ?>" alt="Profile Image" class="rounded-circle" style="width: 100px; height: auto;">

</div>

 

          </div>
        </div>

        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
                 <!-- Bordered Tabs -->
                 <ul class="nav nav-tabs nav-tabs-bordered">

<li class="nav-item">
  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
</li>

<!--<li class="nav-item">
  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
</li>

<li class="nav-item">
  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
</li>-->

<!--<li class="nav-item">
  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
</li>-->

</ul>
<div class="tab-content pt-2">

<div class="tab-pane fade show active profile-overview" id="profile-overview">



  <h5 class="card-title">Profile Details</h5>

  <div class="row">
    <div class="col-lg-3 col-md-4 label ">Full Name</div>
    <div class="col-lg-9 col-md-8"><?php echo  $userName; ?></div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-md-4 label">Email</div>
    <div class="col-lg-9 col-md-8"><?php echo $userEmail; ?></div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-md-4 label">Phone</div>
    <div class="col-lg-9 col-md-8"><?php echo  $userPhone; ?></div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-md-4 label">Address</div>
    <div class="col-lg-9 col-md-8"><?php echo $userAddress; ?></div>
 
</div>

<div class="tab-pane fade profile-edit pt-3" id="profile-edit"

  <!-- Profile Edit Form -->
  <form>
    <!--div class="row mb-3">
      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
      <div class="col-md-8 col-lg-9">
      <img src="./uploads/<?php $userProfileImage; ?>" alt="Profile Image"> alt="Profile">
        <div class="pt-2">
          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
        </div>
      </div>
    </div-->

    <div class="row mb-3">
      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
      <div class="col-md-8 col-lg-9">
      <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $userName; ?>">

      </div>
    </div>





    <div class="row mb-3">
      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
      <div class="col-md-8 col-lg-9">
        <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
      </div>
    </div>

    <div class="row mb-3">
      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
      <div class="col-md-8 col-lg-9">
        <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
      </div>
    </div>

    <div class="row mb-3">
      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
      <div class="col-md-8 col-lg-9">
        <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
  </form><!-- End Profile Edit Form -->

</div>

<div class="tab-pane fade pt-3" id="profile-settings">

  <!-- Settings Form -->
  <form>

    <div class="row mb-3">
      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Notifications</label>
      <div class="col-md-8 col-lg-9">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="changesMade" checked>
          <label class="form-check-label" for="changesMade">
            Changes made to your account
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="newProducts" >
          <label class="form-check-label" for="newProducts">
            News of Upcoming elections and updates
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="proOffers" checked>
          <label class="form-check-label" for="proOffers">
           Notifications for registration
          </label>
        </div>
        
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
  </form><!-- End settings Form -->

</div>

<!--<div class="tab-pane fade pt-3" id="profile-change-password">
  <!-- Change Password Form 
  <form>

    <div class="row mb-3">
      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
      <div class="col-md-8 col-lg-9">
        <input name="password" type="password" class="form-control" id="currentPassword">
      </div>
    </div>

    <div class="row mb-3">
      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
      <div class="col-md-8 col-lg-9">
        <input name="newpassword" type="password" class="form-control" id="newPassword">
      </div>
    </div>

    <div class="row mb-3">
      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
      <div class="col-md-8 col-lg-9">
        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Change Password</button>
    </div>
  </form><!-- End Change Password Form -->

</div>

</div><!-- End Bordered Tabs -->

</div>
</div>

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
