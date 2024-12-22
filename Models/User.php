<?php
require_once '../Models/Person.php';
require_once '../Models/model.php';
class User {
    private $db;

    public function __construct() {
        $this->db = new DBh();
        $this->initializeTables();
    }

    // Create the `users` table if it doesn't exist
    private function initializeTables() {
        // Create Forum table
        $sql = "CREATE TABLE IF NOT EXISTS forum (
            id INT AUTO_INCREMENT PRIMARY KEY,
            parent_comment INT DEFAULT NULL,
            student VARCHAR(100) NOT NULL,
            post TEXT NOT NULL,
            date DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (parent_comment) REFERENCES forum(id) ON DELETE CASCADE
        )";
    
        if (!$this->db->query($sql)) {
            die("Error initializing forum table: " . $this->db->getConn()->error);
        }
    }
    // Insert a new user
    public function insertUser($name, $password, $email, $birthdate, $gender, $phoneno) {
        $sql = "INSERT INTO users (name, password, email, birthdate, gender, phone) 
                VALUES ('$name', '$password', '$email', '$birthdate', '$gender', '$phoneno')";
        if ($this->db->query($sql)) {
           
        } else {
            $this->db->getConn()->error;
        }
    }
}
?>

