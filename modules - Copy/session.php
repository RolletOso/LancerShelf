<?php
session_start();

if(!isset($_SESSION['email'])&&isset($_COOKIE['projectalpha'])){
	$_SESSION['email'] = $_COOKIE['projectalpha'];


}else{
$active_session_mail =  mysql_real_escape_string($_SESSION['email']);
$active_session_id = mysql_real_escape_string($_SESSION['user_id']);}



?>