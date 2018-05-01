<?php

//start bid acceptance module
require_once 'session.php';
require_once 'db.php';
require_once 'utilities/cleaner.php';

$broom = new cleaner();

$uid = $broom->clean($_REQUEST['var_6b8a05034c4deffe97fdac7088cd43f1']); //md5 hash of  IdOfUserwithAcceptedBid;
$project_id = $broom->clean($_REQUEST['var_6b8a05034c4deffe97fdac7088cd43f2']); 

$uid = (int)$uid;
$project_id = (int)$project_id;	

$check_existence = mysql_query("SELECT project_id FROM project_status WHERE project_id = '".$project_id."' ");
$count_num = mysql_num_rows($check_existence);

		if($count_num < 1){

$match_query = mysql_query("INSERT INTO `project_status`(`project_id`,`accepted_uid`) VALUES('$project_id','$uid') ");
	if($match_query){
		echo $project_id."successful".$count_num;
	}else{
		echo "failure";
		
	}

		}else{
			
		$match_query  =	mysql_query("UPDATE `project_status` SET `project_id` = '$project_id', `accepted_uid` = '$uid' WHERE project_id = '".$project_id."' ");
			
	if($match_query){
		echo "successful";
	}else{
		echo "failure";
		
	}
		}



	?>