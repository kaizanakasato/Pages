<?php
	session_start();

	// エンコーディング処理
	mb_language("uni");
	mb_internal_encoding("utf-8");
	mb_http_input("auto");
	mb_http_output("utf-8");

	// フォームからの読み込み
	$queType = htmlspecialchars($_POST['queType'],ENT_QUOTES);
	$year = htmlspecialchars($_POST['year'],ENT_QUOTES);
	$season = htmlspecialchars($_POST['season'],ENT_QUOTES);
	$queNum = htmlspecialchars($_POST['queNum'],ENT_QUOTES);
	$questionText = htmlspecialchars($_POST['questionText'],ENT_QUOTES);
	$answerText = array(htmlspecialchars($_POST['answerText1'],ENT_QUOTES),
						htmlspecialchars($_POST['answerText2'],ENT_QUOTES),
						htmlspecialchars($_POST['answerText3'],ENT_QUOTES),
						htmlspecialchars($_POST['answerText4'],ENT_QUOTES),);
	$answer = htmlspecialchars($_POST['answer'],ENT_QUOTES);
	$commentary = htmlspecialchars($_POST['commentary'],ENT_QUOTES);
	
	// 改行処理
	$questionText = nl2br($questionText);
	for($i=0; $i<4; $i++)
		$answerText[$i] = nl2br($answerText[$i]);
	
	// // テスト　値確認
	// printf($queType); echo "<br>";
	// printf($year); echo "<br>";
	// printf($season); echo "<br>";
	// printf($queNum); echo "<br>";
	// printf($questionText); echo "<br>";
	// printf($answerText[0]); echo "<br>";
	// printf($answerText[1]); echo "<br>";
	// printf($answerText[2]); echo "<br>";
	// printf($answerText[3]); echo "<br>";
	// printf($answer); echo "<br>";
	// printf($commentary); echo "<br>";
	
	
	// ------------------------------------------------------------
	$_SESSION['roopValue'] = 1;
	
	if($queType == 'ip'){
		$roopValue_queType[0] = 'checked';
		$roopValue_queType[1] = '';
		$roopValue_queType[2] = '';
	}else if($queType == 'fea'){
		$roopValue_queType[0] = '';
		$roopValue_queType[1] = 'checked';
		$roopValue_queType[2] = '';
	}else if($queType == 'teach'){
		$roopValue_queType[0] = '';
		$roopValue_queType[1] = '';
		$roopValue_queType[2] = 'checked';
	}
	$_SESSION['roopValue_queType'] = $roopValue_queType;
	$_SESSION['roopValue_year'] = $year;
	if($season == 'spring'){
		$roopValue_season[0] = 'checked';
		$roopValue_season[1] = '';
	}else if($season == 'autumn'){
		$roopValue_season[0] = '';
		$roopValue_season[1] = 'checked';
	}
	$_SESSION['roopValue_season'] = $roopValue_season;
	
	$sqlConn = mysql_connect('localhost', 'questionWorker', 'test');
	mysql_set_charset("utf8",$sqlConn);
	if($sqlConn){
			mysql_select_db('test_question', $sqlConn);
			$loginSql = 'insert into temp_questions(QuestionType, Year, Season, QuestionNumber, QuestionText, AnswerText0, AnswerText1, AnswerText2, AnswerText3, Answer, Commentary)
						 values ("'.$queType.'", "'.$year.'", "'.$season.'", "'.$queNum.'", "'.$questionText.'", "'.$answerText[0].'", "'.$answerText[1].'", "'.$answerText[2].'", "'.$answerText[3].'", "'.$answer.'", "'.$commentary.'");';
			$loginQuery = mysql_query($loginSql, $sqlConn);
			echo 'true';
		}
	echo mysql_error($sqlConn);
	// Header('Location:questionPostIndex.php');
?>