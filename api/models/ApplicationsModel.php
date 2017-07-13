<?php

require_once "DB.php";

    class ApplicationsModel extends DB {
        function selectAll() {
            $query = 'select title, description, creation_date from applications where active = 1'; 
            return $this -> executeQuery($query);
        }
        
        function deleteApplication($id) {
            $params = [$id];

            $query = 'UPDATE applications SET active = 0 where id = ?';
            $sth = $this->db->prepare($query);
            $sth->execute($params);
       
            return $sth->rowCount();     
    }
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