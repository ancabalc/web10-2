<?php
require_once "DB.php";
class UsersModel extends DB {
    function getAll() {
        $query = 'select name, email,role,job, description from users;'; 
        return $this->executeQuery($query);
    }
    function getLast3() {
        $query = "select id,name,email,role,job,description from users order by id desc limit 3";
        return $this->executeQuery($query);
    }
    function selectUser($id) {
       $query = 'select * from articles where id = ' . $id . ';';
       return $this->executeQuery($query, true);    
    }
}

?>