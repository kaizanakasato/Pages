<!--
	TODO
	・ ファイルの拡張子を.phpに変更
	・ h2とArticleの微調整
	・ フォントの変更(fontディレクトリより)
	・ Header変更
	・ 各border変更
	・ php挿入
-->
<?php 
	session_start();
	if(!(($_SESSION['login'] == 1) || ($_SESSION['login'] == 2)))
		header('Location: not.php');
?>

<!DOCTYPE html>
<html Lang="ja">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Template</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
		<?php
			if($_SESSION['login'] == 2)
				echo '<div class="GuestLogin"><p>ゲストアカウントで使用しています。<a href="index.html">ログインする</a></p></div>';
		?>
		<div class="title">
			<a href="top.php">
				<img src="img/logo.png" alt="log">
				<h1>YSE-Learning</h1>
			</a>
			<nav>
				<ul>
					<a href="#"><li>Top</li></a>
					<a href="#"><li>問題一覧</li></a>
					<a href="#"><li>マイページ</li></a>
				</ul>
			</nav>
		</div>
    </header>

	<div id="Middle">
		<aside id="SideMenu">
			<?php
				if($_SESSION['login'] == 1){
					$userName = $_SESSION['userName'];
					echo <<< EOM
						<section class="userName">
							<h4>{$userName} でログイン中</h4>
							<form action="logout.php" method="POST">
								<input type="submit" value="ログアウト">
							</form>
						</section>
EOM;
				}
			?>
			<section>
				<h4>ITパスポート過去問題</h4>
				<ul>
					<li><a href="">平成27春季</a><a href="">平成27秋季</a></li>
					<li><a href="">平成26春季</a><a href="">平成26秋季</a></li>
				</ul>
			</section>
			<section>
				<h4>基本情報午前過去問題</h4>
				<ul>
					<li><a href="">平成27春季</a><a href="">平成27秋季</a></li>
					<li><a href="">平成26春季</a><a href="">平成26秋季</a></li>
				</ul>
			</section>
		</aside>
		<div id="MainContents">
			<article id="content">
				<h2>テストやで</h2>
				test <br>
				test
			</article>
			
			<article>
			</article>
		</div>
	</div>
							
	<footer>
		<small>Copyright &copy; 2016 YSE-Learning, Allrights reserved.</small>
	</footer>
</body>
</html>