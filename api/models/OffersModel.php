<?php
            
require_once "DB.php";

class OffersModel extends DB {
    
    function selectAll() {
            $query = 'select * from offers'; 
            return $this->executeQuery($query);
    }
    
    function insertOffer($item) {
        $params = [
                    $item["user_id"],
                    $item["application_id"],
                    $item["description"]
                    ];

        $query = 'INSERT INTO offers(user_id, application_id, description) 
                VALUES(? , ?, ?)';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
       
        return $this->db->lastInsertID();
    }
}

