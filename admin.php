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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/line-icons.css">
    <link rel="stylesheet" href="css/homepage.css">


<style>
    /* Import Google Fonts (Replace 'Your-Font' with the desired font name) */
@import url('https://fonts.googleapis.com/css2?family=Your-Font&display=swap');

/* Style for the admin profile button */
.admin-profile-btn {
    font-family: 'Your-Font', sans-serif; /* Use the imported Google Font */
    cursor: pointer;
}

/* Style for the dropdown content */
.admin-dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Style for the list items */
.admin-dropdown-content ul {
    list-style: none;
    padding: 0;
}

.admin-dropdown-content ul li {
    padding: 10px;
    text-align: center;
}

/* Hover effect for the button */
.admin-profile:hover .admin-dropdown-content {
    display: block;
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>

    <title>Votify</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

   <!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" data-aos="fade-down">

<div class="container"> <!-- Wrap the content in a container for center alignment -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reviews">Reviews</a>
            </li>
        </ul>

        <!-- Admin Profile Dropdown -->
        <div class="admin-profile ml-3"> <!-- Add margin to separate it from the other links -->
            <button class="admin-profile-btn" value="<?php echo $user_info['username']; ?>">Admin Profile</button>
            <div class="admin-dropdown-content">
                <ul> <!-- Wrap the list items in a <ul> element -->
                    <li><a href="Admin-Admin_Dashboard.php">Admin Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</nav>



      <script>
    const adminProfileBtn = document.querySelector(".admin-profile-btn");
    const adminDropdownContent = document.querySelector(".admin-dropdown-content");

    adminProfileBtn.addEventListener("click", function() {
        adminDropdownContent.style.display = adminDropdownContent.style.display === "block" ? "none" : "block";
    });
</script>
    
    <section id="home" class="bg-cover hero-section" style="background-image: url(img/cover_1.jpg);">
        <div class="overlay"></div>
        <div class="container text-white text-center">
            <div class="row">
                <div class="col-12">
                    
                    <h2 class="display-4" data-aos="zoom-in">Votify Is Here<br></h2>
                       <h3> "Empowering Voices and Enriching Democracy"</h3>
                    <p class="my-4" data-aos="fade-up">With Votify, you can easily register as a voter, securely upload required documents, and receive real-time updates on upcoming elections.
                    <br>  Our personalized voter guide ensures you have all the necessary information about the candidates and ballot measures relevant to your district.
                       </p>
                    
                </div>
            </div>
        </div>
    </section>

    <!--services-->
    <section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>Our Services</h1>
                    <div class="divider"></div>
                    <p>Votify is a platform dedicated to simplifying the voter registration process and empowering citizens to participate in elections.<br>
                        We are committed to providing an exceptional user experience,
                        incorporating advanced features to streamline the registration process and <br>access essential election information.
                    </p>
                </div>
            </div>
            <div class="row g-4">
<div class="col-md-6 col-lg-3 text-center" data-aos="zoom-in">
             <!--<div class="col-md-4" data-aos="zoom-in">-->
                    <div class="service">
                        <div class="service-img">
                            <!--<img src="img/image_1.jpg" alt="">-->
                            
                            <div class="icon"><i class="icon-profile-male"></i></div>
                        </div>
                        <h5 class="mt-5 pt-4"><br>Easy Voter <br>Registration</h5>
                        <p>Registering to vote has never been simpler! Our user-friendly platform guides you through the registration process step by step. Fill out the required information, and you'll be all set to exercise your right to vote in no time.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center" data-aos="zoom-in">
                
                    <div class="service">
                        <div class="service-img">
                            <!--<img src="img/image_2.jpg" alt="">-->
                            <div class="icon"><i class="icon-upload"></i></div>
                        </div>
                        <h5 class="mt-5 pt-4"><br>Quick Document <br>Upload</h5>
                        <p>Securely upload your identification documents and proof of residence using our advanced document verification system. Rest assured that your information is safe and protected in compliance with all applicable data security regulations.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center" data-aos="zoom-in">
                    <div class="service">
                        <div class="service-img">
                            <!--<img src="img/image_3.jpg" alt="">-->
                            <div class="icon"><i class="icon-clock"></i></div>
                        </div>
                        <h5 class="mt-5 pt-4"><br>Real Time Election <br>Information</h5>
                        <p>Stay up-to-date with real-time election updates, including dates, times, and locations for upcoming elections in your area. Get notified about registration deadlines, voting hours, and any changes or announcements related to the elections.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 text-center" data-aos="zoom-in">
                    <div class="service">
                        <div class="service-img">
                            <!--<img src="img/image_3.jpg" alt="">-->
                            <div class="icon"><i class="icon-document"></i></div>
                        </div>
                        <h5 class="mt-5 pt-4"><br>Personalized <br>Voter Guide</h5>
                        <p>Access your personalized voter guide that provides comprehensive information about candidates running for various positions in the upcoming elections. Know more about their background, positions, and campaign promises to make informed decisions when voting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--about-->
    <section id="about" class="bg-cover" style="background-image: url(img/cover_1.jpg);">
        <div class="overlay"></div>
        <div class="container text-white text-center">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>About Votify</h1>
                    <div class="divider"></div>
                    <p>Our team of experts is committed to providing an exceptional user experience and ensuring that our platform remains up to date
                       with the<br> latest technological advancements. We prioritize security and privacy, ensuring that user data is protected and never compromised.
                    </p>
                </div>
            </div>
        </div>

                    <div class="container text-white ">
                        <div class="row">
                            <div class="col-lg-8 mx-auto text-left" data-aos="fade-up">
                                <h5 class="section-heading"><center>Our Values</center></h5>
                                <hr class="my-4">
                                
                                <ul>
                                    <li><strong>Accessibility:</strong> We believe in making voter registration accessible to all, regardless of age, location, or background.</li>
                                    <li><strong>Integrity:</strong> We uphold the highest standards of integrity, transparency, and ethics in all our interactions and operations.</li>
                                    <li><strong>Innovation:</strong> We continuously strive to innovate and improve our platform to better serve our users and address their needs effectively.</li>
                                    <li><strong>Community:</strong> We value community engagement and actively work to foster a sense of belonging and collaboration among our users and partners.</li>
                                    <li><strong>Impact:</strong> We measure our success by the positive impact we create on voter participation and democratic engagement.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
              
            
    </section>

    <!--Blog-->

    <section id="blog" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>Our Blog Posts</h1>
                    <div class="divider"></div>
                    
                </div>
            </div>
            <div class="row text-start">
                <div class="col-md-4" data-aos="fade-up">
                    <img src="img/blog_post1.jpg" alt="">
                    <div class="mt-4">
                        <small><a href="#">Posted on</a> 12 June 2023</small>
                        <h5 class="mt-1 mb-2"><a href="#">CEC Rajiv Kumar participates in 11th meeting of Executive Board of Association</a></h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <img src="img/blog_post2.jpg" alt="">
                    <div class="mt-4">
                        <small><a href="#">Posted on</a>, 20 July 2023</small>
                        <h5 class="mt-1 mb-2"><a href="#">Dr. Anup Chandra Pandey Hon'ble Election Commissioner of India visits Uzbekistan to observe early Presidential Elections.</a></h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <img src="img/blog_post3.jpg" alt="">
                    <div class="mt-4">
                        <small><a href="#">Posted on</a>, 30 July 2023</small>
                        <h5 class="mt-1 mb-2"><a href="#">Political Parties will now be able to file financial accounts online with EC for opening web-portal for filling reports.</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>




   
    <!--Election Updates-->

    <section id="about" class="bg-cover" style="background-image: url(img/cover_1.jpg);">
        <div class="overlay"></div>
        <div class="container text-white text-center">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>Elections Updates</h1>
                    <div class="divider"></div>
                    <p>Stay informed about the upcoming elections in your area. Find out the dates, locations, 
                        <br>and other important details about the elections that you can participate in.
                    </p>
                    <a href="election_info.php" data-aos="fade-up" class="btn btn-main">Click For Updates</a>
                </div>
                
                <div class="overlay"></div>
        <div class="container text-white text-center">
            <div class="row gy-4" data-aos="fade-up">
                <div class="col-md-2">
                    <i class="icon-profile-male h1"></i>
                    
                    <p>Candidates/Political<br>Parties</p>

                </div>
                <div class="col-md-2">
                    <i class="icon-map-pin h1"></i>
                    
                    <p>Polling <br>Locations</p>
                </div>
                <div class="col-md-2">
                    <i class="icon-paperclip h1"></i>
                   
                    <p>Voter ID<br>Requirements</p>
                </div>
                <div class="col-md-2">
                    <i class="icon-search h1"></i>
                    
                    <p>Upcoming Elections</p>
                </div>
                <div class="col-md-2">
                    <i class="icon-tools h1"></i>
                 
                    <p>Frequently Asked<br>Questions</p>
                </div>
                <div class="col-md-2">
                    <i class="icon-newspaper h1"></i>
                    
                    <p>Election News</p>
                </div>
            </div>
        </div>


            </div>
        </div>
    </section>




   

    <!--reviews-->
    <section id="reviews" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center">
                    <h1>Testimonials</h1>
                    <div class="divider"></div>
                    
                </div>
            </div>
            <div class="row g-4 text-start">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        <!--<div class="person">
                            <img src="img/avatar_1.jpg" alt="">
                            <div class="text ms-3">
                                <h6 class="mb-0">John Walker</h6>
                                <small>Google</small>
                            </div>
                        </div>-->
                        <p class="pt-4">I had the opportunity to use this voting website during the recent elections, and I must say it exceeded my expectations. The platform provided a seamless experience, allowing me to cast my vote quickly and securely.<br><i>-Vedant Sharma, Andhra Pradesh</i></p>
                        
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                       
                        <p class="pt-4">I appreciated the transparency and accessibility of the voting results, which were promptly displayed after the completion of the voting process. This voting website has restored my faith in online voting.<br><i>-Shruti Jadhav, Maharashtra</i></p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        
                        <p class="pt-4">The website's GUI is modern, visually appealing, and easy to understand. It provides all the necessary information about the candidates or options, helping me make informed decisions.<br><i>-Gurpreet Kaur, Punjab</i></p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        
                        <p class="pt-4">As an active participant in community initiatives, I have utilized numerous voting websites in the past, but none have impressed me as much as this one.<br><i>-Neelam Mehta, Gujarat</i> </p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        
                        <p class="pt-4">The website is well-designed and intuitive, making it easy for me to navigate and select my preferred choices.<br><i>-Sakshi Patil, Maharashtra</i></p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        
                        <p class="pt-4">I have been using this voting website for several months now, and I am incredibly impressed with its user-friendly interface and efficient voting process. <br><i>-Anuj Shetty, Hyderabad</i>
                        </p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

   <hr/>


    <style>
    /* Define a CSS class for the footer */
    .py4 {
        background-color: blue; /* Set the background color to blue */
        color: white; /* Set the text color to white */
        padding: 20px 0; /* Add some padding to the top and bottom of the footer */
    }
</style>

    <!--footer-->
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0"><a href="privacy_policy.php" >
                        Copyright © 2023-24. </a></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div>
                        <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-dribbble'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/app.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/user_profile.js"></script>
    <!-- Add your chatbot script here -->
</body>

</html>