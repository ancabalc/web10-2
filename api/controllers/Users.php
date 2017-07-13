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
        
    function update() {
        if(empty($_POST['name']) || empty($_POST['description']) || empty ($_FILES['image'])) {
            return "Invalid Fields";
        } else {
            $file = $_FILES['image'];
            if (!exif_imagetype($file["tmp_name"])) {
                echo "Not an image.";
            } else {
                move_uploaded_file($file['tmp_name'], '../images/' . $file['name']);
                $_POST['image'] = "images/" . $file['name'];
                // insert correct id here! with $_SESSION['id'];
                $_POST['id'] = 1;
                return $this->usersModel->updateProfile($_POST);
            }
        }
    }  
}
