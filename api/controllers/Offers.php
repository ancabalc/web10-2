<?php
require "models/OffersModel.php";

class Offers {
    private $offersModel;
    
    function __construct(){
        $this->offersModel = new OffersModel();    
    }
    
    function addOffer() {
        // suppose user session
        $_POST['user_id'] = 1;
        if (empty($_POST['application_id']) || empty($_POST['description'])) {
            return "Invalid Fields";
        } else {
            return $this->offersModel->insertOffer($_POST);  
        }
    }
    
}