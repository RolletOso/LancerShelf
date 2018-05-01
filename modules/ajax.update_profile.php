<?php
 require_once 'db.php';
 require_once 'session.php';
 require_once 'profile.ajax.php';
 require_once 'utilities/cleaner.php';
 require_once 'utilities/unique_key.php';
// require_once 'utilities/activities.php';
  
  $broom = new cleaner();
  $gen = new keygen();
  //$actions = new activities();
  $user_profile = new userprofile();
 
 //print_r($_POST);
// print_r($_POST['skillset']);
  
  $auth = $gen->get_key();
  
  $trap_id = $active_session_id;
	$active_session_id = $broom->clean($active_session_id); 
	$user_current_password = $user_profile->get_main_profile($trap_id,'password');
	$value_2 = $broom->clean($_POST['firstname']);
	$value_3 = $broom->clean($_POST['lastname']);
    $value_4 = $broom->clean($_POST['gender']); 
	$value_5 = $broom->clean($_POST['email']);
	$value_6 = $broom->clean($_POST['phone']);
	$value_7 = hash('sha1',$broom->clean($_POST['password']));
	$value_9 = $broom->clean($_POST['birthday']);
	$value_10 = $broom->clean($_POST['bio']);
	$value_11 = $broom->clean($_POST['city']);
	$value_12 = $broom->clean($_POST['nickname']);
	$value_13 = $broom->clean($_POST['profilePicture']);
 
 $_SESSION['username'] = $value_12;
 
 
 
//Receive profile picture as base 64 encoded string
//read data - decode - and store as image file in directory
$data = $value_13;
if(!empty($data)){
$source = fopen($data,'r');
$filename = $active_session_id."_avatar.png";


$destination = fopen($filename,'w');
stream_copy_to_stream($source,$destination);
fclose($source);
fclose($destination);


$dirname1 = "user_".$active_session_id;
$dirname = dirname('23se45ft67ygh86f/'.$dirname1); 
if(!is_dir($dirname)){
	mkdir('23se45ft67ygh86f/'.$dirname1,0777,true);
echo "this code was ran ---1";
rename($filename,'23se45ft67ygh86f/'.$dirname1.'/'.$filename);

}else{
	echo "this code was ran ---2";
	mkdir('23se45ft67ygh86f/'.$dirname1,0777,true); //#14344
	rename($filename,'23se45ft67ygh86f/'.$dirname1.'/'.$filename);
	
}
//end base 64 image processing

$picUrl = '23se45ft67ygh86f/'.$dirname1.'/'.$filename;
}else{
	
	$picUrl  = $user_profile->get_main_profile($trap_id,'profilePic');
	
}
 if(trim($value_7) == '' || empty($value_7) ){ $value_7  = $user_current_password;}
 
 $test_main_profile_update = mysql_query("UPDATE `users` SET `fname`='$value_2',
 `lname`='$value_3',`gender`='$value_4',`email`='$value_5',`phone`='$value_6',
 `password`='$value_7',`birthday`='$value_9',`bio`='$value_10',
 `city`='$value_11',`nickname`='$value_12',`profilePic`='$picUrl' WHERE  id = '$active_session_id' "); 
 
	if(isset($_POST['skillset'])){
				$skillsArray = $_POST['skillset'];
				$skills = "";
				foreach ($skillsArray as $selectedOption){

				$skills = $skills.",".$selectedOption; 
				}
				$skills = ltrim($skills, ',');
				$core_value_2 = $broom->clean($skills);
	}else{
		$core_value_2 = $broom->clean($user_profile->get_core_profile($trap_id,'skills'));
		
		
	}
				
				
 $test_core_profile_update = mysql_query("UPDATE `profile_core` SET `skills` = '$core_value_2' WHERE uid = '$active_session_id' ");
		 $fetch_id = $active_session_id;
		 $Ftemp = mysql_query("SELECT fname FROM users WHERE id = '$fetch_id' ");
		 $Ltemp = mysql_query("SELECT lname FROM users WHERE id = '$fetch_id' ");
		 $user_first_name =  mysql_result($Ftemp,0);
		 $user_last_name =  mysql_result($Ltemp,0);
		 $desciption = "Upadted your profile details";
		$activity = $desciption;
		$replica_check = mysql_query("SELECT * FROM activities WHERE description ='".trim($desciption)."' ");
		if(!(mysql_num_rows($replica_check) > 0)){
			//do something
		
		$test_activity = mysql_query("INSERT INTO activities(target_user,description) VALUES('$active_session_id','$activity')  ");
		}
 //make "updated his profile notification ** activities here"

 
 $extra_value_3 = $broom->clean($_POST['twitter']);
 $extra_value_4 = $broom->clean($_POST['facebook']);
 $extra_value_5 = $broom->clean($_POST['googleplus']);
 $extra_value_6 = $broom->clean($_POST['github']);
 $extra_value_7 = $broom->clean($_POST['linkedin']);
 $extra_value_8 = $broom->clean($_POST['skype']);
 
 
 $test_extra_profile_update = mysql_query("UPDATE `profile_extra` SET 
`twitter`='$extra_value_3',`facebook`='$extra_value_4',`googleplus`='$extra_value_5',
	`github`='$extra_value_6',`linkedin`='$extra_value_7',`skype`='$extra_value_8' WHERE  uid = '$active_session_id' ");

echo "successful";




?>