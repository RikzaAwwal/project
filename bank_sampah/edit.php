<?php 
	require 'fungsi.php';
 session_start();

 	if (!isset($_SESSION["login"])) {
 		header("Location: login.php");  
 		exit; //harus kopas semua ke semua halaman	
 	}  

 	$id = $_GET["id"]; 
 	
 	$nasabah = query("SELECT * FROM nasabah WHERE id_nasabah = $id")[0];
	//cek tombol submit 
	if (isset($_POST["submit"])) {
		//cek apakah data sudah ditambah atau belum
		if (editnasabah($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Diubah!'); 
					document.location.href = 'datanasabah.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Diubah!'); 
					document.location.href = 'datanasabah.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Anggota</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div class="container" style="margin-top: 20px; background-color: #F5F5F5; width: 600px; border-radius: 15px">
	<div style="padding-top: 15px;padding-bottom: 15px">
	<a style="float: right; text-decoration: none;" href="datanasabah.php">< back</a>
	<h3>Edit Data Nasabah</h3>
	<br>
	<?php 
		$nama = $nasabah['nama'];
		$nik = $nasabah['nik'];
		$notelp = $nasabah['notelp']; 
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $id ?>">
	<table>
		<tr>
			<td ><label for="nama">Nama </label></td>
			<td> : </td>
			<td><input type="text" name="nama" id="nama" class="form-control" value="<?= $nama; ?>"></td>
		</tr>
		<tr>
			<td><label for="nik">NIK</label></td>
			<td>:</td>
			<td><input type="text" name="nik" id="nik" class="form-control" value="<?= $nik; ?>"></td>
		</tr>
		<tr>
			<td ><label for="alamat" >Alamat </label></td>
			<td> : </td>
			<td><textarea name="alamat" id="alamat" class="form-control" rows="1" ><?= $nasabah['alamat']; ?></textarea></td>
		</tr>
		<tr>
			<td ><label for="notlp">Nomor Telepon </label></td>
			<td> : </td>
			<td><input type="text" name="notlp" id="notlp" class="form-control" value="<?= $notelp; ?>"></td>
		</tr>
	</table>
	<br>
	<button type="submit" name="submit" class="btn-secondary" style="border-radius: 10px; width: 100%">Edit</button>
	<br>
	</form>
	</div>
	</div>
</body>
</html>