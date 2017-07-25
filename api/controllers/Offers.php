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
    
    function addOffer() {
       // suppose user session
       //   $_POST['user_id'] = $_SESSION["id"];
      $_POST['user_id'] = 1;
       if (empty($_POST['application_id']) || empty($_POST['description'])) {
           http_response_code(422);
           return "Invalid Fields";
       } else {
           return $this->offersModel->insertOffer($_POST);  
       }
   }
   
   function deleteOffer() {

        if (empty($_POST['id'])) {
            return "Empty offer id";    
        } else {
            return $this->offersModel->deleteOffer($_POST["id"]);     
        }
    }

}
