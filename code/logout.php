<?php
	session_start();
	session_unset();//ka8arizei to session
	$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
	$logoffSuccess = 'http://'.$_SERVER['HTTP_HOST'].$directory_self.'login-form.php';
	header('Location: ' .$logoffSuccess);
?>
