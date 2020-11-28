<?php 
	session_start();
	if($_SESSION['user'] != 'admin') header("Location: index.php");
	include_once('tpl/config.php');
	$select = $pdo->query("select COUNT(*) as count from t_tasks");
	$count_tasks = $select ->fetchAll();
	$count_pages = ceil($count_tasks[0]['count'] /3); 
?>
<!doctype html>
<html lang="ru">
<head>
	<link rel="stylesheet" href="css/main.css"> 
	<link rel="stylesheet" href="css/admin.css"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div class="main_content">
		<div class='login_admin'> 
			<div class="form_auth_admin" data-show='false'>
				<button onclick="exitAdmin()">Выход</button>
			</div>
			<img class='show_form_auth' src="img/user.png" width=50px height=50px alt="Вход">
		</div>
		
		<h1> To-Do List </h1>
	<p class='msg_success_auth'> Здравствуйте, администратор! </p>
	<p class='msg_success_added'> Задача успешно добавлена! </p>
		<button class='show_add_task' onClick='showFormAddTask()'>Добавить задачу</button>
		<button class='btn_add_task' onClick='addTask()' disabled> Сохранить </button>
		<span class='msg_success_added'>Задача успешно добавлена!</span>
		<div class='formAddTask' data-show='false'>
			<input id='frm_add_username' type='text' placeholder='Ваше имя'>
			<input id='frm_add_email' type='email' placeholder='Адрес электронной почты'>
			<input id='frm_add_text' type='text' placeholder='Текст задачи'>
		</div>
		Сортировка:
		<input class ='radio' name='sort' type='radio' value='username' checked> По имени пользователя
		<input class ='radio' name='sort' type='radio' value='user_email'> По электронной почте
		<input class ='radio' name='sort' type='radio' value='finished'> По статусу
		<div class="tasks_list" data-page='1'>
		</div>
		<div class='pagination'>
			<?php 
				for($i=1; $i<=$count_pages; $i++){?>
				<div class='number_page' data-number=<?=$i?>> <?=$i; ?></div>
			<? } ?>
		</div>
		</div>
	</div>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script type="text/javascript" src="js/main.js"> </script>
<script type="text/javascript" src="js/admin.js"> </script>
</body>
</html>