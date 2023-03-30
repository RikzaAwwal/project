<?php 
	require 'fungsi.php';
 	session_start();

 	if (!isset($_SESSION["login"])) {
 		header("Location: login.php");  
 		exit; //harus kopas semua ke semua halaman	
 	}  

	//cek tombol submit 
	if (isset($_POST["submit"])) {
		//cek apakah data sudah ditambah atau belum
		if (tambahsampah($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Ditambahkan!'); 
					document.location.href = 'datasampah.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Ditambahkan!'); 
					document.location.href = 'datasampah.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Sampah</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div class="container" style="margin-top: 20px; background-color: #F5F5F5; width: 600px; border-radius: 15px">
	<div style="padding-top: 15px;padding-bottom: 15px">
	<a style="float: right; text-decoration: none;" href="datasampah.php">< back</a>
	<h3>Tambah Data Sampah</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td ><label for="id">ID Sampah</label></td>
			<td> : </td>
			<td><input type="text" name="id" id="id" class="form-control" required></td>
		</tr>
		<tr>
			<td><label for="jenis">Jenis Sampah</label></td>
			<td>:</td>
			<td><input type="text" name="jenis" id="jenis" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="harga">Harga/Kg</label></td>
			<td> : </td>
			<td><input type="text" name="harga" id="harga" class="form-control" required></td>
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