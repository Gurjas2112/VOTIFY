<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Page</title>

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
                            <a href="Admin-AdminDashboard.php"><img src="Admin/assets/images/logo/logo1.png" alt="" srcset="">Votify</a>
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
						
						<li class="sidebar-item active">
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
						
						<li class="sidebar-item  ">
                            <a href="Admin-Notification_Management.php" class='sidebar-link'>
                                <i class="bi bi-clock-fill"></i>
                                <span>Notification Management</span>
                            </a>
                        </li>
						
						<li class="sidebar-item">
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
                            <h3>User Information</h3>
                            <p class="text-subtitle text-muted">Search for a user</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Admin-Admin_Dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Management</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
				
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
										<th>DOB</th>
										<th>Address</th>
										<th>Gender</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Nationality</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Graiden</td>
                                        <td>vehicula.aliquet@gmail.com</td>
                                        <td>7648208838</td>
                                        <td>25/4/2000</td>
                                        <td>
                                            <!--<span class="badge bg-success">Active</span>-->
											pune,vss,411021
                                        </td>
										<td>Female</td>
                                        <td>Pune</td>
                                        <td>Maharashtra</td>
                                        <td>India</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>


             <!--Footer-->
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

    <script src="Admin/assets/js/simple-datatables.js"></script>
	
	<!--JS for User Information Table-->
    <script>
        // User Information Table
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="Admin/assets/js/main.js"></script>
</body>

</html>