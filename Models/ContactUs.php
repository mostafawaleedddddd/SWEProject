<?php
require_once '../Models/model.php';
class Contact {
    private $name;
    private $message;
    private $username;
    private $timestamps;
    private $db;
    
    public function __construct($name, $message, $username) {
        $this->db = new DBh();
        $this->setName($name);
        $this->setMessage($message);
        $this->setUsername($username);
        $this->timestamps = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    
        // Prepare the SQL statement
        $sql = "INSERT INTO ContactUs (name, username, message) VALUES (?, ?, ?)";
        $stmt = $this->db->getConn()->prepare($sql);
    
        if (!$stmt) {
            throw new Exception("Error preparing SQL statement: " . $this->db->getConn()->error);
        }
    
        // Retrieve the values and store in variables
        $nameValue = $this->getName();
        $usernameValue = $this->getUsername();
        $messageValue = $this->getMessage();
    
        // Bind variables to the prepared statement
        $stmt->bind_param("sss", $nameValue, $usernameValue, $messageValue);
    
        if (!$stmt->execute()) {
            throw new Exception("Error inserting contact message: " . $stmt->error);
        }
    
        $stmt->close();
    }
    
    public function setName($name) {
        // Simple name validation: letters, spaces, and some special characters
        if (preg_match("/^[a-zA-Z\s'-]{2,50}$/", $name)) {
            $this->name = $name;
        } else {
            throw new Exception("Invalid name format.");
        }
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setMessage($message) {
        // Allow more characters in message including punctuation and line breaks
        if (strlen($message) >= 1 && strlen($message) <= 1000) {
            $this->message = $message;
        } else {
            throw new Exception("Message must be between 1 and 1000 characters.");
        }
    }
    
    public function getMessage() {
        return $this->message;
    }
    
    public function setUsername($username) {
        // Email format validation
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $this->username = $username;
        } else {
            throw new Exception("Invalid email format.");
        }
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getTimestamps() {
        return $this->timestamps;
    }
    
    public function updateTimestamps() {
        $this->timestamps['updated_at'] = date('Y-m-d H:i:s');
    }
}
?>