<?php

//start bidder module
require_once 'session.php';
require_once 'db.php';
require_once 'utilities/cleaner.php';
require_once 'utilities/timeago.php';
	
	class projects{
		
					
					public function getProjectDetails($project_id,$mode = 'all'){
						$match_query = mysql_query("SELECT * FROM projects WHERE id ='".$project_id."' ");

						$count = mysql_num_rows($match_query);

					if($count > 0){

				while($rows = mysql_fetch_assoc($match_query)){
						 $record_set[] = array('id' => $rows['id'],
						'title' => $rows['title'],
						'description' => $rows['description'],
						'date' => timeAgo($rows['date']),
						'skills' => $rows['skills'],
						'budget' => $rows['budget'],
						'file_status' => $rows['file_status'],
						'owner_id' => $rows['owner_id'],
						'pay_status' => $rows['pay_status']);
				}
				
				if($mode == 'all') {
						return $record_set;
					
				}else{
						if(isset($record_set[0][$mode])){
							return $record_set[0][$mode];
						}
						
					}
					
					
					}else{
						return "<h1>NO project with this ID exists on our server ! </h1>";
					}
						
						
						
					}
		
	}
	?>