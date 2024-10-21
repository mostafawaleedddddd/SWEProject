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
function validateLogin(){
    var data = document.getElementById("email").value;
    var data2=document.getElementById("password").value;
    if(validateUsernameAndPassword(data,data2)){
      var submitResponse;
      $.ajax({
          url: '/user/checkUser',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({ Email: data ,Password: data2}),
          async: false,
          success: function (response) {
              if (response == 'Success') {
                submitResponse=true;
              }
              else{
                alert("*Incorrect Username or Password")
                submitResponse=false;
              }
          }
      });
      return submitResponse;
    }else{
      alert("*Incorrect Username or Password")
      return false;
    }
  }
  function validateUsernameAndPassword(email,password){
    //Validating Email
    if(!(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email))){
      return false;
    }
    //Validating password
    if (password.length < 8 || !/[A-Z]/.test(password) 
      || !/[a-z]/.test(password) ||!/\d/.test(password) 
      || !/[!@#$%^&*()\-_=+{};:,<.>]+/.test(password)) {
      return false;
    }
    return true;
  }