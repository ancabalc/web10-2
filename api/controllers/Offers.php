<?php
<<<<<<< HEAD
=======

>>>>>>> 61552f431a6ee9d6576536dfa00aa10012269865
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
    
<<<<<<< HEAD
    function addOffer(){
        $_POST['user_id'] = 1;
        if (empty($_POST['application_id']) || empty($_POST['description'])) {
            return "Invalid Fields";
=======
    function addOffer() {
       // suppose user session
       $_POST['user_id'] = 1;
       if (empty($_POST['application_id']) || empty($_POST['description'])) {
           return "Invalid Fields";
       } else {
           return $this->offersModel->insertOffer($_POST);  
       }
   }
   
   function deleteOffer() {

        if (empty($_POST['id'])) {
            return "Empty offer id";    
>>>>>>> 61552f431a6ee9d6576536dfa00aa10012269865
        } else {
            return $this->offersModel->deleteOffer($_POST["id"]);     
        }
    }
<<<<<<< HEAD
}
=======
 }
>>>>>>> 61552f431a6ee9d6576536dfa00aa10012269865
