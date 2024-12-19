<?php
require_once '../Models/model.php';
require_once '../Controllers/Controller.php';
require_once '../Models/Admin.php';
require_once '../db/config.php';

require_once '../db/dp.php';
class AdminController extends Controller{
	private $db;
	protected $model;
    public function construction() {
        $this->model = new Admin();
    }

    public function __construct() {
        $this->db = new DBh();
    }

    public function deleteUserByName($userName) {
        $sql = "DELETE FROM users WHERE name = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("s", $userName);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
	public function addUser($name, $password, $email, $birthdate, $gender, $phone) {
		$sql = "INSERT INTO healthcare (name, password, email, birthdate, gender, phone) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $this->db->getConn()->prepare($sql);
		$stmt->bind_param("ssssss", $name, $password, $email, $birthdate, $gender, $phone);
		
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function userExists($userName) {
       
        $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE name = ?");
        $stmt->execute([$userName]);
        return $stmt->fetchColumn() > 0;
    }
	public function isValidName($name) {
		// This regex allows letters, spaces, hyphens, and apostrophes
		return preg_match('/^[a-zA-Z\s\'-]+$/', $name) === 1;
	}
	
	
}
?>
