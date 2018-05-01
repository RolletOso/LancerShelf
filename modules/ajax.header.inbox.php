<?php

require_once 'session.php';
require_once 'db.php';
require_once 'profile_display.php';

$test_inbox = mysql_query(" SELECT * FROM pm_messages WHERE receiver = '$active_session_mail' AND status = 'unread' LIMIT 3 "); 
$count = mysql_num_rows($test_inbox);

if($count > 0){$red_dot = '<span class="dot-badge partition-red">  </span>';}else{$red_dot="";}
echo '<style>
	
	.wrap-text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 75ch;
}
</style>

<li class="dropdown">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									'.$red_dot.' <i class="ti-comment"></i> <span>MESSAGES</span>
								</a>
								<ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
									<li>
										<span class="dropdown-header"> New messages</span>
									</li>
									<li>
										<div class="drop-down-wrapper ps-container">
											<ul>';
											if($count < 1){ echo "<h5 class='text-center text-muted'>No New Messages</h5>"; }

		while($rows = mysql_fetch_assoc($test_inbox)){
			$image_query = mysql_query("SELECT profilePic FROM users WHERE id= '".$rows['sender']."' ");
			$user_avatar = mysql_result($image_query,0);
		echo '
					
												<li class="">
													<a href="myinbox.php?2ea6201a068c5fa0eea5d81a3863321a87f8d533_a='.$rows['id'].'&2ea6201a068c5fa0eea5d81a3863321a87f8d533_b='.$rows['sender'].'" class="">
														<div class="clearfix">
															<div class="thread-image">
																<img style="width:50px; height:50px;" src="modules/'.$user_avatar.'" alt="">
															</div>
															<div class="thread-content">
																<span class="author">'.$rows['sender_name'].'</span>
																<span class="preview wrap-text">'.$rows['message'].'</span>
																<span class="time">'.$rows['date'].'</span>
															</div>
														</div>
													</a>
												</li>
												
											
									';
}
	echo '</ul>
										</div>
									</li>
									<li class="view-all">
										<a href="pages_messages.php">
											See All
										</a>
									</li>
								</ul>
							</li>';

?>