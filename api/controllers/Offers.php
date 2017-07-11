<?php

require "models/OffersModel.php";

class Offers {
     private $offersModel;
     
    function __construct() {
         $this->offersModel = new OffersModel();    
    }

    function getAll() {
        return $this->offersModel->selectAll();    
    }
}