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
    
<<<<<<< HEAD
    
    
 /*   function getAll($item){
         $params = [
                    $item["user_id"],
                    $item["application_id"],
                    $item["description"],
                    $item["creation_date"]
                    ];
         
          $query = 'INSERT INTO offers(user_id, application_id, description, creation_date) 
                VALUES(? , ?, ?, ?)';
          $sth = $this->db->prepare($query);
          $sth->execute($params);
       
          return $this->db->lastInsertID();
    }
        
        
    }*/
}
=======
    function deleteOffer($id) {
        $params = [$id];

        $query = 'DELETE FROM offers WHERE id = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
       
        return $sth->rowCount();     
    }
    }

>>>>>>> 61552f431a6ee9d6576536dfa00aa10012269865

