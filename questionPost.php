<?php
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
	
	
	$sqlConn = mysql_connect('localhost', 'questionWorker', 'test');
	if($sqlConn){
			mysql_select_db('test_question', $sqlConn);
			$loginSql = 'insert into (QuestionType, Year, Season, QuestionText, AnswerText0, AnswerText1, AnswerText2, AnswerText3, Answer, Commentary)
						values ($queType, $year, $season, $questionText, $answerText[0], $answerText[1], $answerText[2], $answerText[3], $answer, $commentary)';
			$loginQuery = mysql_query($loginSql, $sqlConn);
			echo "true";
		}
?>