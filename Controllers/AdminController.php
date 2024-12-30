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
        $stmt = $db->prepare("SELECT COUNT(*) FROM healthcare WHERE email = ?");
        $stmt->execute([$userName]);
        $healthcareCount = $stmt->fetchColumn();
        
        // Check users table
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$userName]);
        $usersCount = $stmt->fetchColumn();
        
        // Delete from appropriate table
        if ($healthcareCount > 0) {
            $stmt = $db->prepare("DELETE FROM healthcare WHERE email = ?");
            $stmt->execute([$userName]);
            return true;
        } elseif ($usersCount > 0) {
            $stmt = $db->prepare("DELETE FROM users WHERE email = ?");
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
            if (!$this->userExist($email)){
                echo "<div class='error-message'>
                <i class='error-icon'>⚠️</i>
                This email is not found. Please try another one.
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
                    echo "<div class='success-message'>
                            <i class='success-icon'>✓</i>
                            User has been successfully banned and removed from the system.
                          </div>";
                } 
                else {
                    echo "<div class='warning-message'>
                            <i class='warning-icon'>⚠️</i>
                            User was banned but could not be removed from the system.
                          </div>";
                }
            
            
            return $result;
            
        } 
        
        catch (PDOException $e) {
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
            $stmt = $db->prepare("SELECT COUNT(*) FROM healthcare WHERE email = ?");
            $stmt->execute([$userName]);
            $healthcareCount = $stmt->fetchColumn();
            
            // Check users table
            $db = new PDO("mysql:host=localhost;dbname=Medical", "root", "");
            $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
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
        
        // Get users from users table
        $sqlUsers = "SELECT *, 'User' as role FROM users";
        $resultUsers = $this->db->query($sqlUsers);
        
        while ($row = $resultUsers->fetch_assoc()) {
            // Check if email is banned
            if ($this->isEmailBanned($row['email'])) {
                $row['status'] = 'In Active (Banned)';
            } else {
                $row['status'] = 'Active';
            }
            $row['registration_date'] = $row['birthdate'];
            $users[] = $row;
        }
        
        // Get users from healthcare table
        $sqlHealthcare = "SELECT *, 'Healthcare Provider' as role FROM healthcare";
        $resultHealthcare = $this->db->query($sqlHealthcare);
        
        while ($row = $resultHealthcare->fetch_assoc()) {
            // Check if email is banned
            if ($this->isEmailBanned($row['email'])) {
                $row['status'] = 'In Active (Banned)';
            } else {
                $row['status'] = 'Active';
            }
            $row['registration_date'] = $row['birthdate'];
            $users[] = $row;
        }
        
        return $users;
    }
    public function getAllMessages() {
        try {
            $db = new PDO("mysql:host=localhost; dbname=medical", "root", "");
            $query = "SELECT name, username as email, message, created_at FROM contactus ORDER BY created_at DESC";
            $stmt = $db->prepare($query);
            $stmt->execute();
            
            $messages = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $messages[] = array(
                    'name' => $row['name'],
                    'email' => $row['email'],  // username column aliased as email
                    'message' => $row['message'],
                    'created_at' => $row['created_at']
                );
            }
            
            return $messages;
        } catch (Exception $e) {
            error_log("Error retrieving messages: " . $e->getMessage());
            return false;
        }
    }
}
function validateDate($month, $year) {
    // Check if month and year are provided
    if (empty($month) || empty($year)) {
        return [
            'valid' => false,
            'error' => 'Month and year are required.'
        ];
    }

    // Validate month range
    if (!is_numeric($month) || $month < 1 || $month > 12) {
        return [
            'valid' => false,
            'error' => 'Invalid month selected.'
        ];
    }

    // Validate year range
    $currentYear = date('Y');
    if (!is_numeric($year) || $year < 1970 || $year > $currentYear) {
        return [
            'valid' => false,
            'error' => 'Invalid year selected.'
        ];
    }

    // Create DateTime objects for comparison
    $selectedDate = new DateTime("$year-$month-01");
    $minDate = new DateTime();
    $minDate->modify('-26 years'); // Subtract 8 years from current date

    // Compare dates
    if ($selectedDate > $minDate) {
        return [
            'valid' => false,
            'error' => 'You must be at least 8 years old.'
        ];
    }

    return [
        'valid' => true,
        'error' => null
    ];
}


?>
<style>
.message {
    position: fixed;
    top: 80px; /* Changed from 20px to 80px to appear below navbar */
    left: 50%;
    transform: translateX(-50%);
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    width: auto;
    min-width: 200px;
    max-width: 300px;
    text-align: center;
    animation: messageAnimation 3s ease-in-out forwards;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    z-index: 1000;
    opacity: 0;
}

.success {
    background-color: rgba(0, 191, 255, 0.95);
    color: white;
    border: 1px solid rgba(0, 191, 255, 0.3);
}

.error {
    background-color: rgba(255, 69, 58, 0.95);
    color: white;
    border: 1px solid rgba(255, 69, 58, 0.3);
}

@keyframes messageAnimation {
    0% {
        opacity: 0;
        transform: translate(-50%, -20px);
    }
    15% {
        opacity: 1;
        transform: translate(-50%, 0);
    }
    85% {
        opacity: 1;
        transform: translate(-50%, 0);
    }
    100% {
        opacity: 0;
        transform: translate(-50%, -10px) scale(0.95);
    }
}
</style>