<?php
	session_start();
	include("../tpl/config.php");
	
	$username = trim($_POST['username']);
	$user_email = trim($_POST['email']);
	$text_task = trim($_POST['text_task']);

	$insert = $pdo -> prepare('INSERT INTO T_tasks (username, user_email, text_task, finished) VALUES (?,?,?,?)');
	$insert -> execute([$username, $user_email, $text_task, 0]);


?>