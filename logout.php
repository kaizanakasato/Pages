<?php
	session_start();
	if(!(($_SESSION['login'] == 1) || ($_SESSION['login'] == 2)))
		header('Location: not.php');
	
	$_SESSION = array();
	if(isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-3600, '/');
		
	session_destroy();
	
	header('Location: index.html');
?>