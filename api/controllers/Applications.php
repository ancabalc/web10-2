<?php
require "models/ApplicationsModel.php";

class Applications {
    private $applicationsModel;
    function __construct() {
        $this -> applicationsModel = new ApplicationsModel();
    }
    function create() {
     if (empty($_POST['title']) || empty($_POST['description'])) {
            return "Invalid Fields";
        } else {
            return $this->createModel->insertApplication($_POST);    
        }
    }
    
    function getAll() {
        return $this -> applicationsModel -> selectAll();
    }
    
    function deleteApplication() {
            return $this -> applicationsModel -> deleteApplication($_POST["id"]);    
    }
}