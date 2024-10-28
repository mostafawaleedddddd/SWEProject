document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    // Get the values from the input fields
    const email = this.querySelector('.feedback-form__email').value;
    const message = this.querySelector('.feedback-form__message').value;

    // Create a new feedback element
    const feedbackItem = document.createElement('div');
    feedbackItem.classList.add('feedback-item');
    feedbackItem.innerHTML = `<strong>${email}</strong>: <p>${message}</p>`;

    // Append the new feedback to the feedback list
    document.getElementById('feedbackList').appendChild(feedbackItem);

    // Clear the form fields
    this.reset();
});