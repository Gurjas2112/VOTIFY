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
    $stmt = $pdo->prepare("SELECT username, email, profile_pic FROM users WHERE id = :user_id");
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

  <title>Dashboard </title>
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

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

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

            <!--<li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>-->

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
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           

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
                <span>Log Out</span>
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
        <a class="nav-link " href="dashboard-mainpage.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="dashboard-forms-elements1.php">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-mainpage.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Votes<span> Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-ui-checks"></i>
                    </div>
                    <div class="ps-3">
                      <h6>25,145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->


            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Registration <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>


                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

              
                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  
            <!-- Column Chart -->
            <div id="columnChart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#columnChart"), {
                  series: [{
                    name: 'BJP',
                    data: [44, 55, 57, 56, 61, 70, 63, 60, 66]
                  }, {
                    name: 'Communist Party of India',
                    data: [76, 55, 101, 98, 87, 105, 45, 114, 94]
                  }, {
                    name: 'Indian National Congress',
                    data: [35, 71, 36, 56, 45, 48, 52, 53, 112]
                  }],
                  chart: {
                    type: 'bar',
                    height: 350
                  },
                  plotOptions: {
                    bar: {
                      horizontal: false,
                      columnWidth: '55%',
                      endingShape: 'rounded'
                    },
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                  },
                  xaxis: {
                    categories: ['2014', '2015', '2016', '2017', '2018', '2019', '2020', '2022', '2023'],
                  },
                  yaxis: {
                    title: {
                      text: 'Votes'
                    }
                  },
                  fill: {
                    opacity: 1
                  },
                  tooltip: {
                    y: {
                      formatter: function(val) {
                        return " " + val + " votes"
                      }
                    }
                  }
                }).render();
              });
            </script>
            <!-- End Column Chart -->

          </div>
        </div>
      </div>


 <!-- News & Updates Traffic -->
 <div class="card">
 



  <!--</div>-->
</div><!-- End News & Updates -->



            

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Received a <a href="#" class="fw-bold text-dark">Helpful vote </a> badge for providing thoughtful votes consistently.
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Joined the community forum.
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Updated the uploaded documents.
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">13 days</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Registered for the issue of<a href="#" class="fw-bold text-dark"> Voter card.</a> 
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">20 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Registered to Vote.
                  </div>
                </div><!-- End activity item-->

                

              </div>

            </div>
          </div><!-- End Recent Activity -->

         

          <!-- Website Traffic -->
          <div class="card">
           

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Profile Status</h5>
            
                <!-- Progress Bars with labels outside -->
                <div class="progress-label-container">
                  <div class="progress-label">Profile</div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                  </div>
                </div>
                <div class="progress-label-container mt-3">
                  <div class="progress-label">Photo</div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                  </div>
                </div>
                <div class="progress-label-container mt-3">
                  <div class="progress-label">Reg</div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                  </div>
                </div>
                <!-- End Progress Bars with labels outside -->
            
              </div>
            </div>
           
         

        </div><!-- End Right side columns -->

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

</body>

</html>
