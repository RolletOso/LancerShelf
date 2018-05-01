<?php
require_once 'db.php';
require_once 'timeago.php';

	class userprofile{ 
		public function get_main_profile($current_user,$mode='all'){
			
				$user_id = $this->clean($current_user);
				$query_1 = mysql_query("SELECT * FROM users WHERE id ='".$user_id."' ");
				
	while($rows = mysql_fetch_assoc($query_1)){
	$record_set[] = array('id' => $rows['id'],
						'fname' => $rows['fname'],
						'lname' => $rows['lname'],
						'join_date' => timeAgo($rows['date']),
						'gender' => $rows['gender'],
						'email' => $rows['email'],
						'phone' => $rows['phone'],
						'date' => $rows['date'],
						'birthday' => $rows['birthday'],
						'password' => $rows['password'],
						'bio' => $rows['bio'],
						'nickname' => $rows['nickname'],
						'profilePic' => $rows['profilePic'],
						'city' => $rows['city']);
					 }
					 					 
					if($mode == 'all') {
						return $record_set;
					
					}else{
						if(isset($record_set[0][$mode])){
							return $record_set[0][$mode];
						}
						
					}
		}
		
		public function get_core_profile($current_user,$mode='all'){
				$user_id = $this->clean($current_user);
				$query_2 = mysql_query("SELECT * FROM profile_core WHERE uid ='".$user_id."' ");
				if($query_2){
	while($rows = mysql_fetch_assoc($query_2)){
	$record_set[] = array('id' => $rows['id'],
						'skills' => $rows['skills'],
						'country' => $rows['country'],
						'funds' => $rows['funds'],
						'auth_id' => $rows['auth_id'],
						'uid' => $rows['uid']);
						
					 }
					if($mode == 'all') {
						return $record_set;
					
					}else{
						if(isset($record_set[0][$mode])){
							return $record_set[0][$mode];
						}
						
					}
		}else{
			return false;
		}
		
		}
			
			
		
		
		public function get_extra_profile($current_user,$mode='all'){
				$user_id = $this->clean($current_user);
				$query_3 = mysql_query("SELECT * FROM profile_extra WHERE uid ='".$user_id."' ");
				if($query_3){
	while($rows = mysql_fetch_assoc($query_3)){
	$record_set[] = array('id' => $rows['id'],
						'twitter' => $rows['twitter'],
						'facebook' => $rows['facebook'],
						'googleplus' => $rows['googleplus'],
						'github' => $rows['github'],
						'skype' => $rows['skype'],
						'linkedin' => $rows['linkedin']);
				
					 }
					if($mode == 'all') {
						return $record_set;
					
					}else{
						if(isset($record_set[0][$mode])){
							return $record_set[0][$mode];
						}
						
				}
				}else{
					
					return false;
				}
		}
		
	
		
	public function clean($input_str){		//temporary string cleaner
					$cleaned = mysql_real_escape_string($input_str); 
					$cleaned = htmlentities(stripslashes($cleaned));
					return $cleaned;
		}
		
	public function userEmailToId($user_email){
			$mail = $this->clean($user_email);
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
		
	}
	
	//$user_profile = new userprofile();
	//print_r($user_profile->get_main_profile(8));
?>