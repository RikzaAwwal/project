<?php 
	require 'fungsi.php';
 	session_start();
 	$id = $_GET["id"];

 	if (!isset($_SESSION["login"])) {
 		header("Location: login.php");  
 		exit; //harus kopas semua ke semua halaman	
 	}  

 	$sampah = query("SELECT * FROM sampah WHERE id_sampah = '$id'")[0];

	//cek tombol submit 
	if (isset($_POST["submit"])) {
		//cek apakah data sudah ditambah atau belum
		if (editsampah($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Diubah!'); 
					document.location.href = 'datasampah.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Diubah!'); 
					document.location.href = 'datasampah.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Sampah</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div class="container" style="margin-top: 20px; background-color: #F5F5F5; width: 600px; border-radius: 15px">
	<div style="padding-top: 15px;padding-bottom: 15px">
	<a style="float: right; text-decoration: none;" href="datasampah.php">< back</a>
	<h3>Edit Data Sampah</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $id; ?>">
	<table>
		<tr>
			<td ><label for="id">ID Sampah</label></td>
			<td> : </td>
			<td><input type="text" id="id" class="form-control" value="<?= $id; ?>" disabled></td>
		</tr>
		<tr>
			<td><label for="jenis">Jenis Sampah</label></td>
			<td>:</td>
			<td><input type="text" name="jenis" id="jenis" class="form-control" value="<?= $sampah['jenis']; ?>" required></td>
		</tr>
		<tr>
			<td ><label for="harga">Harga/Kg</label></td>
			<td> : </td>
			<td><input type="text" name="harga" id="harga" class="form-control" value="<?= $sampah['harga']; ?>" required></td>
		</tr>
	</table>
	<br>
	<button type="submit" name="submit" class="btn-secondary" style="border-radius: 10px; width: 100%">Tambah</button>
	<br>
	</form>
	</div>
	</div>
</body>
</html>