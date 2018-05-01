<?php
require_once 'session.php';
require_once 'profile.ajax.php';
require_once 'utilities/cleaner.php';

$broom = new cleaner();
$user_profile = new userprofile(); 
$active_session_id = $broom->clean($active_session_id);

$sender = $active_session_id;
$trap_id = $active_session_id;
$user_first_name = $user_profile->get_main_profile($trap_id,'fname');
$user_last_name = $user_profile->get_main_profile($trap_id,'lname');

$date =  date("d/m/Y")." at ".date("h:i:sa"); 
$sender_name =  $user_first_name." ".$user_last_name;

$receiver = $broom->clean($_POST['receiver']);
$title = $broom->clean($_POST['title']);
$message = $broom->clean($_POST['message']);

$test_messenger = mysql_query("INSERT INTO pm_messages(sender,receiver,sender_name,date,title,message) VALUES('$sender','$receiver','$sender_name','$date','$title','$message')");
		if($test_messenger) {
			echo "successful";
		}else{
			echo "Error -- something went wrong --  message was not sent";
			}

?>