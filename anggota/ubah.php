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
  
	$id = $_GET["id"];

	$anggota = query("SELECT * FROM anggota WHERE id=$id")[0];

	//cek tombol submit 
	if (isset($_POST["submit"])) {
		//cek apakah data sudah ditambah atau belum
		// var_dump($_POST); die;
		if (ubah($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Diubah!'); 
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Diubah!'); 
					document.location.href = 'index.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Anggota</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div class="container" style="margin-top: 20px; background-color: #F5F5F5; width: 600px; border-radius: 15px">
	<div style="padding-top: 15px;padding-bottom: 15px">
	<h3>Ubah Data Anggota</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $anggota["id"]; ?>">  
	<input type="hidden" name="gambarLama" value="<?= $anggota["foto"]; ?>"> 
	<input type="hidden" name="noanggota" value="<?= $anggota["noanggota"]; ?>">
	<input type="hidden" name="nik" value="<?= $anggota["nik"]; ?>">
	<input type="hidden" name="tglmasuk" value="<?= $anggota["tglmasuk"]; ?>">

	<table>
		<tr>
			<td ><label for="noanggota">Nomor Anggota </label></td>
			<td> : </td>
			<td><input type="text" id="noanggota" class="form-control" value="<?= $anggota["noanggota"]; ?>" disabled></td>
		</tr>
		<tr>
			<td ><label for="nik">NIK </label></td>
			<td> : </td>
			<td><input type="text" id="nik" class="form-control" value="<?= dekrip($anggota["nik"]); ?>" disabled></td>
		</tr>
		<tr>
			<td ><label for="nama">Nama </label></td>
			<td> : </td>
			<td><input type="text" name="nama" id="nama" class="form-control" value="<?= $anggota["nama"]; ?>"></td>
		</tr>
		<tr>
			<td ><label for="ttl">Tempat, Tanggal Lahir </label></td>
			<td> : </td>
			<td><input type="text" name="ttl" id="ttl" class="form-control" style="width: 395px; display: inline;" value="<?= $anggota["ttl"]; ?>">
		</tr>
		<tr>
			<td ><label for="jk">Jenis Kelamin </label></td>
			<td> : </td>
			<td>
				<?php
					if ($anggota["jk"] == "Laki-laki") {
				?>
						<div class="form-check" style="display: inline; margin-left: 3px;">
 							<input class="form-check-input" type="radio" name="jk" id="lk" value="Laki-laki" checked disabled>
  							<label class="form-check-label" for="lk">L</label>
						</div>
						<div class="form-check" style="display: inline;">
  							<input class="form-check-input" type="radio" name="jk" id="pr" value="Perempuan" disabled>
							<label class="form-check-label" for="pr">P</label>
						</div>
				<?php
					 } else {
				?>
						<div class="form-check" style="display: inline; margin-left: 3px;">
 							<input class="form-check-input" type="radio" name="jk" id="lk" value="Laki-laki" disabled>
  							<label class="form-check-label" for="lk">L</label>
						</div>
						<div class="form-check" style="display: inline;">
  							<input class="form-check-input" type="radio" name="jk" id="pr" value="Perempuan" checked  disabled>
							<label class="form-check-label" for="pr">P</label>
						</div>
				<?php	 	
					 } 
				?>				
			</td>
		</tr>
		<tr>
			<td ><label for="alamat" >Alamat </label></td>
			<td> : </td>
			<td><textarea name="alamat" id="alamat" class="form-control" rows="2"><?= $anggota["alamat"]; ?></textarea></td>
		</tr>
		<tr>
			<td ><label for="notlp">Nomor Telepon </label></td>
			<td> : </td>
			<td><input type="text" name="notlp" id="notlp" class="form-control" value="<?= dekrip($anggota["notlp"]); ?>"></td>
		</tr>
		<tr>
			<td ><label for="email">Email </label></td>
			<td> : </td>
			<td><input type="text" name="email" id="email" class="form-control" value="<?= dekrip($anggota["email"]); ?>"></td>
		</tr>
		<tr>
			<td ><label for="perusahaan">Perusahaan </label></td>
			<td> : </td>
			<td><input type="text" name="perusahaan" id="perusahaan" class="form-control" value="<?= $anggota["perusahaan"]; ?>"></td>
		</tr>
		<tr>
			<td ><label for="ap">Alamat Perusahaan </label></td>
			<td> : </td>
			<td><input type="text" name="alamatp" id="ap" class="form-control" value="<?= $anggota["alamatp"]; ?>"></td>
		</tr>
		<tr>
			<td ><label for="noper">Telepon Perusahaan </label></td>
			<td> : </td>
			<td><input type="text" name="telpp" id="noper" class="form-control" value="<?= $anggota["noper"]; ?>"></td>
		</tr>
		<tr>
			<td ><label for="jabatan">Jabatan </label></td>
			<td> : </td>
			<td><input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $anggota["jabatan"]; ?>"></td>
		</tr>
		<tr>
			<?php $value = $anggota["bidusaha"] ?>
			<td ><label for="bidusaha">Bidang Usaha </label></td>
			<td> : </td>
			<td>
				<select id="bidusaha" name="bidusaha" class="form-select form-control" style="width: 100%" aria-label="Default select example">
					<option value="Biro Perjalanan Wisata" 
						<?php if ($value == "Biro Perjalanan Wisata") { echo "selected = 'selected'"; } ?>
					>Biro Perjalanan Wisata</option>

					<option value="Hotel/Homestay/Penginapan" 
						<?php if ($value == "Hotel/Homestay/Penginapan") { echo "selected = 'selected'"; } ?>
					>Hotel/Homestay/Penginapan</option>
					<option value="Pusat Oleh-oleh, Souvenir" 
						<?php if ($value == "Pusat Oleh-oleh, Souvenir") { echo "selected = 'selected'"; } ?>
					>Pusat Oleh-oleh, Souvenir</option>
					<option value="Transportasi" 
						<?php if ($value == "Transportasi") { echo "selected = 'selected'"; } ?>
					>Transportasi</option>
					<option value="Guide (Pemandu Wisata)" 
						<?php if ($value == "Guide (Pemandu Wisata)") { echo "selected = 'selected'"; } ?>
					>Guide (Pemandu Wisata)</option>
					<option value="Obyek Wisata" 
						<?php if ($value == "Obyek Wisata") { echo "selected = 'selected'"; } ?>
					>Obyek Wisata</option>
					<option value="Restoran/Rumah Makan" 
						<?php if ($value == "Restoran/Rumah Makan") { echo "selected = 'selected'"; } ?>
					>Restoran/Rumah Makan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td ><label for="tglmasuk">Tanggal Masuk </label></td>
			<td> : </td>
			<td><input type="text" name="tglmasuk" id="tglmasuk" class="form-control" value="<?= $anggota["tglmasuk"]; ?>" disabled></td>
		</tr>
		<tr>
			<td ><label for="gambar">Gambar</label></td>
			<td> : </td>
			<td>
				<img src="img/<?= $anggota["foto"]; ?>" width="40">
				<input type="file" name="gambar" id="gambar">
			</td>
		</tr>
		<tr>
			<td ></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<br>
	<button type="submit" name="submit" class="btn-secondary" style="border-radius: 10px; width: 100%">Ubah Data</button>
	</form>
	</div>
	</div>
</body>
</html>