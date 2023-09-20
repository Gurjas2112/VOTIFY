// Sample data (you should fetch this from your server)
const feedbackData = [
    {
        id: 1,
        userName: "User1",
        date: "2023-09-01",
        content: "This is feedback 1.",
        status: "unresolved",
    },
    {
        id: 2,
        userName: "User2",
        date: "2023-09-02",
        content: "This is feedback 2.",
        status: "resolved",
    },
    // Add more feedback items here...
];

const feedbackList = document.getElementById("feedback-list");


// Function to display feedback items
function displayFeedback() {
    feedbackList.innerHTML = "";
    feedbackData.forEach((feedback) => {
        const listItem = document.createElement("li");
        listItem.innerHTML = `
            <strong>${feedback.userName}</strong> (${feedback.date}): ${feedback.content} 
            <span>Status: ${feedback.status}</span>
            <button class="resolve-button" data-id="${feedback.id}">Mark as Resolved</button>
        `;
        feedbackList.appendChild(listItem);
    });
}

// Initial display of feedback
displayFeedback();
