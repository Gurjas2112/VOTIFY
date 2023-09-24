document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('multistep-form');
  const saveAndNextButtons = document.querySelectorAll('.btn-next');
  const prevButtons = document.querySelectorAll('.btn-prev');
  const saveButton = document.querySelector('.btn-save');
  const previewButton = document.querySelector('.btn-pre');

  // Add a variable to keep track of the current step
  let currentStep = 1;

  saveAndNextButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      if (validateFormStep(currentStep, form)) {
        moveToNextStep(form);
      }
    });
  });

  prevButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      moveToPrevStep(form);
    });
  });

  saveButton.addEventListener('click', function (e) {
    e.preventDefault();
    if (validateFormStep(currentStep, form)) {
      alert('Form is saved!');
    }
  });

  previewButton.addEventListener('click', function (e) {
    e.preventDefault();
    if (validateFormStep(currentStep, form)) {
      alert('Form is ready for submission!');
    }
  });

  function validateFormStep(step, form) {
    const currentStepElement = form.querySelector(`.form-step[data-step="${step}"]`);
    const inputs = currentStepElement.querySelectorAll('input[required], select[required], textarea[required]');
    let isValid = true;

    inputs.forEach((input) => {
      if (!isValidInput(input)) {
        isValid = false;
      }
    });

    if (!isValid) {
      alert(`Please fill the required details of step ${step}`);
    }

    return isValid;
  }

  function moveToNextStep(form) {
    currentStep++;
    const currentStepElement = form.querySelector(`.form-step[data-step="${currentStep}"]`);
    currentStepElement.classList.add('form-step-active');
    updateProgressBar(currentStepElement);
  }

  function moveToPrevStep(form) {
    const currentStepElement = form.querySelector(`.form-step[data-step="${currentStep}"]`);
    currentStepElement.classList.remove('form-step-active');
    currentStep--;
    const prevStepElement = form.querySelector(`.form-step[data-step="${currentStep}"]`);
    prevStepElement.classList.add('form-step-active');
    updateProgressBar(prevStepElement);
  }

  function updateProgressBar(step) {
    const stepTitle = step.getAttribute('data-title');
    const progress = document.getElementById('progress');
    progress.style.width = step.style.width;
    progress.innerHTML = stepTitle;
  }
});
