<?php

require_once "DB.php";

class UsersModel extends DB {
    
    function login($params) {
        
        $query = 'select * from users where email = ? and password = ?';
        
        $sth = $this -> db ->prepare($query);
        $sth ->execute($params);
        return $sth -> fetch(PDO::FETCH_ASSOC);
                    
    }
};