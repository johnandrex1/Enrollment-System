<?php 
//check if logout button is clicked
if(isset($_POST['logoutbtn'])){
	//start a session to ba able to destroy all sessions in website
	session_start();
	session_unset();
	session_destroy();
	//redirect to index.php
	header("Location: ../index.php");
	exit();
}
?>