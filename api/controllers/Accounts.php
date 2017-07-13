<?php


require "models/UsersModel.php";

class Accounts {
    private $usersModel;
	function __construct()
	{
		$this->usersModel = new UsersModel();
	}
      
    function login() {
        
        if ( empty($_POST['email']) || empty($_POST['password'])) {
            return "Invalid Fields";
        } else {
            
            $salt = '$1$12!abawdawd';
            $_POST["password"] = crypt($_POST["password"], $salt);
            
            $user =  $this->usersModel->login($_POST);  
            
            if  (!empty(result)) {
                $_SESSION["isLogged"]=TRUE;
                $_SESSION["email"]=$_POST["email"];
                return $_SESSION;
                
            } else {
                return "User not found";
            }
        }
    }
     
     

	function signUp(){
		
		$err=[];
		$name = $_POST["name"];
		$pat = "/[A-Z,a-z, ,']/";
		preg_match_all($pat, $name, $match_out);
		$imp = implode("",$match_out[0]);

		if (empty($name)) {
			array_push($err,"Empty username field ");
		} else if ($name !== $imp) {
			array_push($err,"Invalid username field ");
		}

		if (empty($_POST["password"])) {
			array_push($err,"Empty password field ");
		} else if (strlen($_POST["password"]) < 6){
			array_push($err,"Password to short ");
		} else if ($_POST["password"] !== $_POST["repassword"]) {
			array_push($err,"Password fields do not match ");
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
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
     		array_push($err,"Invalid email ");
		} else if (empty($err)){
			$salt = '$1$12!abawdawd';
			$_POST["password"] = crypt($_POST["password"], $salt);
			$id = $this->usersModel->insertItem($_POST);
		} else if ($id === 0){
			array_push($err,"Email already exists, ");
		}

		if (empty($err)) {
			return "Succesfull sign up";
		} else {
			return $err;
		}
	}

}

