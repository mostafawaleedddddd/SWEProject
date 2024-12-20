<?php
require_once("../db/dp.php");

function validateSignupData($data) {
    $db = new DBh();
    $errors = [];

    // Extract and sanitize inputs
    $fullName = trim($data['fullName'] ?? '');
    $email = trim($data['email'] ?? '');
    $phoneNumber = trim($data['phoneNumber'] ?? '');
    $password = $data['password'] ?? '';
    $gender = $data['gender'] ?? null;
    $day = $data['day'] ?? '';
    $month = $data['month'] ?? '';
    $year = $data['year'] ?? '';

    // Validate full name
    if (empty($fullName) || !preg_match("/^[a-zA-Z\s]+$/", $fullName)) {
        $errors[] = "Full name must contain only letters and spaces.";
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } else {
        // Check if email exists in the patient database
        $sql = "SELECT COUNT(*) as count FROM users WHERE email = ?";
        $stmt = $db->getConn()->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            // Overwrite errors if email already exists
            return ["The email address is already registered."];
        }
        // Check if email exists in the admin database
        $sql1 = "SELECT COUNT(*) as count FROM admins WHERE email = ?";
        $stmt1 = $db->getConn()->prepare($sql1);
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $row1 = $result1->fetch_assoc();

        if ($row1['count'] > 0) {
            // Overwrite errors if email already exists
            return ["The email address is already registered."];
        }
         // Check if email exists in the healthcare database
         $sql2 = "SELECT COUNT(*) as count FROM healthcare WHERE email = ?";
         $stmt2 = $db->getConn()->prepare($sql2);
         $stmt2->bind_param("s", $email);
         $stmt2->execute();
         $result2 = $stmt2->get_result();
         $row2 = $result2->fetch_assoc();
 
         if ($row2['count'] > 0) {
             // Overwrite errors if email already exists
             return ["The email address is already registered."];
         }
    }

    // Validate phone number
    if (empty($phoneNumber) || !preg_match("/^\d{11}$/", $phoneNumber)) {
        $errors[] = "Phone number must be 10 digits.";
    }

    // Validate password
    if (empty($password) || strlen($password) < 8 || !preg_match("/[A-Z]/", $password)) {
        $errors[] = "Password must be at least 8 characters long and include at least one uppercase letter.";
    }

    // Validate gender
    if (empty($gender) || !in_array($gender, ['Male', 'Female', 'Other'])) {
        $errors[] = "Please select a valid gender.";
    }

    // Validate date of birth
    if (empty($day) || empty($month) || empty($year) || !checkdate($month, $day, $year)) {
        $errors[] = "Invalid date of birth.";
    }

    return $errors;
}
?>
