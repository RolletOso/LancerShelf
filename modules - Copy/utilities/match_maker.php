<?php
	require_once 'db.php';

	
		function clean($input_str){		//temporary string cleaner
					$cleaned = mysql_real_escape_string($input_str); 
					$cleaned = htmlentities(stripslashes($cleaned));
					return $cleaned;
		}
	
	
	class profileFieldMatcher{
		
	public function userEmailToId($user_email){
			$mail = clean($user_email);
			$sql_query = mysql_query("SELECT id FROM users WHERE email = '$mail' ");
			$count = mysql_num_rows($sql_query);
			while( $rows = mysql_fetch_assoc($sql_query)) {
			if($count == 1) {
			return $rows['id'];
			}elseif($count > 1 ){
			return $count." Users have the same name";
			} else{ return false;}
			}
		}
		
	
		public function userIdToEmail($user_id){
			$id = clean($user_id);
			$sql_query = mysql_query("SELECT email FROM users WHERE id = '$id' ");
			$count = mysql_num_rows($sql_query);
			while( $rows = mysql_fetch_assoc($sql_query)) {
			if($count == 1) {
			return $rows['email'];
			}elseif($count > 1 ){
			return $count." Users have the same email";
			} else{ return false;}
			}
		}
		
	}
	
	
	?>