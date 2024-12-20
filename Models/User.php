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
        // Create ContactUs table
          $sql = "CREATE TABLE IF NOT EXISTS ContactUs (
              id INT AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(100) NOT NULL,
              username VARCHAR(100) NOT NULL,
              message TEXT NOT NULL,
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
          )";
          
          if (!$this->db->query($sql)) {
              die("Error initializing ContactUs table: " . $this->db->getConn()->error);
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

