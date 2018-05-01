<?php 

		function uploadFile($project_id,$_FILES){
		    if($_FILES){
				
			$myfile = $_FILES['upload']['name'];
            $temp = $_FILES['upload']['tmp_name'];
            $type = $_FILES['upload']['type'];
			
			switch($_FILES['filename']['type']){
	case 'image/jpeg':
	case 'image/gif':
	case 'image/pjpeg':	
	case 'image/png': 
	case 'image/svg+xml':
	case 'image/tiff': $type = 'image'; break;
	case 'video/mpeg':
	case 'video/mp4': 
	case 'video/webm':
	case 'video/ogg':
	case 'video/x-msvideo':
	case 'video/3gpp':
	case 'video/3gpp2':
	case 'video/quicktime': $type = 'video'; break;
	case 'audio/x-wav':
	case 'audio/webm':
	case 'audio/ogg':
	case 'audio/aac':
	case 'audio/3gpp':
	case 'audio/mpeg': $type = 'audio'; break;
	case 'application/zip': $type = 'zip'; break;
	case 'application/x-7z-compressed': $type = '7-zip'; break;
	case 'application/pdf': $type = 'pdf'; break;
	case 'application/vnd.ms-powerpoint': $type = 'powerpoint'; break;
	case 'application/msword': $type = 'msword'; break;
	case 'application/rtf': $type = 'rtf'; break;
	default: $type = 'invalid'; break;
	
	
                                   }
			if($type != 'invalid'){
				
	//The name of the directory that we need to create.
	$dir = "files/$project_id/$myfile/";
						
	
					if(!is_dir($dir)){
   
						mkdir($dir, 0777, true);
						move_uploaded_file($temp, "files/$user_id/$myfile");
									}
						}
				
			
						} 
			
			}
			
			
			
			
		function timeAgo($time_ago){
			
					$time_ago = strtotime($time_ago);
					$cur_time   = time();
					$time_elapsed   = $cur_time - $time_ago;
					$seconds    = $time_elapsed ;
					$minutes    = round($time_elapsed / 60 );
					$hours      = round($time_elapsed / 3600);
					$days       = round($time_elapsed / 86400 );
					$weeks      = round($time_elapsed / 604800);
					$months     = round($time_elapsed / 2600640 );
					$years      = round($time_elapsed / 31207680 );
					// Seconds
				if($seconds <= 60){
					return "just now";
				}
					//Minutes
				else if($minutes <=60){
					if($minutes==1){
						return "one minute ago";
					}
					else{
						return "$minutes minutes ago";
					}
				}
					//Hours
				else if($hours <=24){
					if($hours==1){
						return "an hour ago";
					}else{
						return "$hours hrs ago";
					}
				}
					//Days
				else if($days <= 7){
					if($days==1){
						return "yesterday";
					}else{
						return "$days days ago";
					}
				}
					//Weeks
				else if($weeks <= 4.3){
					if($weeks==1){
						return "a week ago";
					}else{
						return "$weeks weeks ago";
					}
				}
					//Months
				else if($months <=12){
					if($months==1){
						return "a month ago";
					}else{
						return "$months months ago";
					}
				}
					//Years
				else{
					if($years==1){
						return "one year ago";
					}else{
						return "$years years ago";
					}
				}
}
			
			?>