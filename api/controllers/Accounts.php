<?php


require "models/UsersModel.php";
require "helpers/passwords.php";
require "_3rdparties/emailSender.php";

class Accounts {
    private $usersModel;
    private $externalHelp;
	function __construct()
	{
		$this->usersModel = new UsersModel();
		$this->externalHelp = new externalHelp();
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
		} else if ($id == 0){
			array_push($err,"Email already exists, ");
		}

		if (empty($err)) {
			$message = "Welcome to the comunity!";
			$email = $_POST["email"];
			$this->externalHelp->signUpSender($name,$message,$email);
			return "Succesfull sign up";
		} else {
			return $err;
		}
	}

	function deleteAccount() {
		if ($email = ($_POST["email"])) {
			return changeActive($email);
		};
	}

    function reset_password(){
        //return "here";
        $email_array = [$_POST["email"]];
        $email = $_POST["email"];
        if (empty($email)) {
            return "Please enter your email";
        }
        
        else { 
            $user =  $this->usersModel-> verify_email($email_array);  
           
            
            if (empty($user)) {
                return "User not found";
            }
            else {
                $newPassword = bin2hex(mcrypt_create_iv(22,MCRYPT_DEV_URANDOM));
                 $salt = '$1$12!abawdawd';
                 $incriptedPassword = crypt($newPassword, $salt);
                 $params = [$incriptedPassword, $email];
                 $result = $this->usersModel-> update_password($params); 
                 
                 if ($result != 1) {
                     return "password reset failed";
                 }
                 else {
                     $subject = "Your recovered password ";
                     $message = "Your nex password is " . $newPassword;
                     $headers = "From: abs@abs.com";
                     if (mail($email, $subject, $message, $headers)){
                     return "We have sent you a message by email to reset your password";
                     }
                     else {
                         return "failed to send email";
                     }
                 }
            }
        }
    }
}


