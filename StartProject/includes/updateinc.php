<?php

	session_start();
	include 'dbhinc.php';
	$_SESSION['update'] = false;
	
if(isset($_GET['changepassword'])){
	$uid= $_GET['changepassword'];
		if(isset($_SESSION['u_name'])){		
			//$_SESSION['update'] = true;
			$command = "SELECT * FROM users WHERE user_id='$uid'";
			$result = mysqli_query($conn, $command);
			$checkResult = mysqli_num_rows($result);
			if($checkResult == 1){
				$row = mysqli_fetch_assoc($result);
				$_SESSION['updateid'] = $uid;	
				$_SESSION['updatename'] = $row['user_name'];
				$_SESSION['update'] = true;
				//$_SESSION['updateid'] = $upid;
				
				header("Location: ../updateusers.php");
				exit();
			}		
		}else{
			header("Location: ../main.php");
			exit();
		}
}else{
	header("Location: ../index.php");
			exit();
}
?>

