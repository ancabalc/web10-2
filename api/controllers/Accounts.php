<?php

require "models/UsersModel.php";

class Accounts {
      
    private $usersModel;
    
    function __construct(){
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
     
     
    
     
     

}




    
    