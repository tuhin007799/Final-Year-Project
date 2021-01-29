<?php
/**
 * 
 */
class Semester extends Database
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function add_semester($table, $data)  
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

    public function select_semester($table)
    {
        $info = array();
        $sql = "SELECT * FROM ".$table." ORDER BY sem_id ASC";
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

    public function select_semester_data($table,$sem_id)
    {
        $info = array();
        $sql = "SELECT * FROM ".$table." WHERE sem_id='$sem_id'";
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

    public function update_semester($table,$data,$id){
        $set = '';
        $x = 1;

        foreach($data as $name => $value) {
         $set .= "$name = '$value'";
         if($x < count($data)) {
             $set .= ',';
         }
         $x++;
     }

     $sql = "UPDATE ".$table." SET ".$set." WHERE sem_id='$id'";

        if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        } 

    }

     public function delete_semester($table,$id){
     $sql = "DELETE FROM ".$table." WHERE sem_id='$id'";

     if ($this->conn->query($sql) == true) {
            return true;
        } else {
            return false;
        } 
    }

}
?>