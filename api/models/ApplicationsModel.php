<?php
   
require_once "DB.php";

    class ApplicationsModel extends DB {
        
        function insertItem($item) {
        $params = [$item["title"],
                    $item["description"],
                    $item["active"]];

        $query = 'INSERT INTO applications(title, description,active) 
                VALUES(? , ?, ?);';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
       
        return $this->db->lastInsertId();
        }
    }
?>