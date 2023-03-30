<?php 
	require 'fungsi.php';
 session_start();

 	

 	if (!isset($_SESSION["login"])) {
 		header("Location: login.php");  
 		exit; //harus kopas semua ke semua halaman	
 	}  

	if (isset($_POST["submit"])) {
		//cek apakah data sudah ditambah atau belum
		setorTransaksi($_POST);
		if (setor($_POST) > 0)  {
			echo "
				<script>
					alert('Data Berhasil Ditambahkan!'); 
					document.location.href = 'datatransaksi.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Ditambahkan!'); 
					document.location.href = 'datatransaksi.php';
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
	<a style="float: right; text-decoration: none;" href="datatransaksi.php">< back</a>
	<h3>Tambah transaksi</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">
	<div id="namaa"></div>
		<?php  if (isset($_POST["coba"])) {
 			$x = $_POST["noanggota"];

 			$z = $_POST["jenis"];

 			$t = $_POST["tanggal"];

 			$y = $_POST["bobot"];

 			$b = query("SELECT * FROM sampah WHERE id_sampah = '$z'")[0];

 			$a = query("SELECT * FROM nasabah WHERE id_nasabah = $x")[0];
 		?>
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?= $a["nama"]; ?></td>
		</tr>
		<tr>
			<td>Jenis Sampah</td>
			<td>:</td>
			<td><?= $b['jenis'] ?></td>
		</tr>
		<tr>
			<td>Bobot</td>
			<td>:</td>
			<td><?= $y ?></td>
		</tr>
		<?php 
			$total = $b['harga']*$y;
		 ?>
		<tr>
			<td>Total</td>
			<td>:</td>
			<td><?= $total ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?= tanggal($t); ?></td>
		</tr>

	</table>
	
		<input type="hidden" name="noanggota" value="<?= $a['id_nasabah'] ?>">
		<input type="hidden"  name="saldo" value="<?= $a['saldo'] ?>">
		<input type="hidden" name="tanggal" value="<?= $t ?>">
		<input type="hidden" name="total" value="<?= $total ?>">
	
	<br>
	<button type="submit" name="submit" class="btn-secondary" style="border-radius: 10px; width: 100%">Tambah</button>
 		<?php }else{?>
 			<table>
 			<tr>
			<td ><label for="noanggota">Nomer anggota </label></td>
			<td> : </td>
			<td><input type="text" name="noanggota" id="noanggota" class="form-control"  required></td>
			</tr>
		<tr>
			<td ><label for="jenis">Jenis Sampah </label></td>
			<td> : </td>
			<td>
				<select id="jenis" name="jenis" class="form-select form-control" style="width: 100%" aria-label="Default select example" required 	>
					<option hidden="true">Jenis Sampah</option>
					<option value="s01">Botol</option>
					<option value="s02">Kardus</option>
					<option value="s03">Koran</option>
					<option value="s04">Duplex</option>
					<option value="s05">Buku</option>
					<option value="s06">Besi</option>
					<option value="s07">Alumunium</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="bobot">bobot (Kg)</label></td>
			<td> : </td>
			<td><input type="text" name="bobot" id="bobot" class="form-control"></td>
			</td>
		</tr>
		<tr>
			<td><label for="tanggal">Tanggal</label></td>
			<td> : </td>
			<td><input type="date" id="tanggal" name="tanggal" class="form-control" required></td>
		</tr>
		<tr>
			<td><button name="coba">Ok</button></td>
			
		</tr>
 			</table>
 		<?php } ?>
	<br>
	</form>
	</div>
	</div>
</body>
</html>