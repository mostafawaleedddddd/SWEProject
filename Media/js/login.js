function validateForm(event) {
    event.preventDefault(); // Prevent form submission
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const phoneNumber = document.getElementById("phoneNumber").value;
    const email = document.getElementById("email").value;
    const form = event.target; // Grab the form reference

    // Check if passwords match
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // Check password strength
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Password must be at least 8 characters long, contain at least one uppercase letter, one special character, and one number.");
        return false;
    }

    // Check phone number length
    if (phoneNumber.length < 10) {
        alert("Phone number must be at least 11 digits long.");
        return false;
    }

    // Asynchronous AJAX request to check if the email exists
    $.ajax({
        url: '/user/checkUser',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ Email: email, Password: password }),
        success: function (response) {
            if (response == 'Success') {
                alert("*Email already exists or credentials issue.");
            } else {
                // Email is valid, submit the form
                form.submit(); // Manually submit the form
            }
        },
        error: function () {
            alert("There was an issue connecting to the server.");
        }
    });

    // Return false here to prevent premature form submission
    return false;
}