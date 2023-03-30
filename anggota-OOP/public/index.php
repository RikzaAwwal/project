<?php 
	require '../app/init.php';

	if (!session_id()) session_start(); //jika tidak ada session, maka jalankan session start

	$app = new App;
	