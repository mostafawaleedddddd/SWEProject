<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);  // Display errors
error_reporting(E_ALL);  // Report all errors

require_once("../db/dp.php");

class ChatController
{
    private $db;

    public function __construct()
    {
        $this->db = new DBh();
    }

    public function getMedicalAdvice($symptoms)
    {
        try {
            // Sanitize input
            foreach ($symptoms as &$symptom) {
                $symptom = $this->db->getConn()->real_escape_string(trim($symptom));
            }
    
            // Build the SQL query
            $sql = "SELECT * FROM medical_conditions WHERE ";
            $conditions = [];
            foreach ($symptoms as $symptom) {
                $conditions[] = "JSON_CONTAINS(symptoms, '\"$symptom\"')";
            }
            $sql .= implode(' OR ', $conditions); // Use OR to match any symptom
    
            // Log the query being executed (for debugging)
            error_log("SQL Query: " . $sql);
    
            // Prepare the query
            $stmt = $this->db->getConn()->prepare($sql);
    
            if (!$stmt) {
                error_log("SQL Error: " . $this->db->getConn()->error);
                return 'Database error: ' . $this->db->getConn()->error;  // Log detailed error
            }
    
            // Execute the query
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $matches = [];
                while ($row = $result->fetch_assoc()) {
                    $matches[] = [
                        'advice' => $row['advice'],
                        'urgency' => $row['urgency'],
                        'specialist' => $row['specialist']
                    ];
                }
    
                // Initialize response string
                $response = "";
                foreach ($matches as $index => $match) {
                    if ($index > 0) {
                        $response .= "\n\n";  // Add space between each result
                    }
    
                    // Clean up advice and urgency fields
                    $advice = !empty($match['advice']) ? htmlspecialchars(trim($match['advice'])) : "No advice available";
                    $urgency = !empty($match['urgency']) ? htmlspecialchars(trim($match['urgency'])) : "Urgency not specified";
                    $specialist = !empty($match['specialist']) ? htmlspecialchars(trim($match['specialist'])) : "No specialist recommended";
    
                    // Format response with proper line breaks and ensure no duplicate "Urgency" text
                    $response .= "Advice: " . $advice . "\n";
                    $response .= "Urgency: " . $urgency . "\n";
                    $response .= "Specialist: " . $specialist;
                }
    
                return $response;  // Return formatted advice
            } else {
                return 'No matching symptoms found.';
            }
        } catch (Exception $e) {
            error_log("Error in getMedicalAdvice: " . $e->getMessage());
            return 'Server error: ' . $e->getMessage();
        }
    }
    



    public function handleRequest()
    {
        // Check if POST data is available
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST['symptoms'];  // Get symptoms from the form data
            if ($data) {
                $symptoms = explode(',', $data);  // Convert the symptoms string to an array
                $response = $this->getMedicalAdvice($symptoms);
                echo $response;  // Send back the response as plain text
            } else {
                echo "No symptoms provided.";
            }
        } else {
            echo "Invalid request method.";
        }
    }
}

// Instantiate and handle the request
$controller = new ChatController();
$controller->handleRequest();
?>