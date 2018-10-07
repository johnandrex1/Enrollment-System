<?php
// ---------------------------------------------------------------------------
//check if user clicks sumbit button in adduser.php
if (isset($_POST['createbtn'])){
	//includes/grant access to database connection using dbhinc.php
	include_once 'dbhinc.php';
	
	//gets the data in the adduser.php and converts them to string
	// to avoid code insertion
	$uname = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['password2']);
	
	//Check for errors	
	//check if empty
	if(empty($uname) || empty($pwd) || empty($pwd2)){
		//return to adduser page
		header("Location: ../adduser.php?adduser=empty");				
		exit();				
	}
	//check if passwords are equal
	elseif(strcmp($pwd, $pwd2) != 0){
		//returns to adduser page
		header("Location: ../adduser.php?adduser=passwordnotequal");
		exit();
	}
	else{
		//Check if username is existing
		$checkname = "SELECT * FROM users WHERE user_name='$uname'";
		$result = mysqli_query($conn, $checkname);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck>0){
			header("Location: ../adduser.php?adduser=UsernameUsed");
			exit();
		} else{
			//Hashing the password
			$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
			//Insert user to the database
			$insertuser ="INSERT INTO users (user_name, user_password) VALUES ('$uname', '$hashedpwd');";
			mysqli_query($conn, $insertuser);
			header("Location: ../index.php?adduser=sucess");
			exit();
		}
	}
	
} else{
	header("Location: ../index.php");
	exit();
}
