<?php
class Person {
    protected $name;
    protected $phoneNum;
    protected $gender;
    protected $dateOfBirth;
    protected $username;
    protected $password;

    public function __construct($name, $phoneNum, $gender, $dateOfBirth, $username, $password) {
        $this->setName($name);
        $this->setPhoneNum($phoneNum);
        $this->setGender($gender);
        $this->setDateOfBirth($dateOfBirth);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function setName($name) {
        if (preg_match("/^([A-ZÀ-ÿ-a-z. ']+[ ]*)+$/", $name)) {
            $this->name = $name;
        } else {
            throw new Exception("Invalid name format.");
        }
    }

    public function getName() {
        return $this->name;
    }

    public function setPhoneNum($phoneNum) {
        if (preg_match("/^[0]{1}[1]{1}[0,1,2,5]{1}[0-9]{8}$/", $phoneNum)) {
            $this->phoneNum = $phoneNum;
        } else {
            throw new Exception("Invalid phone number format.");
        }
    }

    public function getPhoneNum() {
        return $this->phoneNum;
    }

    public function setGender($gender) {
        $validGenders = ["Male", "Female", "Other"];
        if (in_array($gender, $validGenders)) {
            $this->gender = $gender;
        } else {
            throw new Exception("Invalid gender value.");
        }
    }

    public function getGender() {
        return $this->gender;
    }

    public function setDateOfBirth($dateOfBirth) {
        $minDate = "1907-05-04";
        $maxDate = "2006-06-21";

        if ($dateOfBirth >= $minDate && $dateOfBirth <= $maxDate) {
            $this->dateOfBirth = $dateOfBirth;
        } else {
            throw new Exception("Date of birth must be between $minDate and $maxDate.");
        }
    }

    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    public function setUsername($username) {
        if (preg_match("/^[a-zA-Z0-9]*[@]+[a-z]+[.]+[a-z]{3}$/", $username)) {
            $this->username = $username;
        } else {
            throw new Exception("Invalid username format.");
        }
    }

    public function getUsername() {
        return $this->username;
    }

    public function setPassword($password) {
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d!@#$%^&*()-_=+{};:,<.>]{8,}$/", $password)) {
            $this->password = $password;
        } else {
            throw new Exception("Password must be at least 8 characters and include one uppercase letter, one number, and one special character.");
        }
    }

    public function getPassword() {
        return $this->password;
    }
}
