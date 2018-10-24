<?php //start/connects to session
	session_start();
?>
<html>
<head>
	<title></title>
</head>

<body>

<?php
//check if user is logged in
	if(isset($_SESSION['u_name'])){
		//form for creating a new user
	echo '	</div>
			<h2>Add User</h2>
						<form action="includes/adduserinc.php" method="POST">
							<input type="text" name="username" placeholder="Username">
							<br><br>
							<input type="password" name="password" placeholder="Password">
							<br><br>
							<input type="password" name="password2" placeholder="Enter password again">
							<br><br>
							<button type="Submit" name="createbtn">Create User</button>
						</form>				
			</div>';
	}else{
		//redirect to main.php if not logged in
		header("Location: main.php");
		exit();
	}
?>
	
</body>
</html>