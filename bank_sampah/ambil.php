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
		ambilTransaksi($_POST);
		if (ambil($_POST) > 0)  {
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
	<title>Ambil Saldo</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<script>
	function fjenis(){
		var x = document.getElementById('jenis').value
		window.location.href = '?get=' + x;
	}
</script>
<body style="background-color: lightgray">
	<div class="container" style="margin-top: 20px; background-color: #F5F5F5; width: 600px; border-radius: 15px">
	<div style="padding-top: 15px;padding-bottom: 15px">
	<a style="float: right; text-decoration: none" href="datanasabah.php">< back</a>
	<h3>Ambil Saldo</h3>
	<br>
	<form action="" method="post" >
		<?php  if (isset($_POST["coba"])) {
 			$x = $_POST["noanggota"];

 			$a = query("SELECT * FROM nasabah WHERE id_nasabah = $x")[0];
 		?>
 	<input type="hidden" name="noanggota"  value="<?= $a['id_nasabah'] ?>">
 	<input type="hidden" name="saldo"  value="<?= $a['saldo'] ?>">
	<table> 
		<tr>
			<td ><label for="noanggota">Nomer anggota </label></td>
			<td> : </td>
			<td><input type="text" name="noanggota" id="noanggota" class="form-control" value="<?= $a['id_nasabah'] ?>"  disabled></td>
		</tr>
		<tr>
			<td ><label for="nama" >Nama </label></td>
			<td> : </td>
			<td><input type="text" name="nama" id="nama" value="<?= $a["nama"]; ?> " class="form-control" disabled></input></td>
		</tr>
		<tr>
			<td ><label for="saldo" >Saldo </label></td>
			<td> : </td>
			<td><input type="text" name="saldo" id="saldo" value="<?php echo $a['saldo']; ?>" class="form-control" disabled></input></td>
		</tr>
		<tr>
			<td ><label for="tarik" >Jumlah narik </label></td>
			<td> : </td>
			<td><input name="tarik" id="tarik" class="form-control" min="0" max="<?= $a['saldo'] ?>" required></input></td>
		</tr>
		<tr>
			<td><label for="tanggal">Tanggal</label></td>
			<td> : </td>
			<td><input type="date" id="tanggal" name="tanggal" class="form-control" required></td>
		</tr>
	</table>
	<br>
	<?php if(isset($error)) {?>
		<b><p style="color: red;">Saldo tidak mencukupi</p></b>
	<?php } ?>
	<button type="submit" name="submit" class="btn-secondary" style="border-radius: 10px; width: 100%">Tarik</button>
 		<?php }else{?>
 			<table>
 			<tr>
			<td ><label for="noanggota">Nomer anggota </label></td>
			<td> : </td>
			<td><input type="text" name="noanggota" id="noanggota" class="form-control"  required></td>
			<td><button name="coba">Cari</button></td>
			</tr>
 			</table>
 		<?php } ?>
	<br>
	</form>
	</div>
	</div>
</body>
</html>