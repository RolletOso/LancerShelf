<?php
session_start();

if(!isset($_SESSION['email'])){ // &&isset($_COOKIE['user_email'])
	
	if(!isset($_COOKIE['user_email']) ){
		
		header('Location:http://localhost/ProjectAlpha/STANDARD/login.php?ref='.$_SERVER['SCRIPT_NAME'].'');
	}else{
	$_SESSION['email'] = $_COOKIE['user_email'];
	}

}else{
	
$active_session_mail =  mysql_real_escape_string($_SESSION['email']);
$active_session_id = mysql_real_escape_string($_SESSION['user_id']);

}



?>