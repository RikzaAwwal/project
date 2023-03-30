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
  

	//cek tombol submit 
	if (isset($_POST["submit"])) {
		//cek apakah data sudah ditambah atau belum
		if (tambah($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Ditambahkan!'); 
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Ditambahkan!'); 
					document.location.href = 'index.php';
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
	<h3>Tambah Data Anggota</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td ><label for="noanggota">Nomor Anggota </label></td>
			<td> : </td>
			<td><input type="text" name="noanggota" id="noanggota" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="nik">NIK </label></td>
			<td> : </td>
			<td><input type="text" name="nik" id="nik" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="nama">Nama </label></td>
			<td> : </td>
			<td><input type="text" name="nama" id="nama" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="ttl">Tempat, Tanggal Lahir </label></td>
			<td> : </td>
			<td><input type="text" name="tempat" id="ttl" class="form-control" style="width: 48%; display: inline;"><strong> , </strong> <input type="date" name="tl" class="form-control" style="width: 48%;display: inline;"></td>
		</tr>
		<tr>
			<td ><label for="jk">Jenis Kelamin </label></td>
			<td> : </td>
			<td>
				<div class="form-check" style="display: inline; margin-left: 3px">
 					<input class="form-check-input" type="radio" name="jk" id="lk" value="Laki-laki" checked>
  					<label class="form-check-label" for="lk">L</label>
				</div>
				<div class="form-check" style="display: inline;">
  					<input class="form-check-input" type="radio" name="jk" id="pr" value="Perempuan">
					<label class="form-check-label" for="pr">P</label>
				</div>
			</td>
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
		<tr>
			<td ><label for="email">Email </label></td>
			<td> : </td>
			<td><input type="text" name="email" id="email" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="perusahaan">Perusahaan </label></td>
			<td> : </td>
			<td><input type="text" name="perusahaan" id="perusahaan" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="ap">Alamat Perusahaan </label></td>
			<td> : </td>
			<td><input type="text" name="alamatp" id="ap" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="noper">Telepon Perusahaan </label></td>
			<td> : </td>
			<td><input type="text" name="telpp" id="noper" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="jabatan">Jabatan </label></td>
			<td> : </td>
			<td><input type="text" name="jabatan" id="jabatan" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="bidusaha">Bidang Usaha </label></td>
			<td> : </td>
			<td>
				<select id="bidusaha" name="bidusaha" class="form-select form-control" style="width: 100%" aria-label="Default select example" required>
					<option hidden="true">Bidang Usaha</option>
					<option value="Biro Perjalanan Wisata">Biro Perjalanan Wisata</option>
					<option value="Hotel/Homestay/Penginapan">Hotel/Homestay/Penginapan</option>
					<option value="Pusat Oleh-oleh, Souvenir">Pusat Oleh-oleh, Souvenir</option>
					<option value="Transportasi">Transportasi</option>
					<option value="Guide (Pemandu Wisata)">Guide (Pemandu Wisata)</option>
					<option value="Obyek Wisata">Obyek Wisata</option>
					<option value="Restoran/Rumah Makan">Restoran/Rumah Makan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td ><label for="tglmasuk">Tanggal Masuk </label></td>
			<td> : </td>
			<td><input type="date" name="tglmasuk" id="tglmasuk" class="form-control" style="width: 43%"></td>
		</tr>
		<tr>
			<td ><label for="gambar">Gambar</label></td>
			<td> : </td>
			<td><input type="file" name="gambar" id="gambar"></td>
		</tr>
	</table>
	<br>
	<button type="submit" name="submit" class="btn-secondary" style="border-radius: 10px; width: 100%">Tambah Data</button>

	</form>
	</div>
	</div>
</body>
</html>