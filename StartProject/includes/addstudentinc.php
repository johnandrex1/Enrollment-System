<?php
session_start();
include 'dbhinc.php';

if(isset($_POST['addstudentsubmitbtn'])){
	if(isset($_SESSION['u_name'])){
		
		
		$studsurname = $_POST['studsurname'];
		$studfirstname = $_POST['studfirstname'];
		$studmiddlename = $_POST['studmiddlename'];
		$studsex = $_POST['studsex'];
		$studbday = $_POST['studbday'];
		$studreligion = $_POST['studreligion'];
		$studdateenrolled = $_POST['studdateenrolled'];
		$studguardian = $_POST['studguardian'];
		$studguardiannumb = $_POST['studguardiannumb'];
		$studmodeofpayment = $_POST['studmodeofpayment'];
		$studemail = $_POST['studemail'];
		$studyearlevel = $_POST['studyearlevel'];
		
		if(empty($studsurname)||empty($studfirstname)||empty($studmiddlename)||empty($studsex)||empty($studbday)||empty($studreligion)||empty($studdateenrolled)||empty($studguardian)||empty($studguardiannumb)||empty($studmodeofpayment)||empty($studemail)||empty($studyearlevel)){
			//return to addstudent.php if forms are not all fill up
			$_SESSION['addstudenterror']="Fill up all fields";
			header("Location: ../addstudent.php");
			exit();
		}else{
			//format date
			$studenrolled = date("Y-m-d",strtotime($studdateenrolled));
			$studbirthday = date("Y-m-d",strtotime($studbday));
			//insert student info to students table
			$insertstudent="INSERT INTO students (stud_surname, stud_firstname, stud_middlename, stud_sex, stud_birthday, stud_religion, stud_dateenrolled, stud_guardian, stud_guardiannumber, stud_modeofpayment, stud_email, stud_yearlevel) VALUES ('$studsurname', '$studfirstname', '$studmiddlename', '$studsex', '$studbirthday', '$studreligion', '$studenrolled', '$studguardian', '$studguardiannumb', '$studmodeofpayment', '$studemail', '$studyearlevel');";
			mysqli_query($conn, $insertstudent);
			
			//insert student in paymenttable base in his/her payment method
			$getstudid = "SELECT * FROM students WHERE stud_surname='$studsurname' AND stud_firstname='$studfirstname' AND stud_middlename='$studmiddlename' AND stud_birthday='$studbirthday' AND stud_yearlevel='$studyearlevel';";
			$result = mysqli_query($conn, $getstudid);
			$data = mysqli_fetch_assoc($result);
			$studid = $data['stud_id'];
			
			//sqlstatements
			$monthly = "INSERT INTO monthlypayment (stud_id) VALUES  ('$studid')";
			$quarterly = "INSERT INTO quarterlypayment (stud_id) VALUES  ('$studid')";
			$semiannual = "INSERT INTO semiannualpayment (stud_id) VALUES  ('$studid')";
			$fullpayment = "INSERT INTO fullpayment (stud_id) VALUES  ('$studid')";
			
			//if student payment is monthly
			if($studmodeofpayment=="Monthly"){		
				mysqli_query($conn, $monthly);
			}
			//if student payment is qurterly
			elseif($studmodeofpayment=="Quarterly"){			
				mysqli_query($conn, $quarterly);
			}
			//if student payment is semi-annual
			elseif($studmodeofpayment=="SemiAnnual"){
				mysqli_query($conn, $semiannual);
			}
			//if student payment is full payment
			elseif($studmodeofpayment=="FullPayment"){
				mysqli_query($conn, $fullpayment);
			}
			
			//success
			$_SESSION['addstudenterror']="Successfully Added";
			header("Location: ../addstudent.php");
			exit();
		}
				
	}else{
		
		header("Location:main.php");
		exit();
	}
}else{
	
	header("Location: ../addstudent.php");
	exit();
}