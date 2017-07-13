<?php
require "models/UsersModel.php";

class Accounts {
     private $usersModel;
	function __construct()
	{
		$this->usersModel = new UsersModel();
	}
<<<<<<< HEAD


    }
    

    
=======
	function signUp(){
		$err=[];

		$name = $_POST["name"];
		$pat = "/[A-Z,a-z, ,']/";
		preg_match_all($pat, $name, $match_out);
		$imp = implode("",$match_out[0]);

		if (empty($name)) {
			array_push($err,"Empty username field ");
		} else if ($name !== $imp){
			array_push($err,"Invalid username field ");
		}

		if (empty($_POST["password"])) {
			array_push($err,"Empty password field ");
		} else if (strlen($_POST["password"]) < 6){
			array_push($err,"Password to short ");
		} else if ($_POST["password"] !== $_POST["repassword"]) {
			array_push($err,"Password fields do not match ");
		}

		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
     		array_push($err,"Invalid email ");
		}
		
		$job = $_POST["job"];
		preg_match_all($pat, $job, $match_out);
		$imp = implode("",$match_out[0]);

		if (empty($job)) {
			array_push($err,"Empty job field");
		} else if ($job !== $imp){
			array_push($err,"Invalid job field");
		}
		if (empty($_POST["role"])){
			array_push($err,"Invalid Role ");
		}
		if (empty($err)) {
			$salt = '$1$12!abawdawd';
			$_POST["password"] = crypt($_POST["password"], $salt);
			$id = $this->usersModel->insertItem($_POST);
			return "Succesfull sign up".$id;
		} else {
			return $err;
		}
	}

}
>>>>>>> e3dd8760e611c985630de5ce69fcd42ddebabd27
