<?php
    require_once "DB.php";
    
    class OffersModel extends DB  {
        function selectAll() {
            $query = 'select * from offers'; 
            return $this->executeQuery($query);
        }
            
    }

