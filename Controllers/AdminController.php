<?php

require_once '../Controllers/Controller.php';

class AdminController extends Controller{
	public function insert() {
		$name = $_REQUEST['name'];
		$name = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$age = $_REQUEST['gender'];
		$phone = $_REQUEST['phoneNum'];
        $dateOfbirth = $_REQUEST['dateOfBirth'];

		$this->model->insertUser($name,$phone,$gender,$dateOfbirth,$username,$password,);
	}

	public function edit() {
		$name = $_REQUEST['name'];
		$name = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$age = $_REQUEST['gender'];
		$phone = $_REQUEST['phoneNum'];
        $dateOfbirth = $_REQUEST['dateOfBirth'];

		$this->model->editUsereditUser($name, $phoneNum, $gender, $dateOfBirth, $username, $password);
	}
	
	public function delete(){
		$this->model->deleteUser();
	}
}
?>
