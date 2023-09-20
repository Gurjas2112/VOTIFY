<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Management</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!--<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">-->
	
	<!--Feedback Styles-->
	<link rel="stylesheet" href="assets/css/FeedbackMgmt.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
				<div class="sidebar-header">
					<div class="d-flex justify-content-between">
						<div class="logo">
							  <a href="AdminDashboard.php"><img src="assets/images/logo/logo1.png" alt="" srcset="">Votify</a>
						</div>
						<div class="toggler">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<div class="sidebar-menu">
					<ul class="menu">   
						<li class="sidebar-item  ">
						<a href="AdminDashboard.php" class='sidebar-link'>
							<i class="bi bi-grid-fill"></i>
							<span>Dashboard</span>
						</a>
						</li>
						
						<li class="sidebar-item  ">
							<a href="UserManagement.php" class='sidebar-link'>
								<i class="bi bi-file-earmark-spreadsheet-fill"></i>
								<span>User Management</span>
							</a>
						</li>
						
						<li class="sidebar-item">
							<a href="Documents-Verify.php" class='sidebar-link'>
								<i class="bi bi-image-fill"></i>
								<span>Documents Verification</span>
							</a>
						</li>
						
						<li class="sidebar-item  ">
							<a href="Notification-Management.php" class='sidebar-link'>
								<i class="bi bi-clock-fill"></i>
								<span>Notification Management</span>
							</a>
						</li>
						
						<li class="sidebar-item active ">
							<a href="feedback-Management.php" class='sidebar-link'>
								<i class="bi bi-pencil-square"></i>
								<span>Feedback Management</span>
							</a>
						</li>
						
						<li class="sidebar-item ">
							<a href="AdminProfile.php" class='sidebar-link'>
								<i class="bi bi-person-fill"></i>
								<span>My Profile</span>
							</a>
						</li>
					</ul>
				</div>
				<center><a href="#" class="buttons btn btn-info">Logout</a></center>
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
			<div class="page-title">
				<div class="row">
					<div class="col-12 col-md-6 order-md-1 order-last">
						<h3>Feedback Management</h3>
						<p class="text-subtitle text-muted">Check Feedback of users </p>
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="AdminDashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Feedback Management</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		<section class="section">
			<ul id="feedback-list">
			<!-- Feedback items will be dynamically added here -->
			</ul>
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
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap1.bundle.min.js"></script>
    
    <script src="assets/js/main.js"></script>
	
	<!--Feedback Script-->
	<script src="assets/js/FeedbackMgmt.js"></script>
</body>

</html>
