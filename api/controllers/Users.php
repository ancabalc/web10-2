<?php
require "models/UsersModel.php";

class Users {
    private $usersModel;
	function __construct()
	{
		$this->usersModel = new UsersModel();
	}
    function getAll(){
		return $this->usersModel->getAll();
	}
	function getLast3() {
	    return $this->usersModel->getLast3();
	}
	function getUser() {
        if (empty($_GET['id'])) {
            return "No user found";    
        } else {
            return $this->usersModel->selectUser($_GET['id']);    
        }
    }
}
