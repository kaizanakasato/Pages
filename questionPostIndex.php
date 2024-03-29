<!--
	JSとかAjaxとか使って非同期で送信できたらかっこいいかなと思ったけど工数がでかすぎるのであきらめ
	時間があったら実装したい…。
	参考　→　http://ginpen.com/2013/05/07/jquery-ajax-form/
	
	01/29
	画像ファイルのアップロードに対応させたいけど、questionPost.php側で受け取れない
	一旦、そちらの作成は中断する
-->

<?php
	session_start();
	
	if(!isset($_SESSION['roopValue'])){
		$roopValue_queType[0] = 'checked';
		$roopValue_queType[1] = '';
		$roopValue_queType[2] = '';
		$roopValue_year = 27;
		$roopValue_season[0] = 'checked';
		$roopValue_season[1] = '';
	}else if(isset($_SESSION['roopValue'])){
		$roopValue_queType = $_SESSION['roopValue_queType'];
		$roopValue_year = $_SESSION['roopValue_year'];
		$roopValue_season = $_SESSION['roopValue_season'];
	}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>問題投稿</title>
	<link rel="stylesheet" href="questionPost.css">
	<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
	<script>
		$(function() {
			$('input[type=file]').after('<br><span class="imgPreview"></span>');

			// アップロードするファイルを選択
			$('input[type=file]').change(function() {
				var file = $(this).prop('files')[0];

				// 画像以外は処理を停止
				if (! file.type.match('image.*')) {
				// クリア
				$(this).val('');
				$('.imgPreview').html('');
				return;
				}

				// 画像表示
				var reader = new FileReader();
				reader.onload = function() {
				var img_src = $('<img>').attr('src', reader.result);
				$('.imgPreview').html(img_src);
				}
				reader.readAsDataURL(file);
			});
		});
	</script>
</head>
<body>
	<header>
		<h1>問題投稿専用ページ</h1>
		<p>YSE-Learningにて使用する問題を投稿させる専用フォームです。すべて必須項目です。</p>
	</header>
	<div class="QuestionPost">
		<form action="questionPost.php" method="POST">
			<table border="0">
				<tr>
					<th>問題種類</th>
					<td class="questionType">
						<input type="radio" name="queType" id="radioIp" value="ip" <?php echo $roopValue_queType[0];?>>
							<label for="radioIp">ITパスポート</label>
						<input type="radio" name="queType" id="radioFea" value="fea" <?php echo $roopValue_queType[1];?>>
							<label for="radioFea">基本情報技術者試験午前免除</label>
						<input type="radio" name="queType" id="radioTeach" value="teach" <?php echo $roopValue_queType[2];?>>
							<label for="radioTeach">授業</label>
					</td>
				</tr>
					<th>出題年 / 問題番号</th>
					<td>
						<input type="number" name="year" min="16" max="99" value="<?php echo $roopValue_year?>" required>年度
						<span class="numSlash">/</span>
						第<input type="number" name="queNum" min="1" max="100" value="1" required>問
					</td>
				</tr>
				<tr>
					<th>出題時期</th>
					<td class="season">
						<input type="radio" name="season" id="radioSpring" value="spring" <?php echo $roopValue_season[0]?>>
							<label for="radioSpring">春</label>
						<input type="radio" name="season" id="radioAutumn" value="autumn" <?php echo $roopValue_season[1]?>>
							<label for="radioAutumn">秋</label>
					</td>
				</tr>
				<tr>
					<th>問題文</th>
					<td><textarea name="questionText" id="queText" cols="30" rows="10" required></textarea></td>
				</tr>
				<tr>
					<th>解答</th>
					<td>
						<div class="ansText">
							<input type="text" name="answerText1" id="ansText1" placeholder="解答1" required>
							<input type="text" name="answerText2" id="ansText2" placeholder="解答2" required>
							<input type="text" name="answerText3" id="ansText3" placeholder="解答3" required>
							<input type="text" name="answerText4" id="ansText4" placeholder="解答4" required>
						</div>
					</td>
				</tr>
				<tr>
					<th>正解</th>
					<td>
						<div class="ansSelect">
							<input type="radio" name="answer" id="radioAnswer1" value="answer1" checked>
								<label for="radioAnswer1">解答1が正解</label>
							<input type="radio" name="answer" id="radioAnswer2" value="answer2">
								<label for="radioAnswer2">解答2が正解</label>
							<input type="radio" name="answer" id="radioAnswer3" value="answer3">
								<label for="radioAnswer3">解答3が正解</label>
							<input type="radio" name="answer" id="radioAnswer4" value="answer4">
								<label for="radioAnswer4">解答4が正解</label>
						</div>
					</td>
				</tr>
				<tr>
					<th>解説</th>
					<td><textarea name="commentary" id="comm" cols="30" rows="10" required></textarea></td>
				</tr>
				<tr>
					<th>画像ファイル</th>
					<td>
						<form enctype="multipart/form-data" method="post">
							<input type="file" name="uploadFile">
						</form>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="送信" onclick='return confirm("以下の内容でよろしいですか？");'>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>