<?php
// Importing Database Connection
require_once '../Models/model.php'; // Assume this contains your database connection logic

require_once('../Controllers/Controller.php');

class UserController extends Controller {
    protected $model;
    public function __construct() {
        $this->model = new User();
    }
    public function  insert() {
        $name = $_REQUEST['fullName'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $day = str_pad($_REQUEST['day'], 2, '0', STR_PAD_LEFT);
        $month = str_pad($_REQUEST['month'], 2, '0', STR_PAD_LEFT);
        $year = $_REQUEST['year'];
        $birthdate = "$year-$month-$day";
        $gender = $_REQUEST['gender'];
        $phoneno=$_REQUEST['phoneNumber'];
    
       $result= $this->model->insertUser($name,$password,$email, $birthdate,$gender,$phoneno);
       if ($result === true) {
        // Start session and store user info
        session_start();
        $_SESSION['user_name'] =  $name;
        $_SESSION['user_email'] = $email;

        // Redirect to welcome page
        header("Location: ../Views/Signedup.php");
        exit();
    }
    }
    public function login($email, $password) {
         // Assume $conn is the database connection from db.php
    
        $query = "SELECT * FROM Admins WHERE Username = '?' AND Password = '?'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $adminResult = $stmt->get_result()->fetch_assoc();
    
        $query = "SELECT * FROM Patients WHERE Username = '?' AND Password = '?'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $userResult = $stmt->get_result()->fetch_assoc();
    
        $query = "SELECT * FROM HealthCare WHERE Username = '?' AND Password = '?'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $healthResult = $stmt->get_result()->fetch_assoc();
        
        if ($adminResult) {
            $_SESSION['user'] = $adminResult;
            $_SESSION['user_type'] = 'admin';
            header("Location: /admin");
        } elseif ($userResult) {
            $_SESSION['user'] = $userResult;
            $_SESSION['user_type'] = 'patient';
            header("Location: /user");
        } elseif ($healthResult) {
            $_SESSION['user'] = $healthResult;
            $_SESSION['user_type'] = 'healthCare';
            header("Location: /HealthCare");
        } else {
            http_response_code(401);
            echo 'Invalid credentials';
        }
    }
    
    
}




// function addUser($fullName, $email, $password, $birthdate, $phoneNumber, $gender) {
//     global $conn;

//     try {
//         $query = "SELECT * FROM Patient WHERE Username = '$email' AND Name = 'fullName'";
//         $stmt = $conn->prepare($query);
//         $stmt->bind_param("ss", $email, $fullName);
//         $stmt->execute();
//         $user = $stmt->get_result()->fetch_assoc();

//         if ($user) {
//             echo json_encode(["message" => "User already exists"]);
//         } else {
//             $query = "INSERT INTO HealthCare (Name, phoneNum, gender, DateOfBirth, Username, Password) VALUES (?, ?, ?, ?, ?, ?)";
//             $stmt = $conn->prepare($query);
//             $stmt->bind_param("ssssss", $fullName, $phoneNumber, $gender, $birthdate, $email, $password);
//             $stmt->execute();

//             header("Location: /user/signed");
//         }
//     } catch (Exception $e) {
//         error_log($e->getMessage());
//         http_response_code(500);
//         echo json_encode(["message" => "Internal server error"]);
//     }
// }


// function checkCredentials($email, $password) {
//     global $conn;

//     $found = false;

//     $query = "SELECT * FROM Admins WHERE Username = ? AND Password = ?";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("ss", $email, $password);
//     $stmt->execute();
//     if ($stmt->get_result()->num_rows > 0) {
//         $found = true;
//     }

//     $query = "SELECT * FROM Users WHERE Username = ? AND Password = ?";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("ss", $email, $password);
//     $stmt->execute();
//     if ($stmt->get_result()->num_rows > 0) {
//         $found = true;
//     }

//     $query = "SELECT * FROM HealthCare WHERE Username = ? AND Password = ?";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("ss", $email, $password);
//     $stmt->execute();
//     if ($stmt->get_result()->num_rows > 0) {
//         $found = true;
//     }

//     echo $found ? 'Success' : 'Fail';
// }
?>