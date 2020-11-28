<?php 
	session_start();
	if($_SESSSION['user']== 'admin') header("Location: index.php");
	include_once('tpl/config.php');
	$id_task = $_GET['id'];
	$select = $pdo ->prepare('SELECT username, user_email, text_task, finished FROM T_tasks where id_task = ?');
	$select -> execute([$id_task]);
	$task = $select->fetchAll();
?>
<html lang="ru">
<head>
	<link rel="stylesheet" href="css/main.css" /> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div class="main_content">
	<div class='formEditTask'>
		<input type='text' id='frm_edit_username' value=<?=$task[0]['username']?>>
		<input type='text' id='frm_edit_email' value=<?=$task[0]['user_email']?>>
		<input type='text' id='frm_edit_task' value=<?=$task[0]['text_task']?>>
		<?php if($task[0]['finished'] == 1) {?> <input type='checkbox' value='1' class='check_finish' id='check_finish' checked>
		<?php } else { ?> <input type='checkbox' value='1' class='check_finish' id='check_finish'> <?php } ?>
			Задача выполнена
		<p><button class='btn_edit_task' data-id=<?=$id_task?>>Сохранить изменения</button></p>
	</div>
	</div>



<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script type="text/javascript" src="js/admin.js"> </script>
</body>
</html>