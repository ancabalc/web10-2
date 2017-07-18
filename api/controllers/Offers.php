<?php
require "models/OffersModel.php";

class Offers {

    private $offersModel;

    function __construct(){
        $this->offersModel = new OffersModel();    
    }
    
    function getAll(){
         if (empty($_GET['id'])) {
            return "No offers for application";    
        } else {
             return $this->offersModel->selectAll($_GET['id']);  
        }
    }
    
    function addOffer(){
        $_POST['user_id'] = 1;
        if (empty($_POST['application_id']) || empty($_POST['description'])) {
            return "Invalid Fields";
        } else {
            return $this->offersModel->insertOffer($_POST);  
        }
    }
}
