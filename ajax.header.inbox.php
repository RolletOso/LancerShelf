<?php

require_once 'modules/session.php';
require_once 'modules/db.php';

$test_inbox = mysql_query(" SELECT * FROM pm_messages WHERE receiver = '$active_session_mail' AND status = 'unread' "); 
$count = mysql_num_rows($test_inbox);

if($count > 0){$red_dot = '<span class="dot-badge partition-red"></span>';}else{$red_dot="";}
		while($rows = mysql_fetch_assoc($test_inbox)){
		echo '
					<li class="dropdown">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									'.$red_dot.' <i class="ti-comment"></i> <span>MESSAGES</span>
								</a>
								<ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
									<li>
										<span class="dropdown-header"> Unread messages</span>
									</li>
									<li>
										<div class="drop-down-wrapper ps-container">
											<ul>
												<li class="unread">
													<a href="myinbox.php?2ea6201a068c5fa0eea5d81a3863321a87f8d533_a='.$rows['id'].'&2ea6201a068c5fa0eea5d81a3863321a87f8d533_b='.$rows['sender'].'" class="unread">
														<div class="clearfix">
															<div class="thread-image">
																<img src="./assets/images/avatar-2.jpg" alt="">
															</div>
															<div class="thread-content">
																<span class="author">'.$rows['sender_name'].'</span>
																<span class="preview">'.$rows['message'].'</span>
																<span class="time">'.$rows['date'].'</span>
															</div>
														</div>
													</a>
												</li>
												
											</ul>
										</div>
									</li>
									<li class="view-all">
										<a href="pages_messages.php">
											See All
										</a>
									</li>
								</ul>
							</li>
									';
}

?>