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
    $stmt = $pdo->prepare("SELECT username, email,Name,Address,PhoneNumber, profile_pic FROM users WHERE id = :user_id");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile Page</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="Admin/assets/css/DocsUserMgmt.css">

    <link rel="stylesheet" href="Admin/assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="Admin/assets/css/app.css">
    <!--<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">-->
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="Admin-Admin_Dashboard.php"><img src=" Admin/assets/images/logo/logo1.png" alt="" srcset="">Votify</a>
					  </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <!--<li class="sidebar-title">Menu</li>-->

                        <li class="sidebar-item  ">
                            <a href="Admin-Admin_Dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
						
						<li class="sidebar-item ">
                            <a href="Admin-User_Management.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>User Management</span>
                            </a>
                        </li>
						
						<li class="sidebar-item  ">
                            <a href="Admin-Documents_Verify.php" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Documents Verification</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
							<a href="Admin-Admin_Profile.php" class='sidebar-link'>
								<i class="bi bi-person-fill"></i>
								<span>My Profile</span>
							</a>
						</li>						
                    </ul>
                </div>
				<center><a href="admin.php" class="buttons btn btn-info">Logout</a></center>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
		</div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
			<div class="page-heading">
				<div class="page-title">
					<div class="row">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h3>Profile</h3>
							<p class="text-subtitle text-muted">Check Your Profile</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="Admin-Admin_Dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">My Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				
				 <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $user_info['profile_pic']; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $user_info['Name']; ?></h2>
              <!--<h3>Web Designer</h3>-->
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <!--<button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>-->
                </li>
              </ul>
			  <hr>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label" >Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user_info['Name']; ?></div>
                  </div>
                 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8" ><?php echo $user_info['Address']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user_info['PhoneNumber']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user_info['email']; ?></div>
                  </div>

                </div>
				
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
			</div>

           <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-none">
                        <center><p>&copy; Copyright<b> Votify.</b>All Rights Reserved
						<br>
						Designed by Code Mavericks</p></center>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="Admin/assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="Admin/assets/js/main.js"></script>
</body>

</html>
