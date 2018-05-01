<?php



if(isset($_COOKIE['projectalpha'])){

	echo "You are already logged in! <a href='index.html'>Click here to continue</a>";

}else{

session_start();

if($_POST){

$_SESSION['name'] = $_POST['name'];
$_SESSION['password'] = hash('sha1',$_POST['password']);



if($_SESSION['name'] && $_SESSION['password']){

	mysql_connect("localhost", "root", "") or die("problem with connection...");
	mysql_select_db("projectalpha");

	$query = mysql_query("SELECT * FROM users WHERE username ='".$_SESSION['name']."'");
	$numrows = mysql_num_rows($query);

	if($numrows != 0){
	
		while($row = mysql_fetch_assoc($query)){
		
			$dbname = $row['user'];
			$dbpassword = $row['password'];

		}
		if($_SESSION['name']==$dbname){
			if($_SESSION['password']==$dbpassword){
			if(isset($_POST['remember'])){
				if(($_POST['remember']) == 'on'){
					$expire = time()+86400;
					setcookie('projectalpha', $_POST['name'], $expire);
				}
			}
				echo "Login Succesful";
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