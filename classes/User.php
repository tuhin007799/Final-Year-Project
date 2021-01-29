<?php
/**
 * !class for user interaction with system.
 * !user registration as new and login after regsitration.
 * !update user profile info and password.
 **/

class User extends Database{

    //!method to validate new user registration
    public function validate_user($table,$email){
        $sql = "SELECT * FROM ".$table." WHERE email='$email'";
    	$result = $this->conn->query($sql);
    	if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			return "register";
  			}
		  } else {
  			return false;
		   }
    }

	//!method of new user registion
	public function registration($table,$data){
		$sql = "INSERT INTO ".$table." (";            
        $sql .= implode(",", array_keys($data)) . ') VALUES (';            
        $sql .= "'" . implode("','", array_values($data)) . "')";

        if ($this->conn->query($sql) == true) { return true; } 
        else {
            return $this->conn->connect_error;
        } 
    }
    
  //!login function to validate user and admin
  public function login($table,$conditions){  
           $condition = '';  
           foreach($conditions as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);

           $sql = "SELECT * FROM " . $table . " WHERE " . $condition . " LIMIT 1";  
           $result = $this->conn->query($sql);  
           if($result->num_rows > 0) { return true; }  
           else  
           {  
                return $this->conn->connect_error; 
           }  
      }

  public function specific_user($table,$email){
         $sql = "SELECT * FROM ".$table." WHERE email='$email'";
         $result = $this->conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               $this->array[] = $row;
            }
           return $this->array;
         } else {
        return $this->conn->connect_error;
    }
  }     

    //!method to select all user from databse
	public function get_all_user($table){
        $user_data = array();
        $sql = "SELECT * FROM ".$table;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user_data[] = $row;
            }
            return $user_data;
        } else {
            return $this->conn->connect_error;
        } 
    }

    public function update_user($table,$data,$email){
        $set = '';
        $x = 1;

        foreach($data as $name => $value) {
          $set .= "$name = '$value'";
          if($x < count($data)) {
            $set .= ',';
          }
          $x++;
        }

      $sql = "UPDATE ".$table." SET ".$set." WHERE email='$email'";

        if ($this->conn->query($sql) == true) {
            return true;
        } else { return false; } 

    }

      public function delete_user($table,$email){
      $sql = "DELETE FROM ".$table." WHERE email='$email'";

      if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        } 
    }

}
?>