<?php

require_once "DB.php";

class UsersModel extends DB {

    function login($params) {
        
        $query = 'select * from users where email = ? and password = ?';
        
        $sth = $this -> db ->prepare($query);
        $sth ->execute($params);
        return $sth -> fetch(PDO::FETCH_ASSOC);
                    
    }
    function getAll() {
        $query = 'select name, email,role,job, description from users where active=1;'; 
        return $this->executeQuery($query);
    }
    function getLast3() {
        $query = "select id,name,email,role,job,description from users where active=1 order by id desc limit 3";
        return $this->executeQuery($query);
    }
    function selectUser($id) {
       $query = 'select * from articles where id = ' . $id . ', active=1;';
       return $this->executeQuery($query, true);    
    }
    function changeActive($email) {
        $query = "update users set active=0 where email = ".$email ;
        return $this->executeQuery($query);
    }

	function insertItem($item){
         $params = [ $item["name"],
                    $item["email"],
                    $item["password"],
                    $item["role"],
                    $item["job"]];

        $query = 'INSERT INTO `users`(`name`, `email`, `password`, `role`,`job`) VALUES (?,?,?,?,?)';
        try {
            $sth = $this->db->prepare($query);
            $sth->execute($params);
            return $this->db->lastInsertId();
        } catch(Exception $e) {
            return false;
        }

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
    
    function verify_email($email){
        $query = 'select * from users where email= ? ';
        $sth = $this -> db -> prepare($query);
        $sth->execute($email);
        
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    
    function update_password($params){
        $query = 'update users set password = ? where email = ?';
        
        $sth = $this -> db -> prepare($query);
        $sth->execute($params);
        
        return $sth->rowCount();
    }
    
    function getProfile($params){
        $query = "select name, description, image from users where id = 1 ";
        return $this->executeQuery($query); 
    }
}
?>

