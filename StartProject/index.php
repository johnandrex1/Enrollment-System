<?php 
	include_once 'main.php';
?>
<html>
<head>
	<title></title>
</head>

<body>

<div>
	<h2>HOME</h2>
	<?php
	//run this code if there is a session/someone logged in
		if(isset($_SESSION['u_name'])){
			//echo name of the user logged in
			echo "Your are logged in ".$_SESSION['u_name'];
			
			//button for add new user account and direct to adduser.php
			echo '<form action="adduser.php" method="POST">
					<button type="submit" name="adduserbtn">AddUser</button>
				  </form>';
		}
	?>

</div>

</body>
</html>