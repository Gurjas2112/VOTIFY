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
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Fetch the user's information
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Database connection or query error
    // Handle the error appropriately (e.g., display an error message)
    echo "Database error: " . $e->getMessage();
}

// Now, you can retrieve and display the documents for users where is_admin=0
$documentInfo = []; // Initialize an array to store document data

try {
    // Prepare a SQL statement to retrieve document information for users where is_admin=0
    $documentStmt = $pdo->prepare("SELECT id, adhardoc, photodoc, RegistrationStatus FROM users WHERE is_admin = 0");
    $documentStmt->execute();

    // Fetch the document information
    $documentInfo = $documentStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle the error appropriately
    echo "Error retrieving document information: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Verification Page</title>

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
                          <a href="Admin-Admin_Dashboard.php"><img src="Admin/assets/images/logo/logo1.png" alt="" srcset="">Votify</a>
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
						
						<li class="sidebar-item  ">
                            <a href="Admin-User_Management.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>User Management</span>
                            </a>
                        </li>
						
						<li class="sidebar-item active">
                            <a href="Admin-Documents_Verify.php" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Documents Verification</span>
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
                            <h3>Documents</h3>
                            <p class="text-subtitle text-muted">Verify Documents of User</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Admin-Admin_Dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Documents Verification</li>
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
                                <th>User ID</th>
                                <th>Candidate Aadhar card</th>
                                <th>Candidate Photo</th>
                                <th>Candidate Registration Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($documentInfo as $document) {
                                echo '<tr>';
                                echo '<td>VOT00' . $document['id'] . '</td>';
                                echo '<td>' . $document['adhardoc'] . '</td>';
                                echo '<td>' . $document['photodoc'] . '</td>';
                                echo '<td><span class="badge bg-success">' . $document['RegistrationStatus'] . '</span></td>';
                                echo '</tr>';
                            }
                            ?>
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