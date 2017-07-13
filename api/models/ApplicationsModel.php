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
    }
?>