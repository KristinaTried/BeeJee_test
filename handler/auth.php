<?php
	session_start();
	if(($_POST['login'] == 'admin') && (md5($_POST['pass']) == '202cb962ac59075b964b07152d234b70')){
		$_SESSION['user'] = 'admin'; echo true;
	}
?>