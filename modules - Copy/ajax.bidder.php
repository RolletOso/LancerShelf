<?php

//start bidder module
require_once 'session.php';
require_once 'db.php';
require_once 'utilities/cleaner.php';

$broom = new cleaner();



	
$current_user = (int)$active_session_id;
$uid = (int)$active_session_id;
		$bid_price = $broom->clean($_POST['bid_price']); 						//
		$bid_description =  $broom->clean($_POST['bid_description']); 			//
		$completion_time =  $broom->clean($_POST['completion_time']); 				//
		$project_id =  $broom->clean($_POST['project_id']);					//
		$extra_services =  $broom->clean($_POST['extra_services']);			


$match_query = mysql_query("SELECT * FROM bids WHERE uid = '$current_user' AND project_id ='".$project_id."'");

$count = mysql_num_rows($match_query);

		if($count < 1){
			
			
			

$test_query = mysql_query("INSERT INTO `bids`(`project_id`, `bid_price`, `uid`, `completion_time`, `bid_description`, `extra_services`)
							VALUES('$project_id','$bid_price','$uid','$completion_time','$bid_description','$extra_services') ");
		if($test_query){
			echo "successful"; }else{ echo "failure";}
		}else{
			
			$match_query  =	mysql_query("UPDATE `project_status` SET `project_id` = '$project_id', `accepted_uid` = '$uid' WHERE project_id = '".$project_id."' ");
			
	if($match_query){
		echo "successful ---";
	}else{
		echo "failure";
		
	}
			
			
			
		}
	?>