<?php
//! class for databse control. 
class Database
{
	public $conn = null; //!connection variables

    private $host = "localhost"; //!host name
	private $user = "root"; //!user name
	private $password = ""; //!user password
	private $database = "easysel"; //!database name
    
    //!default class constructor of database class
	function __construct()
	{
		$this->conn = $this->connectDatabase();	
	}
    
    //!function to setup connection
	private function connectDatabase()
	{
		$db = new mysqli($this->host,$this->user,$this->password,$this->database);
		if ($db->connect_error) {
			die('connection failed. '.$db->connect_errno.": ".$db->connect_error);
		}
	    else { return $db; }
	}

    //!get database connection
	public function get_connection()
    {
        if(!isset($this->conn)) {
        $this->conn = new Database();
        }
        return $this->conn;
	}

    //!make mysqli real escape string
	public function escape($string){
		return mysqli_real_escape_string($this->conn,$string);
	}
	
    //!mysqli query selector
    public function query($sql)
    {
        return $this->conn->query($sql);
    } 
}
//! class for databse control. 
?>