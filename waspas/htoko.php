<?php 
	require 'function.php';

	$id	= $_GET["id"];

	if (htoko($id) > 0 && hctoko($id) >0) {
		echo "
				<script>
					alert('Data Berhasil Dihapus!'); 
					document.location.href = 'toko.php';
				</script>
			";
	} else {
		echo "
				<script>
					alert('Data Gagal Dihapus!'); 
					document.location.href = 'toko.php';
				</script>
			";
	}
?>