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

	function insertItem($item){
		 $params = [ $item["name"],
                    $item["password"],
                    $item["email"],
                    $item["role"],
                    $item["job"]];

        $query = 'INSERT INTO `users`(`name`, `email`, `password`, `role`,`job`) VALUES (?,?,?,?,?)';

        $sth = $this->db->prepare($query);
        $sth->execute($params);
        return $this->db->lastInsertId();

	}
	
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
?>
