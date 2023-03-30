<?php 
	session_start();

	session_destroy();

	if (isset($_COOKIE['admin'])) {
		setcookie('admin', 'true', time()-86400);
	}else if (isset($_COOKIE['user'])) {
		setcookie('user', 'true', time()-86400);
	}

	header("Location: login.php");
?>