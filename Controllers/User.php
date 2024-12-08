<?php
// Importing Database Connection
require_once '../config/db.php'; // Assume this contains your database connection logic
session_start();

function login($email, $password) {
    global $conn; // Assume $conn is the database connection from db.php

    $query = "SELECT * FROM Admins WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $adminResult = $stmt->get_result()->fetch_assoc();

    $query = "SELECT * FROM Users WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $userResult = $stmt->get_result()->fetch_assoc();

    $query = "SELECT * FROM HealthCare WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $healthResult = $stmt->get_result()->fetch_assoc();

    if ($adminResult) {
        $_SESSION['user'] = $adminResult;
        $_SESSION['role'] = 'Admin';
        header("Location: /admin");
    } elseif ($userResult) {
        $_SESSION['user'] = $userResult;
        $_SESSION['role'] = 'User';
        header("Location: /user");
    } elseif ($healthResult) {
        $_SESSION['user'] = $healthResult;
        $_SESSION['role'] = 'HealthCare';
        header("Location: /HealthCare");
    } else {
        http_response_code(401);
        echo 'Invalid credentials';
    }
}

function addUser($fullName, $email, $password, $birthdate, $phoneNumber, $gender) {
    global $conn;

    try {
        $query = "SELECT * FROM HealthCare WHERE Username = ? AND Name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $fullName);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user) {
            echo json_encode(["message" => "User already exists"]);
        } else {
            $query = "INSERT INTO HealthCare (Name, phoneNum, gender, DateOfBirth, Username, Password) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssss", $fullName, $phoneNumber, $gender, $birthdate, $email, $password);
            $stmt->execute();

            header("Location: /user/signed");
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        http_response_code(500);
        echo json_encode(["message" => "Internal server error"]);
    }
}

function checkCredentials($email, $password) {
    global $conn;

    $found = false;

    $query = "SELECT * FROM Admins WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $found = true;
    }

    $query = "SELECT * FROM Users WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $found = true;
    }

    $query = "SELECT * FROM HealthCare WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $found = true;
    }

    echo $found ? 'Success' : 'Fail';
}
?>