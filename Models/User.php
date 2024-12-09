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
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            birthdate DATE NOT NULL,
            gender VARCHAR(10) NOT NULL,
            phone VARCHAR(20) NOT NULL
        )";
        if ($this->db->query($sql)) {
            echo "Table initialized successfully.<br>";
        } else {
            die("Error initializing table: " . $this->db->getConn()->error);
        }
    }

    // Insert a new user
    public function insertUser($name, $password, $email, $birthdate, $gender, $phoneno) {
        $sql = "INSERT INTO users (name, password, email, birthdate, gender, phone) 
                VALUES ('$name', '$password', '$email', '$birthdate', '$gender', '$phoneno')";
        if ($this->db->query($sql)) {
            echo "User added successfully!";
        } else {
            echo "Error: " . $this->db->getConn()->error;
        }
    }
}
?>

