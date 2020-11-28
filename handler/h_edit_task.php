<?php
	include_once('../tpl/config.php');
	if($_SESSSION['user']=='admin') header("Location: ../index.php");
	$id_task = $_POST['id_task'];
	$username = $_POST['username'];
	$user_email = $_POST['email'];
	$text_task = $_POST['text_task'];
	$finished = $_POST['finished'];

	$update = $pdo -> prepare('UPDATE T_tasks SET username = ?, user_email = ?, text_task =?, finished = ?, edited = ? WHERE id_task =?');
	$update ->execute([$username, $user_email, $text_task, $finished, 1, $id_task]);

?>