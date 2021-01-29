<?php
// /**
//  * class for database connection and query.
//  * insert and update data to database.
//  * delete and select data from database.
//  **/

// // namespace classes\connection;

// class Action
// {
// 	public $db = null;
// 	private $conn = null;
// 	private $array = array();

// 	/**
//      * default construction of DB class.
//     **/

// 	function __construct(){
// 		$this->conn = new mysqli("localhost","root","","easysel");
// 		$this->db = $this->conn;
// 		if ($this->db->connect_error) {
// 			die('connection failed. '.$this->db->connect_errno.": ".$this->db->connect_error);
// 		}
// 	}

// 	/**
//      * insert data to specified table of database.
//     **/

// 	public function insert($table, $data)  
//     {  
//         $sql = "INSERT INTO ".$table." (";            
//         $sql .= implode(",", array_keys($data)) . ') VALUES (';            
//         $sql .= "'" . implode("','", array_values($data)) . "')";

//         if ($this->db->query($sql) == true) {
//             return true;
//         } else {
//             return false;
//         }   
//     }

//     public function update($table,$data,$id){
//         $set = '';
//         $x = 1;

//         foreach($data as $name => $value) {
//         	$set .= "$name = '$value'";
//         	if($x < count($data)) {
//         		$set .= ',';
//         	}
//         	$x++;
//     	}

//     	$sql = "UPDATE ".$table." SET ".$set." WHERE id=".$id;

//         if ($this->db->query($sql) == true) {
//             return true;
//         } else {
//             return false;
//         } 

//     }

//     public function delete($table,$id){
//     	$sql = "DELETE FROM ".$table." WHERE id=".$id;

//     	if ($this->db->query($sql) == true) {
//             return true;
//         } else {
//             return false;
//         } 
//     }

//     public function select($table){
//     	$sql = "SELECT * FROM ".$table;
//     	$result = $this->db->query($sql);
//     	if ($result->num_rows > 0) {
//   			while($row = $result->fetch_assoc()) {
//     			$this->array[] = $row;
//   			}
//   			return $this->array;
// 		} else {
//   			return false;
// 		}
//     }

//     public function select_by_id($table,$id){
//     	$sql = "SELECT * FROM ".$table." WHERE email='$id'";
//     	$result = $this->db->query($sql);
//     	if ($result->num_rows > 0) {
//   			while($row = $result->fetch_assoc()) {
//     			$this->array[] = $row;
//   			}
//   			return $this->array;
// 		} else {
//   			return false;
// 		}
//     }

//     public function query($sql){
//     	return $this->db->query($sql);
//     }  
// }

?>