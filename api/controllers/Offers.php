<?php
<<<<<<< HEAD

require "models/OffersModel.php";

class Offers {

    private $offersModel;

    function __construct(){
        $this->offersModel = new OffersModel();    
    }
    
    function getAll() {
        return $this->offersModel->selectAll();    
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
=======

class Offers {

}
>>>>>>> e3dd8760e611c985630de5ce69fcd42ddebabd27
