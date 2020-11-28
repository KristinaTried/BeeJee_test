<?php
	$pdo = new PDO('mysql:host=localhost;dbname=db_tasks_list;charset=utf8', 'root', '',
	[PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC]);
?>