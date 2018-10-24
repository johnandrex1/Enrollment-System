<?php
//start session
session_start();

//check if user clicks login button in login.php
if(isset($_POST['submitbtn'])){
	//include/grant access to connection to database using dbhinc.php
	include 'dbhinc.php';
	
	//gets the data in the adduser.php and converts them to string
	// to avoid code insertion
	$username =mysqli_real_escape_string($conn,$_POST['uname']);
	$userpassword =mysqli_real_escape_string($conn,$_POST['upassword']);
	
	
	//Check for errors
	//Check if inputs are empty
	if(empty($username)||empty($userpassword)){		
		$_SESSION['loginerror'] = "username or password is empty";
		header("Location: ../main.php?login=empty");		
		exit();
	}else{
		//check if user exist
		$checkname = "SELECT * FROM users WHERE user_name='$username'";
		$result = mysqli_query($conn, $checkname);
		$resultCheck = mysqli_num_rows($result);
		//if account doesnt exist redirect to main.php to login
		if($resultCheck<1){
			$_SESSION['loginerror'] = "username or password is incorrect";
			header("Location: ../main.php?login=error");
			exit();
		}else{
			//check if password is correct
			if($row = mysqli_fetch_assoc($result)){
				//De-hasing the password
				$hashedPwdCheck = password_verify($userpassword, $row['user_password']);
				if($hashedPwdCheck == false){
					//return to main.php if password is incorrect
					$_SESSION['loginerror'] = "username or password iss incorrect";
					header("Location: ../main.php?login=error");
					exit();
				}elseif($hashedPwdCheck == true){
					//Log in the user	
					//insert path of the directory
					$_SESSION['loginerror'] = "";
					//name of the session
					$_SESSION['u_name']= $row['user_name'];
					//redirect to index.php if log in is sucessful
					header("Location: ../index.php?login=sucess");
					exit();
				}
			}
		}
	}

	
} else{
	header("Location: ../main.php");
	exit();
}

