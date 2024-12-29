<?php
require_once '../Models/Person.php';
require_once '../Models/model.php';
class User extends Person {
    private $db;

    public function __construct() {
        $this->db = new DBh();
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

