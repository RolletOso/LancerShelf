<?php

 require_once 'modules/session.php';
 require_once 'modules/profile.ajax.php';

$trap_id = $active_session_id; 
$user_profile = new userprofile();
$user_skills = $user_profile->get_core_profile($trap_id,'skills');
$user_first_name = $user_profile->get_main_profile($trap_id,'fname');
$user_last_name = $user_profile->get_main_profile($trap_id,'lname');
$user_bio = $user_profile->get_main_profile($trap_id,'bio');
$user_phone = $user_profile->get_main_profile($trap_id,'phone');
$user_email = $user_profile->get_main_profile($trap_id,'email');
$user_city = $user_profile->get_main_profile($trap_id,'city');
$user_nickname = $user_profile->get_main_profile($trap_id,'nickname');
$user_avatar = $user_profile->get_main_profile($trap_id,'profilePic');
$user_gender = $user_profile->get_main_profile($trap_id,'gender');
$user_join_date = $user_profile->get_main_profile($trap_id,'date');
$user_birthday = $user_profile->get_main_profile($trap_id,'birthday');
$user_country = $user_profile->get_core_profile($trap_id,'country');
$user_twitter = $user_profile->get_extra_profile($trap_id,'twitter');
$user_facebook = $user_profile->get_extra_profile($trap_id,'facebook');
$user_googleplus = $user_profile->get_extra_profile($trap_id,'googleplus');
$user_skype = $user_profile->get_extra_profile($trap_id,'skype');
$user_github = $user_profile->get_extra_profile($trap_id,'github');
$user_linkedin = $user_profile->get_extra_profile($trap_id,'linkedin');


 ?>