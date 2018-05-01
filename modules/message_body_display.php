<?php
require_once 'session.php';
require_once 'profile.ajax.php';
require_once 'utilities/cleaner.php';


$broom = new cleaner();
$active_session_id = $broom->clean($active_session_id); 
$active_session_mail = $broom->clean($active_session_mail);

		
$test_inbox = mysql_query(" SELECT message FROM pm_messages WHERE receiver = '$message_id'  "); //AND status = 'unread'


while($rows = mysql_fetch_assoc($test_inbox)){
	
	
	echo '
	
	<li class="messages-item">
												<a href="myinbox.php?2ea6201a068c5fa0eea5d81a3863321a87f8d533_a='.$rows['id'].'&2ea6201a068c5fa0eea5d81a3863321a87f8d533_b='.$rows['sender'].'">
													<span class="messages-item-star" title="Mark as starred"><i class="fa fa-star"></i></span>
													<img class="messages-item-avatar bordered border-primary" alt="'.$rows['sender_name'].'" src="assets/images/avatar-6.jpg">
													<span class="messages-item-from">'.$rows['sender_name'].'</span>
													<div class="messages-item-time">
														<span class="text">'.$rows['date'].'</span>
													</div>
													<span class="messages-item-subject"> '.$rows['title'].'</span>
													<span class="messages-item-content">'.$rows['message'].'</span>
												</a>
											</li>
	
	
	
	
	';
	
	
	
}
									
								

?>