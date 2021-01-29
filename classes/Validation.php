<?php
/**
 * !class for validate user data.
 **/

class Validation
{
	public function escape($conn,$string){
		return mysqli_real_escape_string($conn,$string);
	}

	public function make_hash($value){
		return md5($value); 
	}	
}
/**
 * !class for validate user data.
 **/
?>