// script.js

// Function to toggle chatbot display
function toggleChatbot() {
    const chatbox = document.getElementById("chatbox");
    chatbox.classList.toggle("show");
  }
  
  // Function to handle user input and bot responses
  function handleUserInput() {
    const userInput = document.getElementById("user-input").value;
    const chatHistory = document.getElementById("chat-history");
  
    // Display user message
    const userMessageElement = document.createElement("div");
    userMessageElement.classList.add("user-message");
    userMessageElement.textContent = "You: " + userInput;
    chatHistory.appendChild(userMessageElement);
  
    // Handle bot response
    const botResponse = getBotResponse(userInput);
    const botMessageElement = document.createElement("div");
    botMessageElement.classList.add("bot-message");
    botMessageElement.textContent = "Bot: " + botResponse;
    chatHistory.appendChild(botMessageElement);
  
    // Clear input field
    document.getElementById("user-input").value = "";
  }
  
  // Function to get bot response based on user input
  function getBotResponse(userInput) {
    // Convert user input to lowercase for case-insensitive comparison
    const input = userInput.toLowerCase();
  
    // Simple if-else statements to determine bot response
    if (input.includes("hello") || input.includes("hi")) {
      return "Hello! How can I assist you today?";
    } else if (input.includes("help")) {
      return "Sure, I'm here to help. What do you need assistance with?";
    } else if (input.includes("bye")) {
      return "Goodbye! Have a great day!";
    } else {
      return "I'm sorry, I didn't understand that. Can you please rephrase?";
    }
  }
  
  // Event listener for the button click to toggle chatbot display
  document.getElementById("chatbot-toggle").addEventListener("click", toggleChatbot);
  
  // Event listener for the user input submission
  document.getElementById("user-input-form").addEventListener("submit", function (event) {
    event.preventDefault();
    handleUserInput();
  });
  
  // Function to toggle chatbot display
function toggleChatbot() {
    const chatbox = document.getElementById("chatbox");
    chatbox.classList.toggle("show");
  }
  
  // Event listener for the button click to toggle chatbot display
  document.getElementById("chatbot-toggle").addEventListener("click", toggleChatbot);