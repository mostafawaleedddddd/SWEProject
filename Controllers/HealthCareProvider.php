<?php
require_once 'HealthCare.php'; 

class DiscussionController {
    
    public function submitResponse() {
           $discussionId = $_POST['discussion_id'] ?? null; // ID of the discussion/question
        $response = $_POST['response'] ?? null;          // Response text
        $providerUsername = $_POST['username'] ?? null;  // Healthcare provider username

        // Validate input
        if (!$discussionId || !$response || !$providerUsername) {
            echo json_encode(["status" => "error", "message" => "Missing required fields."]);
            return;
        }

        // Create a healthcare provider instance (replace with actual data retrieval logic if needed)
        $healthcareProvider = new HealthCare("Dr. Smith", "123456789", "Male", "1980-05-20", $providerUsername, "password123");

        // Call the model function to save the response
        $result = $healthcareProvider->respondToQuestion($discussionId, $response);

        // Return feedback to the client
        if ($result === "Response saved successfully!") {
            echo json_encode(["status" => "success", "message" => $result]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to save the response."]);
        }
    }
}

// Simulate a request to the controller (for testing purposes)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new DiscussionController();
    $controller->submitResponse();
}
?>
