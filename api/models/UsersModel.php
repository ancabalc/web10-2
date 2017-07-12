<?php
require_once "DB.php";

 class UsersModel extends DB {
    function updateProfile($item){
        $params = [ $item['name'],
                    $item['description'],
                    $item['image'],
                    $item['id']
                    ];
                    //change 1 to $_SESSION['id'];
        $query = "UPDATE users SET name = ?, description = ?, image = ? where id = ?";
        $sth = $this -> db -> prepare($query);
        $sth->execute($params);
        
        return $sth->rowCount();
    }
}