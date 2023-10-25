

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	
    <link rel="stylesheet" href="Admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="Admin/assets/css/bold.css">

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
						<a href="Admin-Admin_Dashboard.php"><img src="Admin/assets/images/logo/logo1.png" alt="" srcset="">Votify</a>
						</div>
                      
						<div class="toggler">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item active">
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
						
					
						
						<li class="sidebar-item ">
							<a href="Admin-feedback_Management.php" class='sidebar-link'>
								<i class="bi bi-pencil-square"></i>
								<span>Feedback Management</span>
							</a>
						</li>
						
						<li class="sidebar-item ">
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
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Registration</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
				<!--  Tables start -->
                <section class="section">
                    <div class="row" id="basic-table">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Information</h4>
                                </div>
                                        <!-- Table with outer spacing -->
                                        <div class="table-responsive">
                                            <table class="table table-lg-8">
                                                <thead>
                                                    <tr>
                                                        <th>NAME</th>
                                                        <th>Email</th>
                                                        <th>Registration Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-bold-500">Michael Right</td>
                                                        <td>michael12@gmail.com</td>
                                                        <td class="text-bold-500">12/1/2023</td>
														</tr>
                                                </tbody>
                                            </table>
											<center><a href="Admin-User_Management.php" class="buttons btn btn-info">View More</a></center>
											<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</section>
                    </div>
					
					<!--Pie Chart-->
                   <div class="col-12 col-lg-3">                      
						<div class="card">
                            <div class="card-header">
                                <h4>User Status</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>                       
					</div>
                    </div>
                </section>
            

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
    
	<!--JS files-->
    <script src="Admin/assets/js/perfect-scrollbar.min.js"></script>
    <script src="Admin/assets/js/bootstrap1.bundle.min.js"></script>

    <script src="Admin/assets/js/apexcharts.js"></script>
    <script src="Admin/assets/js/dashboard.js"></script>

    <script src="Admin/assets/js/main.js"></script>
</body>

</html>