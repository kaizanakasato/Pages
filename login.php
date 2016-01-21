<?php
	session_start();

	// ログインボタンが押された
	if($_POST['login']){
		$userid = htmlspecialchars($_POST['userid'], ENT_QUOTES);
		$passwd = htmlspecialchars($_POST['passwd'], ENT_QUOTES);
		
		// Mysqlへ接続
		$sqlConn = mysql_connect('localhost', 'worker', 'test');
		if($sqlConn){
			mysql_select_db('test_Users', $sqlConn);
			$loginSql = 'select userName from users_tb
					where userId = "' . $userid . '"
					and passwd = "' . $passwd . '"';
			
			$loginQuery = mysql_query($loginSql, $sqlConn);
		}
		
		if(mysql_num_rows($loginQuery) == 1){
			$_SESSION['userName'] = mysql_fetch_object($loginQuery)->userName;
			$_SESSION['login'] = 1;
			header('Location: top.php');
		}else{
			header('Location: index.html');
		}
	}
	
	// ゲストボタンが押された
	else if($_POST['guest']){
		$userid = '000000';
		$passwd = 'guest';
		$_SESSION['userName'] = 'Guest';
		$_SESSION['login'] = 2;
		header('Location: top.php');
	}
	
	// // 例外
	// else{
	// 	$_SESSION['login'] = 3;
	// 	header('Location: not.php');
	// }
?>