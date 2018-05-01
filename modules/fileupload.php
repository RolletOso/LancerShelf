					<?php
					//require_once 'db.php';
					//print_r($_FILES);	
					// print_r($_FILES['file']['name']);
					 
					// die;
					$sourcePath = $_FILES['file']['tmp_name'];
					$targetPath_0 = "files/".$_FILES['file']['name'];
					$imageFileType = pathinfo($targetPath_0,PATHINFO_EXTENSION);
					randomize:
					$timestamp_0 = time();
					$datestamp_0 = date("Y-m-d");
					$RNDstamp_0 = mt_rand(1000,9999);
					$RNDstamp_1 = mt_rand(10,99);
					$RNDstamp_2 = mt_rand(2,9) * $RNDstamp_0 + $RNDstamp_1;
					
				$type = ""; 
								switch($_FILES['file']['type']){
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
	case 'application/zip': 
	case 'application/octet-stream': $type = 'zip'; break;
	case 'application/x-7z-compressed': $type = '7-zip'; break;
	case 'text/plain': $type = 'text'; break;
	case 'application/pdf': $type = 'pdf'; break;
	case 'application/vnd.ms-powerpoint':  
	case 'application/vnd.openxmlformats-officedocument.presentationml.presentation': $type = 'powerpoint'; break;
	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 
	case 'application/msword': $type = 'msword'; break;
	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': $type='spreadsheet'; break;
	case 'application/rtf': $type = 'rtf'; break;
	default: $type = 'invalid'; break;
	
	
                                   }
						if($type !== "invalid"){
					if($_FILES['file']['error'] == 0){
						
					
						$project_id = $_POST['project_id'];
					
						$project_id = mysql_real_escape_string($project_id);
						
						
						$user_dir = "files/";
						if (!file_exists($user_dir)) {
								mkdir($user_dir, 0777, true);   }
					
					$targetPath = $_SERVER['DOCUMENT_ROOT']."/".$user_dir."/".$type."_".$RNDstamp_2."_".$timestamp_0."_".$datestamp_0.".".$imageFileType;
					
					
					if (!file_exists($targetPath)) {
					move_uploaded_file($sourcePath, $targetPath);
					$url = $user_dir."/".$type."_".$RNDstamp_2."_".$timestamp_0."_".$datestamp_0.".".$imageFileType;
					$sql_query = mysql_query("INSERT INTO media(gid,uid,type,url,filemap_id) VALUES('$group_i_d','$user_i_d','$type','$url','$filemap_id')");
					
					echo "Successful";
					}else{
					goto randomize;
					}
				}else{
					echo "Error while uploading file!";
							}
							}else{
					
					echo "Unallowed file type!";	}
					
					
		
						
		
				
					
					
					
					?>