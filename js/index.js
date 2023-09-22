document.addEventListener("DOMContentLoaded", function () {
  const formOpenBtn = document.querySelector("#form-open");
  const home = document.querySelector(".home");
  const formContainer = document.querySelector(".form_container");
  const formCloseBtn = document.querySelector(".form_close");
  const signupBtn = document.querySelector("#signup");
  const loginBtn = document.querySelector("#login");
  const recoveryBtn = document.querySelector("#recovery");
  // const otpBtn = document.querySelector("#otp");
  // const pwresetBtn = document.querySelector("#pwreset");

  // Function to show the login form and apply shadowy effect
  function showLoginForm() {
    home.classList.add("show");
    document.body.classList.add("login-active");
    // Add shadowy effect to homepage
    home.style.boxShadow = "0 0 20px rgba(0, 0, 0, 0.5)";
  }

  // Function to close the login form and remove shadowy effect
  function closeLoginForm() {
    home.classList.remove("show");
    document.body.classList.remove("login-active");
    // Remove shadowy effect from homepage
    home.style.boxShadow = "none";
  }

  formOpenBtn.addEventListener("click", showLoginForm);

  formCloseBtn.addEventListener("click", closeLoginForm);

  // Close the login form if the user clicks outside the form container
  formContainer.addEventListener("click", (e) => {
    if (!e.target.closest(".form_container")) {
      closeLoginForm();
    }
  });

  pwShowHide.forEach((icon) => {
    icon.addEventListener("click", () => {
      let getPwInput = icon.parentElement.querySelector("input");
      if (getPwInput.type === "password") {
        getPwInput.type = "text";
        icon.classList.replace("uil-eye-slash", "uil-eye");
      } else {
        getPwInput.type = "password";
        icon.classList.replace("uil-eye", "uil-eye-slash");
      }
    });
  });

// Form Functions

 
  signupBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.add("signup");
  });
  
  loginBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.remove("signup");
  });
  
  
  recoveryBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.add("recovery");
  });
  
  loginBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.remove("recovery");
  });
  
  signupBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.remove("recovery");
  });
  
  /*
  otpBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.add("otp");
  });

  
  pwresetBtn.addEventListener("click", (e) => {
    e.preventDefault();
    formContainer.classList.add("pwreset");
  });
  */

  // Event listener for Home navigation link
  document.querySelector(".nav_link.home").addEventListener("click", () =>
    showSection(".home")
  );

  // Event listener for About navigation link
  document.querySelector(".nav_link.about").addEventListener("click", () =>
    showSection("#about")
  );

  // Event listener for Services navigation link
  document.querySelector(".nav_link.services").addEventListener("click", () =>
    showSection("#services")
  );

  // Event listener for Testimonials navigation link
  document
    .querySelector(".nav_link.testimonials")
    .addEventListener("click", () => showSection("#testimonials"));

  // Event listener for FAQ navigation link
  document.querySelector(".nav_link.faq").addEventListener("click", () =>
    showSection("#faq")
  );
});

const toggleDropdown = () => {
  const navbarResponsive = document.getElementById("navbarResponsive");
  navbarResponsive.classList.toggle("show");
};

// Close the dropdown menu if a menu item is clicked
const closeDropdown = () => {
  const navbarResponsive = document.getElementById("navbarResponsive");
  navbarResponsive.classList.remove("show");
};

// Event listener for hamburger button click
document.querySelector(".navbar-toggler").addEventListener("click", toggleDropdown);

// Event listener for menu item click
document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("click", closeDropdown);
});