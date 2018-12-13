
<?php
	session_start();

	include_once 'functions1.inc.php';
	include_once 'dbh.inc.php';
	setOffline($conn);
	
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
?>