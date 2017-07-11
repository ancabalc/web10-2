<?php

require_once "DB.php";

    class ApplicationsModel extends DB {
        
        function insertItem($item) {
        $params = [$item["title"],
                    $item["description"]];

        $query = 'INSERT INTO applications(title, description) 
                VALUES(? , ?);';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
       
        return $this->db->lastInsertId();
        }
    }
?>