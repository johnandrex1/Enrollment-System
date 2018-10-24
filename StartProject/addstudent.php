<?php session_start(); ?>

<html>
<head>
<title></title>
</head>

<body>
<?php if(isset($_POST['addstudbtn'])): ?>
	<?php if(isset($_SESSION['u_name'])): ?>
		<form action="includes/addstudentinc.php" method="POST" >
		<h3>Student</h3>
		<input type="text" placeholder="Surname" name="studsurname">
		<br><br>
		<input type="text" placeholder="Firstname" name="studfirstname">
		<br><br>
		<input type="text" placeholder="Middlename" name="studmiddlename">
		<br><br>
		Sex : <select name="studsex">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		<br><br>
		Birthday : <input type="date" name="studbday">
		<br><br>
		<input type="text" placeholder="Religion" name="studreligion">
		<br><br>
		Date Enrolled : <input type="date" name="studdateenrolled">
		<br><br>
		<input type="text" placeholder="Guardian" name="studguardian">
		<br><br>
		<input type="text" placeholder="Guardian number" name="studguardiannumb">
		<br><br>
		Mode of payment : <select name="studmodeofpayment">
				<option value="FullPayment">Full Payment</option>
				<option value="SemiAnnual">Semi-Annual</option>
				<option value="Quarterly">Quarterly</option>
				<option value="Monthly">Monthly</option>
			</select>
		<br><br>
		<input type="text" placeholder="Email" name="studemail">
		<br><br>
		Year Level : <select name="studyearlevel">
				<option value="Grade7">Grade 7</option>
				<option value="Grade8">Grade 8</option>
				<option value="Grade9">Grade 9</option>
				<option value="Grade10">Grade 10</option>
				<option value="Grade10">Grade 11</option>
				<option value="Grade10">Grade 11</option>
				<option value="Grade10">Grade 11</option>
				<option value="Grade10">Grade 11</option>
				<option value="Grade10">Grade 12</option>
				<option value="Grade10">Grade 12</option>
				<option value="Grade10">Grade 12</option>
				<option value="Grade10">Grade 12</option>
				
			</select>
		<br><Br>
		<button type="submit" name="addstudentsubmitbtn">Save</button> 
		</form>
	<?php else: header("Location: main.php");
	exit();
	endif ?>
	
<?php else: header("Location: index.php");
exit();
endif ?>

	

</body>
</html>