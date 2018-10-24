<?php
	session_start();
	include 'dbhinc.php';
	

	if(isset($_GET['delete'])){		
	$uid= $_GET['delete'];
		if(isset($_SESSION['u_name'])){			
			$command = "DELETE FROM users WHERE user_id='$uid'";
			mysqli_query($conn, $command);
			$_SESSION['updatedelete'] = "Deleted Successfully";
			header("Location: ../updateusers.php");
			exit();						
		}else{
			header("Location: ../main.php");
			exit();
		}
	}else{
		header("Location: ../index.php");
			exit();
	}
	