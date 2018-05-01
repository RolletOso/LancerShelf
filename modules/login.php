<?php

require_once 'db.php';
require_once 'utilities/cleaner.php';

$broom = new cleaner();


if(isset($_COOKIE['user_email']) && isset($_SESSION['email'])){

	echo "You are already logged in! <a href='index.html'>Click here to continue</a>";

}else{

session_start();

if($_POST){

$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = hash('sha1',$_POST['password']);



if($_SESSION['email'] && $_SESSION['password']){
$_SESSION['email'] = $broom->clean($_SESSION['email']);
$_SESSION['password'] =  $broom->clean($_SESSION['password']);



	$query = mysql_query("SELECT * FROM users WHERE email ='".$_SESSION['email']."'");
	$numrows = mysql_num_rows($query);

	if($numrows != 0){
	
		while($row = mysql_fetch_assoc($query)){
		
			$dbname = $row['email'];
			$dbpassword = $row['password'];

		}
		if($_SESSION['email']==$dbname){
			if($_SESSION['password']==$dbpassword){
			if(isset($_POST['remember'])){
				if(($_POST['remember']) == 'on'){
					$expire = time()+86400;
						$query_1 = mysql_query("SELECT id FROM users WHERE email ='".$_SESSION['email']."'");
						$_SESSION['user_id'] = $id = mysql_result($query_1,0);
					setcookie('user_email', $_POST['email'], $expire);
					setcookie('user_id', $id, $expire);
				}
			}
				echo "Login successful";
				//header("location:index.html");
			
			}else{
				echo "Your password is incorrect!";
			}
		
		}else{
			echo "Your username doesn't appear to be correct!";
		}
	
	}else{
		echo "This username is not registered!";	
	}
	
}else{
	echo "You have to type a username and password!";
}
}else{

echo "Access denied!";
exit;
}

						}
?>