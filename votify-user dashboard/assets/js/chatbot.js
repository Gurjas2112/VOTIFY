document.addEventListener("DOMContentLoaded", function () {
    const chatbotToggler = document.querySelector(".chatbot-toggler");
    const closeBtn = document.querySelector(".close-btn");
    const chatbox = document.querySelector(".chatbox");
    const chatInput = document.querySelector(".chat-input textarea");
    const sendChatBtn = document.querySelector(".chat-input span");

    const inputInitHeight = chatInput.scrollHeight;

    // Event listener for sending chat messages
    function handleChat() {
        const userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
        if (!userMessage) return;

        // Clear the input textarea and set its height to default
        chatInput.value = "";
        chatInput.style.height = `${inputInitHeight}px`;

        // Append the user's message to the chat-box
        appendChatMessage(userMessage, "outgoing");

        // Send the user's message to the server using fetch
        sendUserMessageToServer(userMessage);

        // Simulate a bot response (you can replace this with actual bot logic)

    }

    // Function to append chat messages to the chat-box
    function appendChatMessage(message, className) {
        const chatLi = document.createElement("li");
        chatLi.classList.add("chat", className);
        let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
        chatLi.innerHTML = chatContent;
        chatLi.querySelector("p").textContent = message;
        chatbox.appendChild(chatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
    }

    // Function to send user's message to the server using fetch
    function sendUserMessageToServer(message) {
        fetch("process_message.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ userMessage: message })
        })
        .then(function(response) {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(function(data) {
            // Handle the success response here (bot's reply)
            appendChatMessage(data.botResponse, "incoming");
        })
        .catch(function(error) {
            // Handle the error here
            console.error(error);
        });
    }

    // Event listeners
    chatInput.addEventListener("input", () => {
        // Adjust the height of the input textarea based on its content
        chatInput.style.height = `${inputInitHeight}px`;
        chatInput.style.height = `${chatInput.scrollHeight}px`;
    });

    chatInput.addEventListener("keydown", (e) => {
        // If Enter key is pressed without Shift key and the window width is greater than 800px, handle the chat
        if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
            e.preventDefault();
            handleChat();
        }
    });

    sendChatBtn.addEventListener("click", handleChat);
    closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
    chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
});