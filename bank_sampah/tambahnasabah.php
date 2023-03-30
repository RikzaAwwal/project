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
		if (tambahnasabah($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Ditambahkan!'); 
					document.location.href = 'datanasabah.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Ditambahkan!'); 
					document.location.href = 'datanasabah.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Anggota</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div class="container" style="margin-top: 20px; background-color: #F5F5F5; width: 600px; border-radius: 15px">
	<div style="padding-top: 15px;padding-bottom: 15px">
	<a style="float: right; text-decoration: none;" href="datanasabah.php">< back</a>
	<h3>Tambah Data Nasabah</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td ><label for="nama">Nama </label></td>
			<td> : </td>
			<td><input type="text" name="nama" id="nama" class="form-control" required></td>
		</tr>
		<tr>
			<td><label for="nik">NIK</label></td>
			<td>:</td>
			<td><input type="text" name="nik" id="nik" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="alamat" >Alamat </label></td>
			<td> : </td>
			<td><textarea name="alamat" id="alamat" class="form-control" rows="2"></textarea></td>
		</tr>
		<tr>
			<td ><label for="notlp">Nomor Telepon </label></td>
			<td> : </td>
			<td><input type="text" name="notlp" id="notlp" class="form-control" required></td>
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