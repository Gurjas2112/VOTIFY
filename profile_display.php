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
    $stmt = $pdo->prepare("SELECT username, photodoc FROM users WHERE id = :user_id");
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

     <!--Chatbot css-->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">-->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/user_profile.css">

    <title>Votify</title>
    <style>
    /* Style for the user profile dropdown container */
.user-profile-dropdown {
    position: relative;
    display: inline-block;
    margin-right: 20px; /* Add margin for spacing */
}

/* Style for the user profile dropdown content */
.user-profile-dropdown .dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    top: 50px; /* Adjust the vertical position as needed */
    right: 0; /* Adjust the horizontal position as needed */
}

/* Style for dropdown items (links) */
.user-profile-dropdown .dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change the link color on hover */
.user-profile-dropdown .dropdown-content a:hover {
    background-color: #f1f1f1;
}

/* Show the dropdown content when the user hovers over the container */
.user-profile-dropdown:hover .dropdown-content {
    display: block;
}

/* Style for the profile picture */
.user-profile-dropdown img {
    border-radius: 50%;
    margin-right: 10px; /* Add spacing between username and picture */
}

    </style>

    <script>
    // Get the user profile dropdown element
    var userProfileDropdown = document.querySelector('.user-profile-dropdown');

    // Add a click event listener to toggle the dropdown
    userProfileDropdown.addEventListener('click', function () {
        var dropdownContent = this.querySelector('.dropdown-content');
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    });
</script>
      

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" data-aos="fade-down">
        <div class="container">
            <a class="logo" href="#home"><img src="img/logo1.jpg" height="80" width="30"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">


                <ul class="navbar-nav ms-auto">
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
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
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact  </a>
                       
                    </li>
        
                
                    <li class="nav-item">
            <!-- HTML for User Profile Dropdown -->
<!-- HTML for User Profile Dropdown -->
<div class="user-profile-dropdown">
        <span>Welcome, <?php echo $user_info['username']; ?></span>
        <img src="<?php echo $user_info['photodoc']; ?>" alt="Profile" class="rounded-circle" style = "width:50px;height:40px;">
        <!-- Add a link to log out if desired -->
        <a href="logout.php">Logout</a>
    </div>
    




                      </li>

                </ul>
            </div>
        </div>
    </nav>



    <!--hero-->
    
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
                    <a href="dashboard-mainpage.php" data-aos="fade-up" class="btn btn-main">Register Now</a>
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

    

    <!--contact-->
    <section id="contact" class="bg-cover text-white" style="background-image: url(img/cover_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>Get in touch</h1>
                    <div class="divider"></div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto" data-aos="fade-up">
                <form action="contact.php" method="POST" class="row g-4">
                        <div class="form-group col-md-6">
                            <input name="full_name"type="text" class="form-control" placeholder="Full name">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="email"type="email" class="form-control" placeholder="Email address">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-main" type="submit">Send Message</button>
                        </div>
                    </form><br>
                    <h3><center>Any Queries?</center></h3>
                    <p><center>Let our Chatbot be your helpful companion as you register to vote and participate in the democratic process.<br> We are here to make the journey easier and more accessible for you!</center></p><br>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"  data-aos="fade-up"></div>
                   
                    <hr class="my-4">
                    <p class="mb-4"><center>Have questions or need support? Feel free to reach out to us via phone or email. We are here to assist you!</center></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mx-auto text-center">
                    <i class="icon-phone"></i>
                    <p>123-456-7890</p>
                </div>
                <div class="col-lg-4 mx-auto text-center">
                    <i class='bx bxl-facebook-circle'></i>
                    <p>Votify</p>
                </div>
                
                <div class="col-lg-4 mx-auto text-center">
                    <i class="icon-envelope"></i>
                    <p>info@votify.com</p>
                </div>
            </div>
        </div>
   
<!-- Chatbot button -->
   
<style type="text/css">
       /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  background: #E3F2FD;
}
.chatbot-toggler {
  position: fixed;
  bottom: 30px;
  right: 35px;
  outline: none;
  border: none;
  height: 50px;
  width: 50px;
  display: flex;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: #724ae8;
  transition: all 0.2s ease;
}
body.show-chatbot .chatbot-toggler {
  transform: rotate(90deg);
}
.chatbot-toggler span {
  color: #fff;
  position: absolute;
}
.chatbot-toggler span:last-child,
body.show-chatbot .chatbot-toggler span:first-child  {
  opacity: 0;
}
body.show-chatbot .chatbot-toggler span:last-child {
  opacity: 1;
}
.chatbot {
  position: fixed;
  right: 35px;
  bottom: 90px;
  width: 420px;
  background: #fff;
  border-radius: 15px;
  overflow: hidden;
  opacity: 0;
  pointer-events: none;
  transform: scale(0.5);
  transform-origin: bottom right;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
  transition: all 0.1s ease;
}
body.show-chatbot .chatbot {
  opacity: 1;
  pointer-events: auto;
  transform: scale(1);
}
.chatbot header {
  padding: 16px 0;
  position: relative;
  text-align: center;
  color: #fff;
  background: #724ae8;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
.chatbot header span {
  position: absolute;
  right: 15px;
  top: 50%;
  display: none;
  cursor: pointer;
  transform: translateY(-50%);
}
header h2 {
  font-size: 1.4rem;
}
.chatbot .chatbox {
  overflow-y: auto;
  height: 510px;
  padding: 30px 20px 100px;
}
.chatbot :where(.chatbox, textarea)::-webkit-scrollbar {
  width: 6px;
}
.chatbot :where(.chatbox, textarea)::-webkit-scrollbar-track {
  background: #fff;
  border-radius: 25px;
}
.chatbot :where(.chatbox, textarea)::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 25px;
}
.chatbox .chat {
  display: flex;
  list-style: none;
}
.chatbox .outgoing {
  margin: 20px 0;
  justify-content: flex-end;
}
.chatbox .incoming span {
  width: 32px;
  height: 32px;
  color: #fff;
  cursor: default;
  text-align: center;
  line-height: 32px;
  align-self: flex-end;
  background: #724ae8;
  border-radius: 4px;
  margin: 0 10px 7px 0;
}
.chatbox .chat p {
  white-space: pre-wrap;
  padding: 12px 16px;
  border-radius: 10px 10px 0 10px;
  max-width: 75%;
  color: #fff;
  font-size: 0.95rem;
  background: #724ae8;
}
.chatbox .incoming p {
  border-radius: 10px 10px 10px 0;
}
.chatbox .chat p.error {
  color: #721c24;
  background: #f8d7da;
}
.chatbox .incoming p {
  color: #000;
  background: #f2f2f2;
}
.chatbot .chat-input {
  display: flex;
  gap: 5px;
  position: absolute;
  bottom: 0;
  width: 100%;
  background: #fff;
  padding: 3px 20px;
  border-top: 1px solid #ddd;
}
.chat-input textarea {
  height: 55px;
  width: 100%;
  border: none;
  outline: none;
  resize: none;
  max-height: 180px;
  padding: 15px 15px 15px 0;
  font-size: 0.95rem;
}
.chat-input span {
  align-self: flex-end;
  color: #724ae8;
  cursor: pointer;
  height: 55px;
  display: flex;
  align-items: center;
  visibility: hidden;
  font-size: 1.35rem;
}
.chat-input textarea:valid ~ span {
  visibility: visible;
}

@media (max-width: 490px) {
  .chatbot-toggler {
    right: 20px;
    bottom: 20px;
  }
  .chatbot {
    right: 0;
    bottom: 0;
    height: 100%;
    border-radius: 0;
    width: 100%;
  }
  .chatbot .chatbox {
    height: 90%;
    padding: 25px 15px 100px;
  }
  .chatbot .chat-input {
    padding: 5px 15px;
  }
  .chatbot header span {
    display: block;
  }
}
        </style>
        <script type="text/javascript">

document.addEventListener("DOMContentLoaded", function () {
    const chatbotToggler = document.querySelector(".chatbot-toggler");
    const closeBtn = document.querySelector(".close-btn");
    const chatbox = document.querySelector(".chatbox");
    const chatInput = document.querySelector(".chat-input textarea");
    const sendChatBtn = document.querySelector(".chat-input span");

    const inputInitHeight = chatInput.scrollHeight;

    // Event listener for sending chat messages
    function handleChat() {
        const userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
        if (!userMessage) return;

        // Clear the input textarea and set its height to default
        chatInput.value = "";
        chatInput.style.height = `${inputInitHeight}px`;

        // Append the user's message to the chat-box
        appendChatMessage(userMessage, "outgoing");

        // Send the user's message to the server using fetch
        sendUserMessageToServer(userMessage);

        // Simulate a bot response (you can replace this with actual bot logic)

    }

    // Function to append chat messages to the chat-box
    function appendChatMessage(message, className) {
        const chatLi = document.createElement("li");
        chatLi.classList.add("chat", className);
        let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
        chatLi.innerHTML = chatContent;
        chatLi.querySelector("p").textContent = message;
        chatbox.appendChild(chatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
    }

    // Function to send user's message to the server using fetch
    function sendUserMessageToServer(message) {
        fetch("process_message.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ userMessage: message })
        })
        .then(function(response) {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(function(data) {
            // Handle the success response here (bot's reply)
            appendChatMessage(data.botResponse, "incoming");
        })
        .catch(function(error) {
            // Handle the error here
            console.error(error);
        });
    }

    // Event listeners
    chatInput.addEventListener("input", () => {
        // Adjust the height of the input textarea based on its content
        chatInput.style.height = `${inputInitHeight}px`;
        chatInput.style.height = `${chatInput.scrollHeight}px`;
    });

    chatInput.addEventListener("keydown", (e) => {
        // If Enter key is pressed without Shift key and the window width is greater than 800px, handle the chat
        if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
            e.preventDefault();
            handleChat();
        }
    });

    sendChatBtn.addEventListener("click", handleChat);
    closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
    chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
});

            </script>
<!-- Chatbot button -->
<button class="chatbot-toggler">
      <span class="material-symbols-rounded">Chat</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there 👋<br>How can I help you today?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>


</section>

       
    <!--footer-->
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0"><a href="privacy_policy.php">
                        Copyright © 2023-2024.
</a></p>
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