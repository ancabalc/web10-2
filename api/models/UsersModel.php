<?php
require_once "DB.php";
class UsersModel extends DB {
	function insertItem($item){
		 $params = [ $item["name"],
                    $item["password"],
                    $item["email"]
                    $item["role"]
                    $item["job"]];

        $query = 'INSERT INTO `users`(`name`, `email`, `password`, `role`,`job`) VALUES (?,?,?,?,?)';

        $sth = $this->db->prepare($query);
        $sth->execute($params);
        return $this->db->lastInsertId();

	}

}

?>