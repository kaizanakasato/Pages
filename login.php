<?php
	session_start();

	// ログインボタンが押された
	if($_POST['login']){
		$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
		$passwd = htmlspecialchars($_POST['passwd'], ENT_QUOTES);
		
		if(($email == login_user) && ($passwd == login_pass)){
			$_SESSION['login'] = 1;
			header('Location: top.php');
		}
		else{
			$_SESSION['error'] = 21;
			header('Location: not.html');
		}
	}
	
	// ゲストボタンが押された
	else if($_POST['guest']){
		$email = 'guest@guest.com';
		$passwd = 'guest';
		$_SESSION['login'] = 2;
		header('Location: top.php');
	}
	
	// 例外
	else{
		$_SESSION['login'] = 3;
		header('Location: not.php');
	}
?>