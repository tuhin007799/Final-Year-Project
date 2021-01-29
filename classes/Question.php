<?php
/**
 * 
 */
class Question extends Database
{
	public function post_question($table,$data){
        $sql = "INSERT INTO ".$table." (";            
        $sql .= implode(",", array_keys($data)) . ') VALUES (';            
        $sql .= "'" . implode("','", array_values($data)) . "')";

        if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        }   
    }

    public function get_question($table,$email){
        $sql = "SELECT * FROM ".$table." WHERE post_by='$email' ORDER BY question_id DESC";
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

    public function last_question($table,$email){
        $sql = "SELECT * FROM ".$table." WHERE post_by='$email' ORDER BY question_id DESC LIMIT 1";
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

 public function get_question_by_id($table,$id){
    $sql = "SELECT * FROM ".$table." WHERE question_id='$id'";
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
 
 public function all_question($table){
    $user_data = array();
    $sql = "SELECT * FROM ".$table." ORDER BY question_id DESC LIMIT 20";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $user_data[] = $row;
        }
        return $user_data;
    } else {
        return false;
    } 
  }
    
}

?>