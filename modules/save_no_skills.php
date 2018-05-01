<?php

//header("Content-Type: text/plain");
require_once 'session.php';
require_once 'db.php';

$skills = "";

	echo $active_session_id;
	
$test_query = mysql_query("INSERT INTO profile_core(skills,uid) VALUES('$skills','$active_session_id') ");
		if($test_query){
			echo "successful"; }
	
	?>