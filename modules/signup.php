<?php
require_once 'db.php';
require_once 'utilities/cleaner.php';
require_once 'reg_welcome_message.php';
if(isset($_POST)){
	$broom = new cleaner();
$fname = $broom->clean($_POST['fname']);
$lname = $broom->clean($_POST['lname']);
$email = $broom->clean($_POST['email']);
$city = $broom->clean($_POST['city']);
$gender = $broom->clean($_POST['gender']);
$password = $broom->clean($_POST['password']);
$cpassword = $broom->clean($_POST['cpassword']);
$count = 2;
if ($fname && $lname && $email && $city && $gender && $password && $cpassword) {
if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
    if (strlen($password) > 5) {
			if ($password == $cpassword) {
            $remail = mysql_query("SELECT email FROM users WHERE email='$email'");
            $checkemail = mysql_num_rows($remail);
            if ($checkemail > 0) {
                echo "This email is already registered! Please type another email...";
            } else {	
						$passwordhash = hash('sha1',$password);
						$test = mysql_query("INSERT INTO users(fname,lname,email,city,gender,password) VALUES('$fname','$lname','$email','$city','$gender','$passwordhash')");
					
						if($test) {
							echo "Registration successful";
								$last_id = mysql_insert_id();
							Registration_WelcomeMessage($fname,$email);
						}else{echo "failure!";}
            }
        } else {
            echo "Your passwords don't match!";
        }
    } else {
        echo "Your password is too short! A password between 6 and 15 charachters is required!";
    }
	}else{
			echo "Please use a valid email!";
	}
} else {
    echo "You have to complete the form!";
}
}else{echo "NO data sent";}
?>