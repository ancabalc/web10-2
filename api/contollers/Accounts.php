<?php
require "models/UsersModel.php";

class Accounts {

    private $usersModel;

	function __construct(){
		$this->usersModel = new UsersModel();
	}

	function signUp(){
		$err=[];

		if (empty($_POST["userName"])) {
			array_push($err,"Empty username field ");
		}

		if ($_POST["password"] != $_POST["repassword"]) {
			array_push($err,"Password fields do not match ");
		} elseif (empty($_POST["password"])) {
			array_push($err,"Empty password field ");
		}
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
     		array_push($err,"Invalid email ");
		}
		if (empty($_POST["job"])) {
			array_push($err,"Empty job field");
		}
		if (empty($_POST["role"])){
			array_push($err,"Invalid Role ");
		}
		if (empty($err)) {
			$salt = '$1$12!abawdawd';
			$_POST["password"] = crypt($_POST["password"], $salt);
			$id = $this->usersModel->insertItem($_POST);
			return "Succesfull";
		} else {
			return $err;
		}
	}

}
    

    