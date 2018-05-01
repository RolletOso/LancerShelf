<?php
require_once 'db.php';
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST)){

					

// Check connection
		
					
		function clean($input_str){		//temporary string cleaner
					// $input_str = mysqli_real_escape_string($conn,$input_str); 

					// if(get_magic_quotes_gpc()) $input_str = stripslashes($input_str);
					// $cleaned = $conn->real_escape_string($input_str);
					// $cleaned = htmlentities(mysql_fix_string($conn, $cleaned));
					// return $cleaned;
					return $input_str;
		}

		$title = clean($_POST['pTitle']); 						//title of project
		$description =  clean($_POST['description']); 			//project description
		$budget1 =  clean($_POST['customBudget']); 				//a user defined budget
		$budget2 =  clean($_POST['budget']);					//a fixed budget range
		$category =  clean($_POST['category']);					//category of current project
		$skills =  "skills"; //clean($_POST['skills']);						//skills needed for project				
		$payStatus =  "sure"; //clean($_POST['payStatus']);				//whether user has made deposit for project
		$file_url = "http://blablabla.com";//getFileUrl($_POST['files']);				//url of attached files if any 
		$files = "rrue";//isset($_POST['files']); 						//if files were attached or not
		$date = date("Y-m-d h:i:sa");
		$owner_id = "maxwell";//clean($_POST['currentUser']);


if ($title && $description &&  $category && $skills && $files && $payStatus) { //($budget1 || $budget2) &&

$budget = $budget1 || $budget2 ; 

    if (strlen($title) > 12) {

			if ($title !== $description) {

							//Safe db operations starts
						$stmt = $conn->prepare('INSERT INTO projects(title,description,skills,budget,category,files_status,date,owner_id,pay_status)
						VALUES(?,?,?,?,?,?,?,?)');
						$stmt->bind_param('sssssssis', $title, $description, $skills, $budget, $category,  $files_status, $date, $owner_id, $payStatus);
						$stmt->execute();
						//printf("%d Row inserted.\n", $stmt->affected_rows);
						$stmt->close();
						$conn->close();
							//Safe db operations ends
						

            
        } else {
            echo "Your description can not be the same as your title!";
        }
    } else {

        echo "Your project Title is Too Short!";
    }

} else {
    echo "You have to complete the form!";
}
}else{echo "NO data sent";}

?>