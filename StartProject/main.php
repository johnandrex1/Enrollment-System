<!---this class displays the login form and lougout button--->
<?php
//start session
session_start();
?>

<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	
<div>
	<?php
	//check if there is a session or a loggedin user
		if(isset($_SESSION['u_name'])){
			header("Location: index.php");
			exit();
		}else{
			//echo login form if user is not logged in
			echo '
				  <form action="includes/logininc.php" method="POST">			
					<input type="text" placeholder="Username" name="uname" />
					<br><br>				
					<input type="password" placeholder="Password" name="upassword" />			
					<br><br>				
					<button type="submit" name="submitbtn">Login</button>
				  </form><br>	';	

			if (empty ($_SESSION['loginerror'])){
				echo "";
			}else{
			echo $_SESSION['loginerror'];	
			$_SESSION['loginerror']="";			
			}

		}
	?>		
		
</div>

</body>
</html>