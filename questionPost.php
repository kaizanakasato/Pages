<?php
	mb_language("uni");
	mb_internal_encoding("utf-8");
	mb_http_input("auto");
	mb_http_output("utf-8");

	$queType = htmlspecialchars($_POST['queType'],ENT_QUOTES);
	$year = htmlspecialchars($_POST['year'],ENT_QUOTES);
	$season = htmlspecialchars($_POST['season'],ENT_QUOTES);
	$questionText = htmlspecialchars($_POST['questionText'],ENT_QUOTES);
	$answerText = array(htmlspecialchars($_POST['answerText1'],ENT_QUOTES),
						htmlspecialchars($_POST['answerText2'],ENT_QUOTES),
						htmlspecialchars($_POST['answerText3'],ENT_QUOTES),
						htmlspecialchars($_POST['answerText4'],ENT_QUOTES),);
	$answer = htmlspecialchars($_POST['answer'],ENT_QUOTES);
	$commentary = htmlspecialchars($_POST['commentary'],ENT_QUOTES);
	
	printf($queType); echo "<br>";
	printf($year); echo "<br>";
	printf($season); echo "<br>";
	printf($questionText); echo "<br>";
	printf($answerText[0]); echo "<br>";
	printf($answerText[1]); echo "<br>";
	printf($answerText[2]); echo "<br>";
	printf($answerText[3]); echo "<br>";
	printf($answer); echo "<br>";
	printf($commentary); echo "<br>";
	
	$sqlConn = mysql_connect('localhost', 'questionWorker', 'test');
	mysql_set_charset("utf8",$sqlConn);
	if($sqlConn){
			mysql_select_db('test_question', $sqlConn);
			$loginSql = 'insert into temp_questions(QuestionType, Year, Season, QuestionText)
						 values ("'.$queType.'", "'.$year.'", "'.$season.'", "'.$questionText.'");';
			$loginQuery = mysql_query($loginSql, $sqlConn);
			echo "true\n";
		}
	echo mysql_error($sqlConn);
	// , AnswerText0, AnswerText1, AnswerText2, AnswerText3, Answer, Commentary
	// , $answerText[0], $answerText[1], $answerText[2], $answerText[3], $answer, $commentary
	
	
	
	// $queType = '\''.htmlspecialchars($_POST['queType'],ENT_QUOTES).'\'';
	// $year = '\''.htmlspecialchars($_POST['year'],ENT_QUOTES).'\'';
	// $season = '\''.htmlspecialchars($_POST['season'],ENT_QUOTES).'\'';
	// $questionText = '\''.htmlspecialchars($_POST['questionText'],ENT_QUOTES).'\'';
	// $answerText = array('\''.htmlspecialchars($_POST['answerText1'],ENT_QUOTES).'\'',
	// 					'\''.htmlspecialchars($_POST['answerText2'],ENT_QUOTES).'\'',
	// 					'\''.htmlspecialchars($_POST['answerText3'],ENT_QUOTES).'\'',
	// 					'\''.htmlspecialchars($_POST['answerText4'],ENT_QUOTES).'\'');
	// $answer = '\''.htmlspecialchars($_POST['answer'],ENT_QUOTES).'\'';
	// $commentary = '\''.htmlspecialchars($_POST['commentary'],ENT_QUOTES).'\'';
?>