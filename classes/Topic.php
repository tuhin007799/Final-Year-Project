<?php
/**
 * !class for topic manipulation
 * !add and delete topic data 
 * !update user profile info and password.
 **/
class Topic extends Database{

  public function update_topic($table,$data,$id){
        $set = '';
        $x = 1;

        foreach($data as $name => $value) {
         $set .= "$name = '$value'";
         if($x < count($data)) {
             $set .= ',';
         }
         $x++;
     }

     $sql = "UPDATE ".$table." SET ".$set." WHERE topic_id='$id'";

        if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        } 

    }

   public function select_specific_topic($table,$sem_id)
    {
        $info = array();
        $sql = "SELECT * FROM ".$table." WHERE topic_id='$sem_id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $info[] = $row;
            }
            return $info;
        } else {
            return $this->conn->connect_error;
        }
    }


  public function add_topic($table, $data)  
    {  
        $sql = "INSERT INTO ".$table." (";            
        $sql .= implode(",", array_keys($data)) . ') VALUES (';            
        $sql .= "'" . implode("','", array_values($data)) . "')";

        if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        }   
    }


    public function select_topic($table)
    {
      $info = array();
      $sql = "SELECT * FROM ".$table." ORDER BY topic_id ASC";
    	$result = $this->conn->query($sql);
    	if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			$info[] = $row;
  			}
  			return $info;
		} else {
            return $this->conn->connect_error;
		}
    }

    public function select_topic_by_lecture($table,$lecture_id)
    {
      $info = array();
      $sql = "SELECT * FROM ".$table." WHERE lecture_id='$lecture_id'";
      $result = $this->conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $info[] = $row;
        }
        return $info;
    } else {
            return $this->conn->connect_error;
    }
    }

    public function delete_topic($table,$id){
     $sql = "DELETE FROM ".$table." WHERE topic_id='$id'";

     if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        } 
    }
}
/**
 * !class for topic manipulation
 * !add and delete topic data 
 * !update user profile info and password.
 **/
?>