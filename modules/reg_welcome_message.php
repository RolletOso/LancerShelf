<?php

require_once 'utilities/cleaner.php';




		function Registration_WelcomeMessage($receiver_name,$receiver){
$date =  date("d/m/Y")." at ".date("h:i:sa"); 



$receiver_name = clean($receiver_name);
$receiver = clean($receiver);
$sender_name = "LancerShelf Team";
$sender = 15; //#hardcoded #14344

$title = "Welcome to Lancershelf.com" ;
$message = "
							<p>
												Hi ".$receiver_name." ,
												
											</p>
											<p>
												Welcome to LancerShelf 
												You can start-off by [Browsing our Project page]
												
											</p>
											
											<p>
											You can always mail us at support@lancershelf.com for enquiries and support.
											<br>
											
												
												<br>
												t will be nice having you around.
												Thanks for being a part of our platform. I
												 
												<BR>
											
											 <br>
											  
											</p>
								



";

$test_messenger = mysql_query("INSERT INTO pm_messages(sender,receiver,sender_name,date,title,message) VALUES('$sender','$receiver','$sender_name','$date','$title','$message')");
		if($test_messenger) {
			echo "successful";
		}else{
			echo "Error -- something went wrong --  message was not sent";
			}

			
			}
			
			function clean($input_str){		//temporary string cleaner
					$cleaned = mysql_real_escape_string($input_str); 
					$cleaned = htmlentities(stripslashes($cleaned));
					return $cleaned;
		}
?>