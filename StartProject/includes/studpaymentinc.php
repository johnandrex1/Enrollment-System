<?php
session_start();
include 'dbhinc.php';

if(isset($_GET['studpayment'])){		
	$studid= $_GET['studpayment'];
	$studpayment= $_GET['studpment'];
		if(isset($_SESSION['u_name'])){	
	
			
			//if student payment is monthly
			if($studpayment=="Monthly"){		
				$monthly = "SELECT * FROM monthly WHERE stud_id='$studid'";
				mysqli_query($conn, $monthly);
			}
			//if student payment is qurterly
			elseif($studpayment=="Quarterly"){			
				
			}
			//if student payment is semi-annual
			elseif($studpayment=="SemiAnnual"){
				
			}
			//if student payment is full payment
			elseif($studpayment=="FullPayment"){
				
			}
			
			//$_SESSION['studinfos'] = "Student Deleted Successfully";
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