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
		
		return preg_match('/^[a-zA-Z\s\'-]+$/', $name) === 1;
	}
	
	public function getAllUsers() {
        $users = [];
        
        $sqlUsers = "SELECT *, 'User' as role FROM users";
        $resultUsers = $this->db->query($sqlUsers);
        
        while ($row = $resultUsers->fetch_assoc()) {
            $row['status'] = 'Active'; 
            $row['registration_date'] = $row['birthdate']; 
            $users[] = $row;
        }
        

        $sqlHealthcare = "SELECT *, 'Healthcare Provider' as role FROM healthcare";
        $resultHealthcare = $this->db->query($sqlHealthcare);
        
        while ($row = $resultHealthcare->fetch_assoc()) {
            $row['status'] = 'Active'; 
            $row['registration_date'] = $row['birthdate']; 
            $users[] = $row;
        }
        
        return $users;
    }
	public function searchUsers($searchQuery, $role = 'All Roles', $status = 'All Status') {
        $users = [];
        
        // Build queries based on search parameters
        $userQuery = "SELECT *, 'User' as role FROM users WHERE 1=1";
        $healthcareQuery = "SELECT *, 'Healthcare Provider' as role FROM healthcare WHERE 1=1";
        
        if (!empty($searchQuery)) {
            $searchTerm = $this->db->real_escape_string($searchQuery);
            $userQuery .= " AND name LIKE '%$searchTerm%'";
            $healthcareQuery .= " AND name LIKE '%$searchTerm%'";
        }
        
        // Execute queries based on role filter
        if ($role === 'All Roles' || $role === 'User') {
            $resultUsers = $this->db->query($userQuery);
            while ($row = $resultUsers->fetch_assoc()) {
                $row['status'] = 'Active';
                $row['registration_date'] = $row['birthdate'];
                $users[] = $row;
            }
        }
        
        if ($role === 'All Roles' || $role === 'Healthcare Provider') {
            $resultHealthcare = $this->db->query($healthcareQuery);
            while ($row = $resultHealthcare->fetch_assoc()) {
                $row['status'] = 'Active';
                $row['registration_date'] = $row['birthdate'];
                $users[] = $row;
            }
        }
        
        return $users;
    }

}
?>
