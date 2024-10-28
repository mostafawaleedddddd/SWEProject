fetch('NavBar.html')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.text();
      })
      .then(data => {
        document.getElementById('navbar').innerHTML = data;
      })
      .catch(error => console.error('Error loading the navbar:', error));

      // Get references to the necessary DOM elements
const feedbackButton = document.getElementById('feedbackButton'); // This button should exist to open the feedback form
const feedbackModal = document.getElementById('feedbackModal'); // This modal should wrap your feedback form
const closeModal = document.getElementById('closeModal'); // Close button inside the modal
const feedbackForm = document.querySelector('.feedback-form'); // Select the feedback form

// Event listener to open the feedback modal
if (feedbackButton) {
    feedbackButton.addEventListener('click', function() {
        feedbackModal.style.display = 'flex'; // Show the modal
    });
}

// Event listener to close the feedback modal
if (closeModal) {
    closeModal.addEventListener('click', function() {
        feedbackModal.style.display = 'none'; // Hide the modal
    });
}

// Event listener to handle form submission
if (feedbackForm) {
    feedbackForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        // You can add code here to send the feedback data to your server
        const email = feedbackForm.querySelector('.feedback-form__email').value;
        const message = feedbackForm.querySelector('.feedback-form__message').value;
        
        // For demonstration purposes, show an alert with the submitted data
        alert(`Feedback submitted!\nEmail: ${email}\nMessage: ${message}`);
        
        feedbackModal.style.display = 'none'; // Close the modal after submission
        feedbackForm.reset(); // Reset the form fields
    });
}
