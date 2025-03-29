<?php
header("Content-Type: application/json");

// Get the user message from the request
$data = json_decode(file_get_contents("php://input"), true);
$userMessage = $data["message"] ?? "";

// Function to simulate AI response (Replace with actual AI model API)
function getAIResponse($message) {
    // Simple rule-based responses (for testing)
    $responses = [
        "hello" => "Hello! How can I help you?",
        "how are you" => "I'm just a program, but I'm doing great! 😊",
        "bye" => "Goodbye! Have a great day!",
        "default" => "I'm not sure I understand. Can you rephrase?"
    ];

    // Return a predefined response or a default one
    $message = strtolower(trim($message));
    return $responses[$message] ?? $responses["default"];
}

// Generate AI response
$aiReply = getAIResponse($userMessage);

// Return JSON response
echo json_encode(["reply" => $aiReply]);
?>
