

<?php

require "db_connect.php";

// Fetch a random user from the database using PDO
$query = "SELECT * FROM users ORDER BY RAND() LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

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
                                        <div id="chart-profile-bargraph">
                                        <img id="bar-graph-image" src="" alt="Registration Bar Graph">
                                        </div>
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
                                                        <th>Registration status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-bold-500">GURJAS SINGH GANDHI
                                                        <td>gsgbmcc@gmail.com</td>
                                                        <td class="text-bold-500">registered</td>
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
                            <div class="card-body" width>
                            <div id="chart-visitors-piechart">
                                <img id="pie-chart-image" src="" alt="Registration Status Pie Chart">
                            </div>
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
    <script>
    // Function to update the bar graph image
function updateBarGraph() {
    // Fetch the bar graph image from bargraph.php using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'bargraph.php', true);
    xhr.responseType = 'blob';

    xhr.onload = function() {
        // Convert the blob response to a data URL
        var reader = new FileReader();
        reader.onloadend = function() {
            // Set the data URL as the source of the <img> tag
            document.getElementById('bar-graph-image').src = reader.result;
        };
        reader.readAsDataURL(xhr.response);
    };

    xhr.send();
}    
    // Function to update the pie chart image
    function updatePieChart() {
        // Fetch the pie chart image from piechart.php using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'piechart.php', true);
        xhr.responseType = 'blob';

        xhr.onload = function() {
            // Convert the blob response to a data URL
            var reader = new FileReader();
            reader.onloadend = function() {
                // Set the data URL as the source of the <img> tag
                document.getElementById('pie-chart-image').src = reader.result;
            };
            reader.readAsDataURL(xhr.response);
        };

        xhr.send();
    }

    // Call the function to update the pie chart when the page loads
    window.onload = function() {
    updateBarGraph();  // Call the function to update the bar graph
    updatePieChart();  // Call the function to update the pie chart
};
</script>
    <script src="Admin/assets/js/perfect-scrollbar.min.js"></script>
    <script src="Admin/assets/js/bootstrap1.bundle.min.js"></script>
    <script src="Admin/assets/js/apexcharts.js"></script>
    <script src="Admin/assets/js/dashboard.js"></script>

    <script src="Admin/assets/js/main.js"></script>
</body>

</html>