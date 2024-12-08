<?php
require_once 'Person.php';

class Admin extends Person {
    public function __construct($name, $phoneNum, $gender, $dateOfBirth, $username, $password) {
        parent::__construct($name, $phoneNum, $gender, $dateOfBirth, $username, $password);
    }


    function getName() {
        return $this->name;
      }
      function setName($name) {
        return $this->name = $name;
      }
      function getuserName() {
        return $this->username;
      }
      function setuserName($username) {
        return $this->username = $username;
      }
       function getPassword() {
        return $this->password;
      }
      function setPassword($password) {
        return $this->password = $password;
      }
      function getPhone() {
        return $this->phoneNum;
      }
      function setPhone($phoneNum) {
        return $this->phoneNum = $phoneNum;
      }

      function getDateOfBirth() {
        return $this->dateOfBirth ;
      }
      
      function setDateOfBirth($dateOfBirth) {
        return $this->dateOfBirth = $dateOfBirth;
      }
      
      function getGender() {
        return $this->gender ;
      }
      
      function setGender($gender) {
        return $this->gender = $gender;
      }
      function readUser($username){
        $sql = "SELECT * FROM user where username=".$username;
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result->num_rows == 1){
            $row = $db->fetchRow();
            $this->name = $row["Name"];
            $this->username = $row["UserName"];
            $_SESSION["Name"]=$row["Name"];
            $this->password=$row["Password"];
            $this->dateOfBirth = $row["Date of birth"];
            $this->phoneNum = $row["Phone"];
            $this->gender = $row["Gender"];
        }
        else {
            $this->name = "";
            $this->password="";
            $this->username = "";
            $this->gender="";
            $this->dateOfBirth="";
            $this->phoneNum = "";
        }
      }
    function fillArray() {
		$this->user = array();
		$this->db = $this->connect();
		$result = $this->readMovies();
		while ($row = $result->fetch_assoc()) {
			array_push($this->user, new user(row['name'], row['phoneNum'],  row['gender'], row['dateOfBirth'] , row['username'] , row['password']));
		}
	}
    function insertUser($name, $phoneNum, $gender, $dateOfBirth, $username, $password){
		$sql = "INSERT INTO user (name, password, age, phoneNum, dateOfBirth , username , gender ) VALUES ('$name','$password', '$username', '$phoneNum','$gender','$dateOfBirth')";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
		}
	}


    function deleteUser(){
        $sql="delete from user where username=$this->username;";
        if($this->db->query($sql) === true){
              echo "deletet successfully.";
          } else{
              echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
          }
      }
      function editUser($name, $phoneNum, $gender, $dateOfBirth, $username, $password){
        $sql = "update user set name='$name',password='$password', gender='$gender', phone='$phoneNum',username='$username',dateOfBirth
         where username=$this->username;";
          if($this->db->query($sql) === true){
              echo "updated successfully.";
              $this->readUser($this->username);
          } else{
              echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
          }
  
    }
}
?>
