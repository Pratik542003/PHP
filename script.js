document.getElementById('submitButton').addEventListener('click', validateForm);

  function validateForm() {
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const reviewInput = document.getElementById('review');

    clearErrors();

    if (!validateName(nameInput.value)) {
      showError('name', 'Name should be less than 20 characters');
    }

    if (!validateEmail(emailInput.value)) {
      showError('email', 'Invalid email address');
    }

    if (!validatePhone(phoneInput.value)) {
      showError('phone', 'Phone number should be 10 digits');
    }

    if (!validateReview(reviewInput.value)) {
      showError('review', 'Review should be less than 100 words');
    }

    if (isFormValid()) {
      alert('Form submitted successfully!');
      document.getElementById('myForm').reset();
    }
  }

  function validateReview(review) {
    // Split the review into words and check if the count is less than or equal to 100
    return review.trim().split(/\s+/).length <= 100;
  }

  function showError(field, message) {
    const errorElement = document.getElementById(`${field}Error`);
    errorElement.textContent = message;
    errorElement.classList.add('error');
  }

  function clearErrors() {
    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => {
      element.textContent = '';
      element.classList.remove('error');
    });
  }

  function isFormValid() {
    return document.querySelectorAll('.error').length === 0;
  }

  