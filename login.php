<?php
	session_start();

	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$passwd = htmlspecialchars($_POST['passwd'], ENT_QUOTES);
	
	if(($email == login_user) && ($passwd == login_pass)){
		$_SESSION['login'] = 1;
		header('Location: top.php');
	}
	else
		header('Location: not.html');
?>