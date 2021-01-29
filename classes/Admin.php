<?php
/**
 * !class for user interaction with system.
 * !user registration as new and login after regsitration.
 * !update user profile info and password.
 **/

class Admin extends Database{

	//!method of add new admin
	public function create_new_admin($table,$data){
		$sql = "INSERT INTO ".$table." (";            
        $sql .= implode(",", array_keys($data)) . ') VALUES (';            
        $sql .= "'" . implode("','", array_values($data)) . "')";

        if ($this->conn->query($sql) == true) { return true; } 
        else {
            return $this->conn->connect_error;
        } 
    }

}
?>