<?php
require_once '../Models/Person.php';
require_once '../Models/model.php';
class User {
    function insertUser($name,$password,$email, $birthdate,$gender,$phoneno){
		$sql = "INSERT INTO patient (Name, Password, Email, Birthdate, Gender, phoneNo) VALUES ('$name','$password', '$email', '$birthdate','$gender', '$phoneno' )";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
		}
	}
}
?>
