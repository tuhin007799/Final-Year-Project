<?php

class Lecture extends Database{

    public function update_lecture($table,$data,$id){
        $set = '';
        $x = 1;

        foreach($data as $name => $value) {
         $set .= "$name = '$value'";
         if($x < count($data)) {
             $set .= ',';
         }
         $x++;
     }

     $sql = "UPDATE ".$table." SET ".$set." WHERE lecture_id='$id'";

        if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        } 

    }

     public function select_lecture_using_id($table,$id)
    {
        $info = array();
        $sql = "SELECT * FROM ".$table." WHERE lecture_id='$id'";
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

     public function add_lecture($table, $data)  
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

    public function select_lecture($table)
    {
        $info = array();
        $sql = "SELECT * FROM ".$table." ORDER BY lecture_id ASC";
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

    public function select_lecture_by_course($table,$course_id)
    {
        $info = array();
        $sql = "SELECT * FROM ".$table." WHERE course_id='$course_id'";
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

     public function delete_lecture($table,$id){
     $sql = "DELETE FROM ".$table." WHERE lecture_id='$id'";

     if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        } 
    }
}

?>