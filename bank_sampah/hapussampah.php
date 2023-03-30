<?php 
	require "fungsi.php";
	session_start();

 	if (!isset($_SESSION["login"])) {
 		header("Location: login.php");  
 		exit; //harus kopas semua ke semua halaman	
 	}

	$id = $_GET["id"];

	if (hapussampah($id) > 0) {
		echo "
				<script>
					alert('Data Berhasil Dihapus!'); 
					document.location.href = 'datasampah.php';
				</script>
			";
	} else {
		echo "
				<script>
					alert('Data Gagal Dihapus!'); 
					document.location.href = 'datasampah.php';
				</script>
			";
	}
?>