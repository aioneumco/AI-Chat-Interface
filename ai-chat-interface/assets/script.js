async function sendMessage() {
    let userInput = document.getElementById("user-input").value;
    if (userInput.trim() === "") return;

    // Display user message in chat box
    let chatBox = document.getElementById("chat-box");
    chatBox.innerHTML += `<p><strong>You:</strong> ${userInput}</p>`;

    // Send message to backend
    let response = await fetch("backend.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ message: userInput })
    });

    let result = await response.json();

    // Display AI response
    chatBox.innerHTML += `<p><strong>AI:</strong> ${result.reply}</p>`;

    // Clear input field
    document.getElementById("user-input").value = "";

    // Scroll chat box to bottom
    chatBox.scrollTop = chatBox.scrollHeight;
}
