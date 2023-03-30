<?php 
	require 'fungsi.php';
	$f="082262656527";
	$enkripsi = enkripsi($f);
	echo $enkripsi;

	$dekripsi = dekripsi($enkripsi);
	echo $dekripsi;
 ?>