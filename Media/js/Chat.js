const chatbotToggler = document.querySelector(".chatbot-toggler");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const inputInitHeight = chatInput.scrollHeight;

// List of common symptoms to check against
const symptomKeywords = [
  "fever", "headache", "cough", "fatigue", "nausea", "vomiting", "chills", "muscle pain", "sore throat", "shortness of breath", "chest pain"
];

const createChatLi = (message, className) => {
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", className);
  let chatContent = className === "outgoing" ? "<p></p>" : '<span class="material-symbols-outlined">smart_toy</span><p></p>';
  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};

// Function to extract keywords (symptoms) from the user's message
const extractSymptoms = (message) => {
  const lowercasedMessage = message.toLowerCase();
  return symptomKeywords.filter(symptom => lowercasedMessage.includes(symptom));
};

const handleChat = () => {
  const userMessage = chatInput.value.trim();
  if (!userMessage) return;
  chatInput.value = "";
  chatInput.style.height = `${inputInitHeight}px`;
  chatbox.appendChild(createChatLi(userMessage, "outgoing"));
  chatbox.scrollTo(0, chatbox.scrollHeight);

  // Extract symptoms from the user's message
  const symptoms = extractSymptoms(userMessage);

  if (symptoms.length === 0) {
    // If no symptoms were detected, ask the user to provide symptoms
    const incomingChatLi = createChatLi("Sorry, I couldn't detect any symptoms. Please provide more specific symptoms.", "incoming");
    chatbox.appendChild(incomingChatLi);
    chatbox.scrollTo(0, chatbox.scrollHeight);
    return;
  }

  // Send the symptoms to the server
  fetch('/Medira/Controllers/ChatController.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded', // Use x-www-form-urlencoded
    },
    body: new URLSearchParams({
        symptoms: symptoms.join(',') // Symptoms as a string joined by commas
    })
})
.then(response => response.text())  // Read raw response first
.then(text => {
    console.log("Server response:", text);  // Log the server's raw response
    const incomingChatLi = createChatLi("Sorry, there was an error processing your request.", "incoming");

    try {
        if (text) {
            let responseMessage = text;

            // Check if the response includes "Urgency"
            if (responseMessage.includes("Urgency:")) {
                // Correctly format urgency (e.g., apply styling)
                responseMessage = responseMessage.replace("Urgency: Very High", "<span class='urgency high'>Urgency: Very High</span>");
            }

            incomingChatLi.querySelector("p").innerHTML = responseMessage;
        } else {
            incomingChatLi.querySelector("p").textContent = "Sorry, there was an error processing your request.";
        }
    } catch (error) {
        console.error("Error processing response:", error);
        incomingChatLi.querySelector("p").textContent = "Sorry, there was an error processing your request.";
    }

    chatbox.appendChild(incomingChatLi);
    chatbox.scrollTo(0, chatbox.scrollHeight);
})
.catch(error => {
    console.error('Error:', error);
    const incomingChatLi = createChatLi("Sorry, there was an error processing your request.", "incoming");
    chatbox.appendChild(incomingChatLi);
    chatbox.scrollTo(0, chatbox.scrollHeight);
});

};

chatInput.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});

sendChatBtn.addEventListener("click", handleChat);
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
