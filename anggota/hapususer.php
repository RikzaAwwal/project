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

	if (hapususer($id) > 0) {
		echo "
				<script>
					alert('Akun Berhasil Dihapus!'); 
					document.location.href = 'user.php';
				</script>
			";
	} else {
		echo "
				<script>
					alert('Akun Gagal Dihapus!'); 
					document.location.href = 'user.php';
				</script>
			";
	}
?>