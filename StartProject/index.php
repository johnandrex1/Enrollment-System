<?php 
	//start and check if the use is loggedin through session
	session_start();
	include 'includes/dbhinc.php';
	
if(isset($_SESSION['u_name'])):
?>
<html>
<head>
	<title></title>
	<!--- BOOTSTRAP --->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!--- BOOTSTRAP --->
	
	<!-- DATA TABLE DESIGN -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- DATA TABLE DESIGN -->
</head>

<body>



<!-- STUDENT EDIT MODAL-->
		<div class="modal fade" id="editmodal"> 
			<div class="modal-dialog modal-lg" style="width:80%;" >
				<div class="modal-content">
				<form action="includes/studsaveupdateinc.php" method="POST">
					
					<div class="modal-header">
						<h3> Edit Student</h3>
					</div>
					<div class="modal-body">
					<form action="includes/studsaveupdateinc.php" method="POST">
					<h3>Student</h3>
					<input type="text" value="<?php echo $_SESSION['updatestudlname']; ?>" placeholder="Surname" name="updatestudlname" id="updatestudlname"> &nbsp
					<input type="text" value="<?php echo $_SESSION['updatestudfname']; ?>" placeholder="Surname" name="updatestudfname" id="updatestudfname"> &nbsp
					<input type="text" value="<?php echo $_SESSION['updatestudmname']; ?>" placeholder="Surname" name="updatestudmname" id="updatestudmname">
					<br><br>
					Sex : <select name="updatestudsex" id="updatestudsex">
							<option selected hidden><?php echo $_SESSION['updatestudsex'];?></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					&nbsp
					Birthday: <input type="date" value="<?php echo $_SESSION['updatestudbday'];?>" name="updatestudbday" id="updatestudbday"/> &nbsp
					Religion: <input type="text" value="<?php echo $_SESSION['updatestudreligion']; ?>" name="updatestudreligion" id="updatestudreligion">
					<br><br>
					Year Level : <select name="updatestudyrlvl" id="updatestudyrlvl">
							<option value="<?php echo $_SESSION['updatestudyrlvl'];?>" selected hidden><?php echo $_SESSION['updatestudyrlvl'];?></option>
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
						<br><br>
					<h3>Guardian</h3>
					<input type="text" size="30" value="<?php echo $_SESSION['updatestudgdn']; ?>" placeholder="Guardian name" name="updatestudgdn" id="updatestudgdn">
					<br><br>
					<input type="text" size="30" value="<?php echo $_SESSION['updatestudgdnnumb']; ?>" placeholder="Guardian number" name="updatestudgdnnumb" id="updatestudgdnnumb">
					<br><br>
					<input type="text" size="30" value="<?php echo $_SESSION['updatestudemail']; ?>" placeholder="Surname" name="updatestudemail" id="updatestudemail">
					

					</div>
					<div class="modal-footer">	
						<button type="submit" name="updatestudcancelbtn" id="updatestudcancelbtn" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" name="updatestudsavebtn" id="updatestudsavebtn" class="btn btn-default" >Save</button>
					</div>
					
				</form>		
				</div>
			</div>
		</div>		
<!-- STUDENT EDIT MODAL-->


<!-- STUDENT PAYMENT MODAL -->
		<div class="modal fade" id="editmodal"> 
			<div class="modal-dialog modal-lg" style="width:80%;" >
				<div class="modal-content">
				
					<div class="modal-header">
						<h3> Edit Student</h3>
					</div>
					
					<div class="modal-body">
					

					</div>
					
					<div class="modal-footer">	
						<button type="submit" name="updatestudcancelbtn" id="updatestudcancelbtn" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" name="updatestudsavebtn" id="updatestudsavebtn" class="btn btn-default" >Save</button>
					</div>
						
				</div>
			</div>
		</div>	
<!-- STUDENT PAYMENT MODAL -->

<!----------------------------------- Modal Events --------------------------------->

<!--Show Modal if EDIT is Clicked -->
<?php if(isset($_SESSION['studupdate'])){
	if($_SESSION['studupdate']==true){
		//open modal
		echo "<script>$('#editmodal').modal('show')</script>";		
		$_SESSION['studupdate'] = false; 
	}
} 
?>
<!--Show Modal if EDIT is Clicked -->

<!--------------------------------------------------------------------------------- Modal Events ----------------------------------------------------------------------->



<!--------------------------------------- Buttons ----------------------------------->
<div class="container" style="margin-top: 25px">
	<h2>HOME</h2>
<?php
	//show buttons
		//if(isset($_SESSION['u_name'])){
			//echo name of the user logged in
			echo "Your are logged in ".$_SESSION['u_name'];
?>			
			<!--//button for add new user account and direct to adduser.php-->
	<form action="adduser.php" method="POST">
		<button type="submit" name="adduserbtn">AddUser</button>
	</form>
				  
			<!--//echo a logout button if user is loggedin-->
	<form action="includes/logoutinc.php" method="POST">
		<button type="submit" name="logoutbtn">Logout</button>
	</form>
				  
			<!--//echo a update users password button-->
	<form action="updateusers.php" method="POST">
		<button type="submit" name="useraccbtn">Update useraccounts</button>
	</form> 
				  
			<!--//echo add student button-->	
	<form action="addstudent.php" method="POST">
		<button type="submit" name="addstudbtn">Add new student </button>
	</form>
</div >
<!--------------------------------------------------------------------------------- Buttons ----------------------------------------------------------------------->
	
	
<!--------------------------------------- data table ----------------------------------->
<div class="container" style="margin-top: 75px">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<table class="table table-bordered table-hover">
			<thead><!--table column names-->
				<tr>
					<td>Lastname</td>
					<td>Firstname</td>
					<td>Middlename</td>
					<td>Year Level</td>
					<td>Date Enrolled</td>
					<td>Action</td>
				</tr>
				<tbody>
					<?php
						$studinfo ="SELECT stud_id, stud_surname, stud_firstname, stud_middlename, stud_yearlevel, stud_dateenrolled, stud_modeofpayment FROM students;";
						$result = mysqli_query($conn, $studinfo);
						while($data = mysqli_fetch_assoc($result)){
							//display stdent info
							echo '
								<tr>
									<td>'.$data['stud_surname'].'</td>
									<td>'.$data['stud_firstname'].'</td>
									<td>'.$data['stud_middlename'].'</td>
									<td>'.$data['stud_yearlevel'].'</td>
									<td>'.$data['stud_dateenrolled'].'</td>
									<td><a href="includes/studdeleteinc.php?studdelete='.$data['stud_id'].'&studpm='.$data['stud_modeofpayment'].'">Delete</a>
									<a href="includes/studupdateinc.php?studedit='.$data['stud_id'].'">&nbsp Edit</a>
									<a href="includes/studpaymentinc.php?studpayment='.$data['stud_id'].'&studpment='.$data['stud_modeofpayment'].'">&nbsp Payment</a>
									</td>
								</tr>
							';
						}
					?>
				</tbody>
			</thead>
		</table>
		</div>
	</div>
</div >
<!---------------------------------------------------------------------------------- data table --------------------------------------------------------------------->




<!----------------------------- DATA TABLE DESIGN SCRIPT -------------------------------------->
<script
			  src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>		
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"> </script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"> </script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".table").DataTable({
		"searching":true,
		"paging":true,	
		"columnDefs":[
		{
			//date enrolled cannot be search
			"targets":4,
			"searchable":false,
			
		}
		],
		//ascending order
		"order":[[0, "asc"]]
		}); 			
	});
</script>
<!-------------------------------------------------------------------------- DATA TABLE DESIGN SCRIPT ---------------------------------------------------------------->


<!------------------------------------ List of Alert Box ----------------------------------->
<!-- SHOW ALERT OF ADDSTUDENT.php-->
<?php 
	if(isset($_SESSION['addstudenterror'])){
		echo '<script type="text/javascript">';
		echo 'alert("'.$_SESSION['addstudenterror'].'");</script>';
		unset($_SESSION['addstudenterror']);
	}
?>
<!-- SHOW ALERT OF ADDSTUDENT.php-->

<!-- SHOW ALERT if save student is success -->
<?php
if(isset($_SESSION['updatesavestudent'])){
	echo '<script type="text/javascript">';
	echo 'alert("'.$_SESSION['updatesavestudent'].'");</script>';
	unset($_SESSION['updatesavestudent']);
}
?>
<!-- SHOW ALERT if save student is success -->

<!-- SHOW ALERT if student is deleted -->
<?php
if(isset($_SESSION['studinfos'])){
	echo '<script type="text/javascript">';
	echo 'alert("'.$_SESSION['studinfos'].'");</script>';
	unset($_SESSION['studinfos']);
}
?>
<!-- SHOW ALERT if student is deleted -->
<!--------------------------------------------------------------------- List of Alert Box ---------------------------------------------------------------------------->


</body>
</html>
<!-- redirect to login page if not logged in -->
<?php else:
	header("Location: main.php");
	exit();
?>
<?php endif; ?>
<!-- redirect to login page if not logged in -->