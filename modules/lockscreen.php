<?php

require_once 'db.php';


if(isset($_COOKIE['user_email'])){

	echo "<script> location.href='dashboard.php'; </script>";

}else{

session_start();

if($_POST){
	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
	if(isset($_SESSION['user_id'])){
			unset($_SESSION['user_id']);
		
	}

$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = hash('sha1',$_POST['password']);



if($_SESSION['email'] && $_SESSION['password']){

	
$_SESSION['email'] = mysql_real_escape_string($_SESSION['email']);
	$query = mysql_query("SELECT * FROM users WHERE email ='".$_SESSION['email']."'");
	$query_1 = mysql_query("SELECT id FROM users WHERE email ='".$_SESSION['email']."'");
	$_SESSION['user_id'] = $id = mysql_result($query_1,0);
	$numrows = mysql_num_rows($query);

	if($numrows != 0){
	
		while($row = mysql_fetch_assoc($query)){
		
			$dbname = $row['email'];
			$dbpassword = $row['password'];

		}
		if($_SESSION['email']==$dbname){
			if($_SESSION['password']==$dbpassword){
				$_SESSION['password'] = 'No permission to access this variable!';
			if(isset($_POST['remember'])){
				if(($_POST['remember']) == 'on'){
					$expire = time()+86400;
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
			echo "Your email doesn't appear to be correct!";
		}
	
	}else{
		echo "This email is not registered!";	
	}
	
}else{
	echo "You have to type a email and password!";
}
}else{

echo "Access denied!";
exit;
}

						}
?>