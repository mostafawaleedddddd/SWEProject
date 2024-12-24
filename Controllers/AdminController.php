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
public function deleteUserByName($userName){
    try {
        // First check which table contains the user
        $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
        
        // Check healthcare table
        $stmt = $db->prepare("SELECT COUNT(*) FROM healthcare WHERE name = ?");
        $stmt->execute([$userName]);
        $healthcareCount = $stmt->fetchColumn();
        
        // Check users table
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE name = ?");
        $stmt->execute([$userName]);
        $usersCount = $stmt->fetchColumn();
        
        // Delete from appropriate table
        if ($healthcareCount > 0) {
            $stmt = $db->prepare("DELETE FROM healthcare WHERE name = ?");
            $stmt->execute([$userName]);
            return true;
        } elseif ($usersCount > 0) {
            $stmt = $db->prepare("DELETE FROM users WHERE name = ?");
            $stmt->execute([$userName]);
            return true;
        }
        
        // User not found in either table
        return false;
        
    } catch (PDOException $e) {
        error_log("Error deleting user: " . $e->getMessage());
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
    public function userExist($email) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
            $stmt = $db->prepare("SELECT COUNT(*) FROM healthcare WHERE email = ?");
            $stmt->execute([$email]);
            $healthcareCount = $stmt->fetchColumn();
            
            // Check users table
            $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $usersCount = $stmt->fetchColumn();
            
            // Return true if email exists in either table
            return ($healthcareCount > 0 || $usersCount > 0);
            
        } catch (PDOException $e) {
            error_log("Error checking user existence: " . $e->getMessage());
            return false;
        }
    }
    public function isEmailBanned($email) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
            $stmt = $db->prepare("SELECT COUNT(*) FROM banned WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Email check error: " . $e->getMessage());
            return false;
        }
    }
    
    public function banUser($name, $email) {
        try {
            // First check if email is already banned
            if ($this->isEmailBanned($email)) {
                echo "<div class='error-message'>
                        <i class='error-icon'>⚠️</i>
                        This email is already banned. Please try another one.
                      </div>";
                return false;
            }
            
            // Check if user exists before attempting to ban
            $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
            
            $stmt = $db->prepare("SELECT COUNT(*) FROM healthcare WHERE name = ?");
            $stmt->execute([$name]);
            $healthcareCount = $stmt->fetchColumn();
            
        
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE name = ?");
            $stmt->execute([$name]);
            $usersCount = $stmt->fetchColumn();
            
            // If user doesn't exist in either table
            if ($healthcareCount == 0 && $usersCount == 0) {
                echo "<div class='error-message'>
                        <i class='error-icon'>⚠️</i>
                        User not found. Cannot ban a non-existent user.
                      </div>";
                return false;
            }
            
            // Add to banned table
            $sql = "INSERT INTO banned (name, email) VALUES (?, ?)";
            $stmt = $db->prepare($sql);
            $result = $stmt->execute([$name, $email]);
            
            if ($result) {
                $deleteResult = $this->deleteUserByName($name);
                
                if ($deleteResult) {
                    echo "<div class='success-message'>
                            <i class='success-icon'>✓</i>
                            User has been successfully banned and removed from the system.
                          </div>";
                } else {
                    echo "<div class='warning-message'>
                            <i class='warning-icon'>⚠️</i>
                            User was banned but could not be removed from the system.
                          </div>";
                }
            }
            
            return $result;
            
        } catch (PDOException $e) {
            error_log("Ban user error: " . $e->getMessage());
            echo "<div class='error-message'>
                    <i class='error-icon'>⚠️</i>
                    An error occurred while banning the user.
                  </div>";
            return false;
        }
    }
    
   
	public function userExists($userName) {
       
        try {
            $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
            $stmt = $db->prepare("SELECT COUNT(*) FROM healthcare WHERE name = ?");
            $stmt->execute([$userName]);
            $healthcareCount = $stmt->fetchColumn();
            
            // Check users table
            $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE name = ?");
            $stmt->execute([$userName]);
            $usersCount = $stmt->fetchColumn();
            return ($healthcareCount > 0 || $usersCount > 0);
            
        } catch (PDOException $e) {
            error_log("Error checking user existence: " . $e->getMessage());
            return false;
        }

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
        
        $sqlUsers = "SELECT *, 'Banned' as role ,''as id,''as birthdate FROM banned";
        $resultUsers = $this->db->query($sqlUsers);
        while ($row = $resultUsers->fetch_assoc()) {
            $row['status'] = 'In Active (Banned)'; 
            $row['registration_date'] ='0000-00-00'; 
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
	
}
?>
<style>
    <style>
.error-message, .success-message {
    padding: 15px 20px;
    border-radius: 8px;
    margin: 10px 0;
    font-family: Arial, sans-serif;
    display: flex;
    align-items: center;
    gap: 10px;
    animation: slideIn 0.3s ease-out;
}

.error-message {
    background-color: #FFE8E8;
    border: 1px solid #FFB8B8;
    color: #D63301;
}

.success-message {
    background-color: #E8F5E9;
    border: 1px solid #A5D6A7;
    color: #1B5E20;
}

.error-icon, .success-icon {
    font-size: 20px;
}

@keyframes slideIn {
    from {
        transform: translateY(-10px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>
</style>