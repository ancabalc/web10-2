<?php

class Applications {
    function create() {
     if (empty($_POST['title']) || empty($_POST['description'])) {
            return "Invalid Fields";
        } else {
            return $this->createModel->insertApplication($_POST);    
        }
    }
}