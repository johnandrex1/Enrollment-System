<?php
session_start();


if(isset($_POST['updatesavebtn'])){
	if(isset($_SESSION['u_name'])){
		include_once 'dbhinc.php';
		
		$id = $_SESSION['updateid'];
		$pw = mysqli_real_escape_string($conn, $_POST['newpassword']);
		$pw1 = mysqli_real_escape_string($conn, $_POST['newpassword1']);
		
		//Check for errors	
		//check if empty
		if(empty($pw) || empty($pw1)){
			//return to updateusers page	
			$_SESSION['updatestatus']='Password empty';
			header("Location: ../updateusers.php");				
			exit();				
		}
		//check if passwords are equal
		elseif(strcmp($pw, $pw1) != 0){
			//returns to updateusers page
			$_SESSION['updatestatus']='Password not equal';
			header("Location: ../updateusers.php");		
			exit();
		}
		else{
		
			//Hashing the password
			$hashedpwd = password_hash($pw, PASSWORD_DEFAULT);
			//$insertuser ="INSERT INTO users (user_name, user_password) VALUES ('$uname', '$hashedpwd');";
			//update user password
			$updateuser = "UPDATE users SET user_password='$hashedpwd' WHERE user_id='$id'";
			mysqli_query($conn, $updateuser);
			unset($_SESSION['updateid']);
			unset($_SESSION['updatename']);
			$_SESSION['updatestatus']='Success';
			header("Location: ../updateusers.php");
			exit();
			
		}
		
	}else{
		header("Location: main.php");
		exit();
	}
}
if(isset($_POST['updatecancelbtn'])){
	if(isset($_SESSION['u_name'])){
		unset($_SESSION['updateid']);
		unset($_SESSION['updatename']);
		header("Location: ../updateusers.php");
		exit();		
	}else{
		header("Location: main.php");
		exit();
	}
}else{
	header("Location: ../updateusers.php");
		exit();
}