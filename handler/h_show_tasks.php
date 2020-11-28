<?php
	session_start();
	include_once("../tpl/config.php");
	
	$sort = $_POST['sort'];
	$currentPage = $_POST['page'];
	$startId = $currentPage * 3;
	
	$select = $pdo -> prepare("SELECT * FROM T_tasks ORDER BY $sort ASC LIMIT ?, 3");
	$select -> bindValue(1, $startId, PDO::PARAM_INT);
	$select -> execute();
	
	echo json_encode($select->fetchAll());
?>