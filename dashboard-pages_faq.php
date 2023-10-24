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

  <title>F.A.Q - Votify</title>
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
  
  <!--Chatbot css-->
    <!-- Custom CSS-->
	<link rel="stylesheet" href="votify-user dashboard/assets/css/chatbot.css">
 

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

        <!--<li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>--><!-- End Search Icon-->

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
          </a><!-- End Profile Iamge Icon --><!-- End Profile Iamge Icon -->

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
        <a class="nav-link collapsed" href="dashboard-users_profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="dashboard-pages_faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Frequently Asked Questions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-mainpage.php">Home</a></li>
         
          <li class="breadcrumb-item active">Frequently Asked Questions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
      <div class="row">
        <div class="col-lg-12">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Basic Questions</h5>
              <div class="content">
                <div>
                  <h6>1.What are the main categories of electors in India?</h6>
                  <p>There are 3 categories of electors in India: <br>
                    (i) General electors
                    (ii) Oversees (NRI) electors  
                    (iii) Service Electors</p>
                </div>
          
                <div class="pt-2">
                  <h6>2. Who is eligible to be registered as a general elector?</h6>
                  <p> Every Indian citizen who has attained the age of 18 years on the qualifying date i.e. first day of January of the year of revision of electoral roll, unless otherwise disqualified, is eligible to be registered as a voter in the roll of the part/polling area of the constituency where he is ordinarily resident.</p>
                </div>
          
                <div class="pt-2">
                  <h6>3. Can a non-citizen of India become a voter in the electoral rolls in India?</h6>
                  <p>No.  A person who is not a citizen of India is not eligible for registration as a voter in the electoral rolls in India. Even those who have ceased to be citizens of India on acquiring the citizenship of another country are not eligible to be enrolled in the electoral rolls in India.</p>
                </div>

                <div class="pt-2">
                  <h6>4. Can a non-resident Indian settled in foreign land become an elector of electoral roll in India?</h6>
                  <p>Yes. According to the provisions of Sec 20A of the Representation of People Act, 1950 by the Representation of the People (Amendment) Act, 2010, a person who is a citizen of India and who has not acquired the citizenship of any other country and is otherwise eligible to be registered as a voter and who is absenting from his place of ordinary residence in India owing to his employment, education or otherwise is eligible to be registered as a voter in the constituency in which his place of residence in India as mentioned in his passport is located.</p>
                </div>

                <div class="pt-2">
                  <h6>5.Is a documentary proof of age required in cases where age of the applicant is more than 21 years?</h6>
                  <p> Documentary proof of age is required only in those cases, where age of the applicant is between 18 and 21 years. In all other cases, declaration of his age by the applicant will be taken as proof of age.</p>
                </div>

                <div class="pt-2">
                  <h6>6.Who can object to the inclusion of names in electoral rolls?</h6>
                  <p>Any person who is a voter in the concerned constituency may object to the inclusion of names in electoral roll on the ground that the person whose names is included or is proposed to be included is not eligible to be registered as a voter in that constituency. An objection can be made in Form 7 to the concerned Electoral Registration Officer along with the relevant proof.</p>
                </div>

                <div class="pt-2">
                  <h6>7.A homeless person, who is otherwise eligible for registration as an elector, does not possess documentary proof of ordinary residence. What is the procedure of verification in such case?</h6>
                  <p> In case of homeless persons, the Booth Level Officer will visit the address given in Form 6 at night to ascertain that the homeless person actually sleeps at the place which is given as his address in Form 6. If the Booth Level Officer is able to verify that the homeless person actually sleeps at that place, no documentary proof of place of residence shall be necessary. Booth Level Officer must visit for more than one night for such verification.</p>
                </div>

                
              </div>
              <div class="read-more">
                <button class="btn btn-link">Read More</button>
              </div>
            </div>
          </div>
          </div>
          

          <!-- F.A.Q Group 1 -->
          <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Elections</h5>

              <div class="accordion accordion-flush" id="faq-group-1">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                      How are candidates nominated for an election?
                    </button>
                  </h2>
                  <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Candidates can be nominated by political parties, organizations, or as independent candidates. The nomination process may involve gathering signatures, paying fees, and fulfilling legal requirements.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                      What is a polling station?
                    </button>
                  </h2>
                  <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      A polling station is a designated location where eligible voters go to cast their votes on election day. It is set up to ensure a secure and organized voting process.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                      How is voter eligibility verified?
                    </button>
                  </h2>
                  <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Voter eligibility is verified through various means, including voter registration, identification requirements, and cross-referencing voter lists.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-4" type="button" data-bs-toggle="collapse">
                      What is a recount?
                    </button>
                  </h2>
                  <div id="faqsOne-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      A recount is a process where votes are counted again to ensure accuracy, especially if the initial results are very close or if there are concerns about the integrity of the election.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-5" type="button" data-bs-toggle="collapse">
                      What is a runoff election?
                    </button>
                  </h2>
                  <div id="faqsOne-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      A runoff election occurs when no candidate receives a majority of the votes in the initial election. The top two candidates then face off in a second round of voting.
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 1 -->

        </div>

        <div class="col-lg-6">

          

          <!-- F.A.Q Group 3 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Voter Registration</h5>

              <div class="accordion accordion-flush" id="faq-group-3">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-1" type="button" data-bs-toggle="collapse">
                      What documents do I need to provide for voter registration?

                    </button>
                  </h2>
                  <div id="faqsThree-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      The required documents can vary by jurisdiction, but you may need to provide proof of citizenship, residency, and identity.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-2" type="button" data-bs-toggle="collapse">
                      Can I update my voter registration information?
                    </button>
                  </h2>
                  <div id="faqsThree-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      Yes, you can typically update your voter registration information if you move, change your name, or other relevant details.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-3" type="button" data-bs-toggle="collapse">
                      How do I know if my voter registration is successful?
                    </button>
                  </h2>
                  <div id="faqsThree-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      After registering, you might receive a confirmation notice by mail or email. You can also often check your registration status online.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-4" type="button" data-bs-toggle="collapse">
                      Can I register to vote if I am an international student or non-citizen resident?
                    </button>
                  </h2>
                  <div id="faqsThree-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      Voter eligibility often requires citizenship, so international students and non-citizen residents may not be eligible to register.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-5" type="button" data-bs-toggle="collapse">
                      Do I need to re-register for every election?
                    </button>
                  </h2>
                  <div id="faqsThree-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                      In some places, your voter registration remains valid for multiple elections. However, it's important to check the specific rules in your jurisdiction.
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 3 -->

        </div>

      </div>
	  <!-- Chatbot button -->
   <div id="chatbox1" class="chatbox1">
    <button class="chatbot-toggler">
      <span class="material-symbols-rounded"><!--mode_comment<i class="bi bi-chat-left-text-fill"></i><!--<i class="bi bi-chat-fill"></i>--><i class="bi bi-chat"></i></span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <!--<span class="material-symbols-outlined"></span>-->
          <p>Hi there 👋 How can I help you today?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
       <!-- <span id="send-btn" class="material-symbols-rounded">send</span>-->
		<button type="submit" class="material-symbols-rounded">Send</button>
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

 <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>-->

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
  <!-- Add your chatbot script here -->
   <script src="votify-user dashboard/assets/js/chatbot.js" defer></script>

</body>

</html>