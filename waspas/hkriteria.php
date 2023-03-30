<?php 
	require 'function.php';

	$id	= $_GET["id"];

	if (hkrit($id) > 0) {
		hskrit($id);
		hckrit($id);

		echo "
				<script>
					alert('Data Berhasil Dihapus!'); 
					document.location.href = 'kriteria.php';
				</script>
			";
	} else {
		echo "
				<script>
					alert('Data Gagal Dihapus!'); 
					document.location.href = 'kriteria.php';
				</script>
			";
	}
?>