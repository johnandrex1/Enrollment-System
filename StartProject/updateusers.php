<?php
include_once 'includes/dbhinc.php';
session_start();
?>

<html>
<head>
	<title></title>
	<!-- BOOTSTRAP -->		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP -->		
</head>
<body>

		
<!-- MODAL Update password -->		
		<div class="container">
		<div class="row">
		<div class="col-md-3">

		<div class="modal fade" id="mymodal"> 
			<div class="modal-dialog">
				<div class="modal-content">
				<form action="includes/savepassinc.php" method="POST">
					
					<div class="modal-header">
						<h3> Change Password</h3>
					</div>
					<div class="modal-body">
					<?php echo "<p>".$_SESSION['updatename']."</p>"; ?>
					
					<input type="password" placeholder="New password" name="newpassword" id="newpassword">
					<br><br>
					<input type="password" placeholder="New password" name="newpassword1" id="newpassword1">
					
					</div>
					<div class="modal-footer">
						
						<button type="submit" name="updatecancelbtn" id="updatecancelbtn" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" name="updatesavebtn" id="updatesavebtn" class="btn btn-default">Save</button>
												
					</div>
					
				</form>		
				</div>
			</div>
		</div>

		</div>
		</div>
		</div>

<!-- MODAL Update Password -->

	<div class="">
	<table class="">
		<thead>
			<tr>
				<th>Users</th>
				<th colspan="20">Action</th>
			</tr>
		</thead>		
		<?php			
			if(isset($_SESSION['u_name'])){
				$command ="SELECT * FROM users;";
				$result = mysqli_query($conn, $command);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck>0){
					while($users = mysqli_fetch_assoc($result)){
						echo "<tr><td>".$users['user_name']."</td>";
						echo '<td><a href="includes/updateinc.php?changepassword='.$users['user_id'].'">	Change Password</a>';
						echo '<a href="includes/deleteinc.php?delete='.$users['user_id'].'"> Delete</a></td></tr>';
						echo '<br>';
					}
				}
			}else{
				header("Location: main.php");
				exit();
			}		
		?>				
		<?php 
			if(isset($_SESSION['updatedelete'])){
				echo $_SESSION['updatedelete'];
				echo '<script type="text/javascript">';
				echo 'alert("'.$_SESSION['updatedelete'].'");</script>';
				unset($_SESSION['updatedelete']);
			}
			//show error of save
			if(isset($_SESSION['updatestatus'])){
				echo '<script type="text/javascript">';
				echo 'alert("'.$_SESSION['updatestatus'].'");</script>';
				//echo $_SESSION['updatestatus'];
				unset($_SESSION['updatestatus']);				
			}

		?>
	</table>
	</div>	

	<!--Check if change password is clicked -->
	<?php if(isset($_SESSION['update'])){
		if($_SESSION['update']==true){
			//open modal
			echo "<script>$('#mymodal').modal('show')</script>";
			//unset($_SESSION['updateid']);
			//unset($_SESSION['updatename']);
			$_SESSION['update'] = false; 
		}
	} 
	?>

</body>
</html>
