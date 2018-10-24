<?php
session_start();

if(isset($_POST['updatestudsavebtn'])){

	if(isset($_SESSION['u_name'])){
		include_once 'dbhinc.php';
		
		$studid = $_SESSION['updatestudid'];
		$studsurname = $_POST['updatestudlname'];
		$studfirstname = $_POST['updatestudfname'];
		$studmiddlename = $_POST['updatestudmname'];
		$studsex = $_POST['updatestudsex'];
		$studbday = $_POST['updatestudbday'];
		$studreligion = $_POST['updatestudreligion'];
		$studguardian = $_POST['updatestudgdn'];
		$studguardiannumb = $_POST['updatestudgdnnumb'];
		$studemail = $_POST['updatestudemail'];
		$studyearlevel = $_POST['updatestudyrlvl'];
		
		if(empty($studsurname)||empty($studfirstname)||empty($studmiddlename)||empty($studsex)||empty($studbday)||empty($studreligion)||empty($studguardian)||empty($studguardiannumb)||empty($studemail)||empty($studyearlevel)){
			//return to addstudent.php if forms are not all fill up
			$_SESSION['updatesavestudent']="Fill up all fields";
			header("Location: ../index.php");
			exit();
		}else{
			//configure date  format
			$studbirthday = date("Y-m-d",strtotime($studbday));			
			$updatestudents = "UPDATE students SET stud_surname='$studsurname', stud_firstname='$studfirstname', stud_middlename='$studmiddlename', stud_sex='$studsex', stud_birthday='$studbirthday', stud_religion='$studreligion', stud_guardian='$studguardian', stud_guardiannumber='$studguardiannumb', stud_email='$studemail', stud_yearlevel='$studyearlevel' WHERE stud_id='$studid' ";
			mysqli_query($conn, $updatestudents);
			//success
			$_SESSION['updatesavestudent']="Successfully Updated";
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