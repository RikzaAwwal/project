<?php 
	require 'function.php';
	session_start();

 	if (empty($_SESSION["status"])) {
    	header("Location: login.php");    
    	exit;
  	}else if ($_SESSION["status"]!=="admin") {
    	header("Location: halaman_user.php");
   		exit;
  	}
 
	
	$id	= $_GET["id"];

	if (hapus($id) > 0) {
		echo "
				<script>
					alert('Data Berhasil Dihapus!'); 
					document.location.href = 'index.php';
				</script>
			";
	} else {
		echo "
				<script>
					alert('Data Gagal Dihapus!'); 
					document.location.href = 'index.php';
				</script>
			";
	}
?>