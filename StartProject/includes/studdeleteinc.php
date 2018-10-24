<?php
	session_start();
	include 'dbhinc.php';
	
	if(isset($_GET['studdelete'])){		
	$studid= $_GET['studdelete'];
	$studpm= $_GET['studpm'];
		if(isset($_SESSION['u_name'])){	
			//sql commands
			$command = "DELETE FROM students WHERE stud_id='$studid'";
			$monthly = "DELETE FROM monthlypayment WHERE stud_id='$studid'";
			$quarterly = "DELETE FROM quarterlypayment WHERE stud_id='$studid'";
			$semiannual = "DELETE FROM semiannualpayment WHERE stud_id='$studid'";
			$full = "DELETE FROM fullpayment WHERE stud_id='$studid'";
			
			mysqli_query($conn, $command);
			
			//if student payment is monthly
			if($studpm=="Monthly"){		
				mysqli_query($conn, $monthly);
			}
			//if student payment is qurterly
			elseif($studpm=="Quarterly"){			
				mysqli_query($conn, $quarterly);
			}
			//if student payment is semi-annual
			elseif($studpm=="SemiAnnual"){
				mysqli_query($conn, $semiannual);
			}
			//if student payment is full payment
			elseif($studpm=="FullPayment"){
				mysqli_query($conn, $full);
			}
			
			$_SESSION['studinfos'] = "Student Deleted Successfully";
			header("Location: ../index.php");
			exit();						
		}else{
			header("Location: ../main.php");
			exit();
		}
	}else{
		header("Location: ../index.php");
			exit();
	}
