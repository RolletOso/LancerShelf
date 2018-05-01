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

$receiver_id = $broom->clean($_REQUEST['a642a77abd7d4f51bf9226ceaf891fcbb5b299b8']);
$receiver_name = $user_profile->get_main_profile($receiver_id,'fname');
$receiver = $broom->clean($user_profile->get_main_profile($receiver_id,'email'));


$title = $sender_name." Wants to Hire You for a Project" ;
$message = "
							<p>
												Hi ".$receiver_name.",
												
											</p>
											<p>
												A LancerShelf user, ".$sender_name." wants to hire you for a project. 
												<br>
												You can Contact ".$sender_name." for the details of the project by replying this private message.
											</p>
											
											<p>
											<br>
											<br>
											 
											  <BR>
												Forwarded to you by the LancerShelf Team.
												<br>
												Thanks for being a part of our platform. It is always nice having you around.
												<BR>
											
											 <br>
											   copyright LancerShelf 2018
											</p>
								



";

$test_messenger = mysql_query("INSERT INTO pm_messages(sender,receiver,sender_name,date,title,message) VALUES('$sender','$receiver','$sender_name','$date','$title','$message')");
		if($test_messenger) {
			echo "successful";
		}else{
			echo "Error -- something went wrong --  message was not sent";
			}

?>