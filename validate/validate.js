// Utility functions for validation checks
function notEmptyCheck(value) {
    return value !== '';
}

function nameValid(value) {
    return /^[a-zA-Z\s]+$/.test(value);
}

function emailValid(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
}

function phoneNumberValid(value) {
    return /^[\d]{10}$/.test(value);
}

function locationValid(value) {
    return /^[a-zA-Z0-9\s]+$/.test(value);
}

// Function to set error
function setError(element, message) {
    const formInput = element.parentElement; // Select the parent .form-input div
    const errorMessage = formInput.querySelector('.errormessage');
    
    // Add the error class and set the error message
    formInput.classList.add('error');
    formInput.classList.remove('success');
    errorMessage.innerText = message;
}

// Function to set success
function setSuccess(element) {
    const formInput = element.parentElement; // Select the parent .form-input div
    const errorMessage = formInput.querySelector('.errormessage');
    
    // Add the success class and clear the error message
    formInput.classList.add('success');
    formInput.classList.remove('error');
    errorMessage.innerText = '';
}

// Validation functions for different fields
function validateName(input, title) {
    if (!notEmptyCheck(input.value)) {
        setError(input, 'Please enter your ' + title);
        return false;
    } else if (!nameValid(input.value)) {
        setError(input, 'Please enter a valid ' + title);
        return false;
    } else {
        setSuccess(input);
        return true;
    }
}

function validateEmail(input, title) {
    if (!notEmptyCheck(input.value)) {
        setError(input, 'Please enter your ' + title);
        return false;
    } else if (!emailValid(input.value)) {
        setError(input, 'Please enter a valid ' + title);
        return false;
    } else {
        setSuccess(input);
        return true;
    }
}

function validatePhone(input, title) {
    if (!notEmptyCheck(input.value)) {
        setError(input, 'Please enter your ' + title);
        return false;
    } else if (!phoneNumberValid(input.value)) {
        setError(input, 'Please enter a valid ' + title);
        return false;
    } else {
        setSuccess(input);
        return true;
    }
}

function validateLocation(input, title) {
    if (!notEmptyCheck(input.value)) {
        setError(input, 'Please enter your ' + title);
        return false;
    } else if (!locationValid(input.value)) {
        setError(input, 'Please enter a valid ' + title);
        return false;
    } else {
        setSuccess(input);
        return true;
    }
}

// Main form validation function
function validateForm(form) {
    const Name = form['Name'];
    const Email = form['email'];
    const phoneNumber = form['phone-number'];
    const Location = form['location'];

    let error = true;

    error &= validateName(Name, 'Name');
    error &= validateEmail(Email, 'Email');
    error &= validatePhone(phoneNumber, 'Phone number');
    error &= validateLocation(Location, 'Location');
   
    // If any validation fails, prevent form submission
    return !!error; // Convert to boolean (true/false)
}

// Function to allow only digits in phone input
function digitKeyOnly(e) {
    const keyCode = e.keyCode === 0 ? e.charCode : e.keyCode;
    if ((keyCode >= 37 && keyCode <= 40) || keyCode === 8 || keyCode === 9 || keyCode === 13 || (keyCode >= 48 && keyCode <= 57)) {
        return true; // Allow navigation, delete, tab, enter, and number keys
    }
    return false; // Block other keys
}
