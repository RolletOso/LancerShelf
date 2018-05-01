<?php
require_once 'db.php';
class cleaner{
	
	public function clean($input_str){		//temporary string cleaner
					$cleaned = mysql_real_escape_string($input_str); 
					$cleaned = htmlentities(stripslashes($cleaned));
					return $cleaned;
		}
}
		?>