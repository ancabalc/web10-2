<?php
require_once "DB.php";

class OffersModel extends DB {
    
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
    
    function deleteOffer($id) {
        $params = [$id];

        $query = 'DELETE FROM offers WHERE id = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
       
        return $sth->rowCount();     
    }
    }
?>