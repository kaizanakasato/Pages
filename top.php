<?php 
	session_start();
	if(!(($_SESSION['login'] == 1) || ($_SESSION['login'] == 2)))
		header('Location: not.php');
?>

<!DOCTYPE html>
<html Lang="ja">
<head>
	<meta charset="UTF-8">
	<title>YSE-Learning</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<header>
		<?php
			if($_SESSION['login'] == 2)
				echo '<div class="GuestLogin"><p>ゲストアカウントで使用しています。<a href="index.html">ログインする</a></p></div>';
		?>
		<img src="logo.png" alt="logo">
		<h1>YSE-learning</h1>
		<nav>
			<ul>
				<li><a href="#">Top</a></li>
				<li><a href="#">問題一覧</a></li>
				<li><a href="#">マイページ</a></li>
			</ul>
		</nav>
	</header>

	<div id="Middle">
		<aside id="SideMenu">
			<?php
				if($_SESSION['login'] == 1){
					$userName = $_SESSION['userName'];
					echo <<< EOM
						<section class="userName">
							<h4>{$userName}でログイン</h4>
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
					<li><a href="">平成27春季</a></li>
					<li><a href="">平成27秋季</a></li>
					<li><a href="">平成26春季</a></li>
					<li><a href="">平成26秋季</a></li>
				</ul>
			</section>
			<section>
				<h4>基本情報午前過去問題</h4>
				<ul>
					<li><a href="">平成27春季</a></li>
					<li><a href="">平成27秋季</a></li>
					<li><a href="">平成26春季</a></li>
					<li><a href="">平成26秋季</a></li>
				</ul>
			</section>
		</aside>
		<div id="MainContents">
			<article id="content">
                <h3>みんなが苦手な問題</h3>
			</article>
			
			<article  id="Field">
                <label><input type="radio" name="exaple" value="ITパスポート">ITパスポート</label>
                <label><input type="radio" name="exaple" value"基本情報技術者試験">基本情報技術者試験</label>
			</article>
            
            <article>
                
                <label><input type="radio" name="exple" value"出題問題">出題問題</label>
                
                <h4 id="Field1">ITパスポート</h4>
                <div id="question1">
                    <div id="select1">
                        <label><input type="checkbox" name="exaple" value="1">平成27年春季</label>
                        <label><input type="checkbox" name="exaple" value="2">平成27年秋季</label>
                    </div>
                    <div id="select2">
                        <label><input type="checkbox" name="exaple" value="3">平成26年春季</label>
                        <label><input type="checkbox" name="exaple" value="4">平成26年秋季</label>
                    </div>
                </div>
                
                <h4 id="Field1">基本情報技術者試験</h4>
                <div id="question2">
                    <div id="select3">
                        <label><input type="checkbox" name="exaple" value="1">平成27年春季</label>
                        <label><input type="checkbox" name="exaple" value="2">平成27年秋季</label>
                    </div>
                    <div id="select4">
                        <label><input type="checkbox" name="exaple" value="3">平成26年春季</label>
                        <label><input type="checkbox" name="exaple" value="4">平成26年秋季</label>
                    </div>
                </div>
                
                <div id="AllSelect">
                    <label>全選択<input type="checkbox" name="exaple"></label>
                </div>
                
            </article>
            
            <article>
                    <label><input type="radio" name="exple" value"出題問題">分野別切り替え</label>
                    <div id="Genre">
                        <label id="select5"><input type="checkbox" name="exaple" value="1">ストラテジ</label>
                        <label id="select6"><input type="checkbox" name="exaple" value="2">テクノロジ</label>
                        <label id="select7"><input type="checkbox" name="exaple" value="3">マネジメント</label>
                    </div>
                
                
                <div id="AllSelect">
                    <label>全選択<input type="checkbox"></label>
                </div>
            
            </article>
            
            <article>
                    オプション項目
                    <div id="Genre">
                        <label id="select5"><input type="checkbox" name="exaple" value="1">ランダム出題</label>
                        <label id="select6"><input type="checkbox" name="exaple" value="2">苦手克服</label>
                        <label id="select7"><input type="checkbox" name="exaple" value="3">問1から順番に出題する</label>
                    </div>
            </article>
            
            <center><input type="submit" value="出題開始" ></center>
            
		</div>
	</div>
							
	<footer>
		<small>Copyright &copy; 2016 YSE-Learning, Allrights reserved.</small>
	</footer>
</body>
</html>