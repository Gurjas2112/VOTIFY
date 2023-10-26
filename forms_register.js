document.addEventListener("DOMContentLoaded", function () {
  // Function to validate Full Name
  function validateName() {
    const nameInput = document.getElementById("name");
    const nameError = document.getElementById("name-error");
    const nameSuccess = document.getElementById("name-success");
    const nameRegex = /^[A-Z\s]+$/; // Allow letters and spaces in the name

    nameInput.addEventListener("input", function () {
      const name = this.value.trim();

      if (name === "") {
        displayError(nameError, "Full Name is required");
        clearSuccess(nameSuccess);
      } else if (!nameRegex.test(name)) {
        clearError(nameSuccess);
        displayError(nameError, "Invalid characters in Full Name");
      } else {
        clearError(nameError);
        displaySuccess(nameSuccess, "Valid Full Name entered");
      }
    });
  }

  // Function to validate Aadhar Card Number
  function validateAadhar() {
    const aadharInput = document.getElementById("aadhar_no");
    const aadharError = document.getElementById("aadhar-error");
    const aadharSuccess = document.getElementById("aadhar-success");
    const aadharRegex = /^\d{12}$/; // Aadhar should be 12 digits

    aadharInput.addEventListener("input", function () {
      if (!aadharRegex.test(this.value)) {
        displayError(aadharError, "Aadhar number should be 12 digits.");
        clearSuccess(aadharSuccess);
      } else {
        clearError(aadharError);
        displaySuccess(aadharSuccess, "Valid Aadhar number entered");
      }
    });
  }

  // Function to validate Phone Number
  function validatePhoneNumber() {
    const phoneNumberInput = document.getElementById("mobile_no");
    const phoneNumberError = document.getElementById("number-error");
    const phoneNumberSuccess = document.getElementById("number-success");
    const phoneNumberRegex = /^\+91\d{10}$/; // Phone number should start with +91 and be followed by 10 digits

    phoneNumberInput.addEventListener("input", function () {
      if (!phoneNumberRegex.test(this.value)) {
        displayError(
          phoneNumberError,
          "Mobile number should start with '+91' and be followed by 10 digits."
        );
        clearSuccess(phoneNumberSuccess);
      } else {
        clearError(phoneNumberError);
        displaySuccess(phoneNumberSuccess, "Valid mobile number entered");
      }
    });
  }

  // Function to calculate age based on Date of Birth
  const dobInput = document.getElementById("dob");
  const ageInput = document.getElementById("age");
  const ageError = document.getElementById("age-error");
  const ageSuccess = document.getElementById("age-success");

  dobInput.addEventListener("change", () => {
    const dob = new Date(dobInput.value);
    const age = calculateAge(dob);

    if (isNaN(age) || age < 18 || age > 100) {
      ageInput.value = "NaN"; // Display "NaN" for invalid ages
      ageError.textContent = "Age must be between 18 and 100";
      ageSuccess.textContent = "";
    } else {
      ageError.textContent = "";
      ageSuccess.textContent = "Valid age entered";
      ageInput.value = age;
    }
  });

  function calculateAge(dob) {
    const now = new Date();
    const diff = now.getTime() - dob.getTime();
    const ageDate = new Date(diff);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
  }


  // Function to display an error message
  function displayError(element, message) {
    element.textContent = message;
    element.style.color = "red";
  }

  // Function to clear an error message
  function clearError(element) {
    element.textContent = "";
  }

  // Function to display a success message
  function displaySuccess(element, message) {
    element.textContent = message;
    element.style.color = "green";
  }

  // Function to clear a success message
  function clearSuccess(element) {
    element.textContent = "";
  }

  // Initialize validation functions
  validateName();
  validateAadhar();
  validatePhoneNumber();
  calculateAge();

  // Function to check if there are errors on the page
  function hasErrors() {
    const errorElements = document.querySelectorAll(".error");
    return Array.from(errorElements).some(
      (errorElement) => errorElement.textContent.trim() !== ""
    );
  }

  // Add event listener for the "Save and Next" button
  const saveAndNextButton = document.getElementById("step1-save-and-next");
  saveAndNextButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Check if there are errors on the page or empty fields
    if (hasErrors() || !validateEmptyFields()) {
      alert("Please correct the errors and fill in all fields before proceeding.");
    } else {
      // Move to the next step
      moveToNextStep(1); // Move to Step 2 when the button is clicked
    }
  });

  // Function to validate empty fields
  function validateEmptyFields() {
    const inputs = document.querySelectorAll("input[required]");
    let isValid = true;

    inputs.forEach((input) => {
      if (input.value.trim() === "") {
        isValid = false;
      }
    });

    return isValid;
  }

  // Function to clear all error messages on the page
  function clearAllErrors() {
    const errorElements = document.querySelectorAll(".error");
    errorElements.forEach((errorElement) => (errorElement.textContent = ""));
  }

  // Add event listener for the "Previous" button in Step 2
  document.getElementById("step1-previous").addEventListener("click", function (event) {
    event.preventDefault();
    moveToNextStep(1);
  });

  // Add event listener for the "Save and Next" button in Step 2
  document.getElementById("step2-save-and-next").addEventListener("click", function (event) {
    event.preventDefault();
    clearAllErrors(); // Clear all error messages
    moveToNextStep(2); // Move to Step 3 in this example, change to moveToNextStep(2) if you want to move to Step 2
  });

  // Move to the next step function (You can implement this logic here)
  function moveToNextStep(currentStep) {
    // Determine the next step (you can customize this logic)
    const nextStep = currentStep + 1;

    // Hide the current step
    const currentFormStep = document.getElementById(`step${currentStep}`);
    currentFormStep.style.display = "none";

    // Show the next step
    const nextFormStep = document.getElementById(`step${nextStep}`);
    nextFormStep.style.display = "block";

    // Update the progress bar (if you have one)
    updateProgressBar(currentStep, nextStep);
  }

  function updateProgressBar(currentStep, nextStep) {

    // Remove the "active" class from the current step
    const currentStepElement = document.querySelector(`.step.step${currentStep}`);
    currentStepElement.classList.remove("active");

    // Add the "active" class to the next step
    const nextStepElement = document.querySelector(`.step.step${nextStep}`);
    nextStepElement.classList.add("active");
  }
});