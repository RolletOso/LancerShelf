<?php

//start rating module
require_once 'session.php';
require_once 'db.php';


	//echo $active_session_mail;
$source_uid = (int)$active_session_id;
$destination_uid = (int)$_REQUEST['a642a77abd7d4f51bf9226ceaf891fcbb5b299b8_uid'];	
$rating = $_REQUEST['a642a77abd7d4f51bf9226ceaf891fcbb5b299b8_crc'];	
$rating = (int)base64_decode($rating); 

$match_query = mysql_query("SELECT * FROM rating WHERE source_uid = '$source_uid' AND  destination_uid = '$destination_uid'");

$count = mysql_num_rows($match_query);

		if($count < 1){

$test_query = mysql_query("INSERT INTO rating(rating,source_uid,destination_uid) VALUES('$rating','$source_uid','$destination_uid') ");
		if($test_query){
			echo "successful"; }
		}else{
			echo "AlreadyRated";
		}
	?>