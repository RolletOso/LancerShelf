<?php

require_once 'session.php';
require_once 'db.php';
require_once 'profile_display.php';


echo'
<li class="dropdown current-user">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									<img src="modules/'.$user_avatar.'" alt="'.$user_first_name.'"> <span class="username">'.$user_first_name.'<i class="ti-angle-down"></i></i></span>
								</a>
								<ul class="dropdown-menu dropdown-dark">
									<li>
										<a href="pages_user_profile.php">
											My Profile
										</a>
									</li>
									
									<li>
										<a class="logMeOut" href="logout.php">
											Log Out
										</a>
									</li>
								</ul>
							</li>


';



?>