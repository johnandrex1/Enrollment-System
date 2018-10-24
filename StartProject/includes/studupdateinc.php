<?php
	session_start();
	include 'dbhinc.php';
	$_SESSION['studupdate'] = false;
	
	if(isset($_GET['studedit'])){
		$studid = $_GET['studedit'];
		if(isset($_SESSION['u_name'])){
			$command = "SELECT * FROM students where stud_id='$studid'";
			$result = mysqli_query($conn, $command);
			$checkResult = mysqli_num_rows($result);
			if($checkResult == 1){
				$row = mysqli_fetch_assoc($result);
				$_SESSION['updatestudid'] = $studid;	
				$_SESSION['updatestudlname'] = $row['stud_surname'];
				$_SESSION['updatestudfname'] = $row['stud_firstname'];
				$_SESSION['updatestudmname'] = $row['stud_middlename'];
				
				$_SESSION['updatestudsex'] = $row['stud_sex'];
				$_SESSION['updatestudbday'] = $row['stud_birthday'];
				$_SESSION['updatestudreligion'] = $row['stud_religion'];

				$_SESSION['updatestudgdn'] = $row['stud_guardian'];
				$_SESSION['updatestudgdnnumb'] = $row['stud_guardiannumber'];
				$_SESSION['updatestudemail'] = $row['stud_email'];
				$_SESSION['updatestudyrlvl'] = $row['stud_yearlevel'];
				
				//openmodal
				$_SESSION['studupdate'] = true;
				
				header("Location: ../index.php");
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