<?php

require_once 'session.php';
require_once 'db.php';
require_once 'cleaner.php';


$broom = new cleaner();
	
		
		$active_session_id = $broom->clean($active_session_id);
		
		function setActivitiy($description){ 
$broom = new cleaner();
$activity = $broom->clean($description);


$test_activity = mysql_query("INSERT INTO activities(target_user,description) VALUES('$active_session_id','$activity')  ");
	}

	
?>