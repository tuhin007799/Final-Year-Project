<?php
//class for set and get error.
class Message
{
	//variables to store array
	public $errors = array();

    //get list of message
	public function get_message()
	{
		return $this->errors;
	}

	//set message to array
	public function set_message($errors)
	{
		$this->errors[] = $errors;
	}

	//print messages in array
	public function show_message(){
		foreach ($this->errors as $message) {
			echo $message."\n";
		}
	}
}
?>