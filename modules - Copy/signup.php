
<?php
require_once 'db.php';
if(isset($_POST)){
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

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
						if($test) {echo "Registration successful";}else{echo "failure!";}

            }
        } else {
            echo "Your passwords don't match!";
        }
    } else {

        echo "Your password is too short! You need to type a password between 6 and 15 charachters!";
    }
	
	}else{
			echo "Please type a valid email!";
	}
	
} else {
    echo "You have to complete the form!";
}
}else{echo "NO data sent";}

?>