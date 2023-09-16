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