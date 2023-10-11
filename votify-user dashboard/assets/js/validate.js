document.addEventListener("DOMContentLoaded", function () {
  function moveToNextStep(step) {
    let isValid = true;
    
    if (step === 1) {
      // Step 1 Validation
      const nameInput = document.getElementById("name");
      const aadharInput = document.getElementById("aadhar_no");
      const mobileNumberInput = document.getElementById("mobile_number");
      const dobInput = document.getElementById("inputDate");
      const addressInput = document.getElementById("address");

      if (
        nameInput.value.trim() === "" ||
        aadharInput.value.trim() === "" ||
        mobileNumberInput.value.trim() === "" ||
        dobInput.value.trim() === "" ||
        addressInput.value.trim() === ""
      ) {
        alert("Please fill in all the required fields in Step 1.");
        isValid = false;
      }
    } else if (step === 2) {
      // Step 2 Validation (if needed)
      const citizenshipStatusInput = document.querySelector(
        'input[name="gridRadios"]:checked'
      );
      const countryOfCitizenshipInput = document.querySelector(
        '#multistep-form select[name="countryOfCitizenship"]'
      );

      if (!citizenshipStatusInput || !countryOfCitizenshipInput.value) {
        alert("Please fill in all the required fields in Step 2.");
        isValid = false;
      }
    } else if (step === 3) {
      // Step 3 Validation (if needed)
      // Implement validation for Step 3 fields here
      const identityProofInput = document.getElementById("identity_proof");
      const residencyProofInput = document.getElementById("residency_proof");
      const signatureInput = document.getElementById("signature");
      const socialSecurityInput = document.getElementById("social_security");
  
      if (
        !isValidFile(identityProofInput) ||
        !isValidFile(residencyProofInput) ||
        !isValidFile(signatureInput) ||
        !isValidSocialSecurity(socialSecurityInput.value)
      ) {
        return false;
      }
    }

    if (isValid) {
      // Move to the next step
      const formSteps = document.querySelectorAll(".form-step");
      formSteps[step - 1].classList.remove("form-step-active");
      formSteps[step].classList.add("form-step-active");

      // Update the progress bar
      const progressSteps = document.querySelectorAll(".progress-step");
      progressSteps[step - 1].classList.remove("progress-step-active");
      progressSteps[step].classList.add("progress-step-active");
    }
  }

  // Your existing JavaScript functions (e.g., check_name, check_Aadhar, etc.) go here.

  function check_name() {
    // Get the input element by its ID
    const nameInput = document.getElementById("name");

    // Get the value entered by the user
    const name = nameInput.value.trim(); // Trim removes leading/trailing whitespace

    // Regular expression for a valid name (allow letters and spaces)
    const nameRegex = /^[A-Za-z\s]+$/;

    // Check if the name is valid
    if (!nameRegex.test(name)) {
      // Display an error message (you can customize this part)
      alert("Invalid name. Please enter a valid name.");

      // Clear the input field (optional)
      nameInput.value = "";

      // Set focus back to the input field (optional)
      nameInput.focus();
    }
  }

  function check_Aadhar() {
    const aadharInput = document.getElementById("aadhar_no");
    const aadharRegex = /^\d{12}$/; // Matches 12 digits

    if (!aadharRegex.test(aadharInput.value)) {
      alert("Aadhaar Card Number should be 12 digits.");
      aadharInput.value = ""; // Clear the input field
    }
  }

  function check_no() {
    const mobileNumberInput = document.getElementById("mobile_number");
    const phoneNumberRegex = /^\+91\d{10}$/; // Matches +91 followed by 10 digits

    if (!phoneNumberRegex.test(mobileNumberInput.value)) {
      alert("Phone number should start with '+91' and be 10 digits.");
      mobileNumberInput.value = ""; // Clear the input field
    }
  }

  function checkAge() {
    var dobInput = document.getElementById("inputDate");
    var dob = new Date(dobInput.value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();

    if (
      today.getMonth() < dob.getMonth() ||
      (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())
    ) {
      age--;
    }

    if (age < 18) {
      alert("You are not eligible to Register.");
    }
  }

  function checkAddress() {
    // Get the input element by its ID
    const addressInput = document.getElementById("address");

    // Get the value entered by the user
    const address = addressInput.value.trim(); // Trim removes leading/trailing whitespace

    // Define the maximum allowed length for the address (e.g., 20 words)
    const maxAddressLength = 20;

    // Check if the address is empty or exceeds the maximum length
    if (address === "" || countWords(address) > maxAddressLength) {
      // Display an error message (you can customize this part)
      alert("Invalid address. Please enter a valid address (up to 20 words).");

      // Clear the input field (optional)
      addressInput.value = "";

      // Set focus back to the input field (optional)
      addressInput.focus();
    }
  }

  // Function to count the number of words in a string
  function countWords(str) {
    return str.split(/\s+/).filter(function (word) {
      return word !== "";
    }).length;
  }


});