<?php

require_once "DB.php";

    class ApplicationsModel extends DB {
        
        function insertItem($item) {
        $params = [$item["title"],
                    $item["description"],
                    $item["category_id"],
                    $item["price"],
                    $item["active"]];

        $query = 'INSERT INTO applications(title, description, category_id, price, active) 
                VALUES(?, ?, ?, ?, ?);';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
       
        return $this->db->lastInsertId();
        }
    }
?>