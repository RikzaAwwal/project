<?php 
	require "function.php";
	session_start();
	
	if (empty($_SESSION["status"])) {
    	header("Location: login.php");    
    	exit;
  	}else if ($_SESSION["status"]!=="sales") {
    	header("Location: mtoko.php");
    	exit;
  	}
  	
	$id = $_GET["id"];

	$toko = query("SELECT * FROM toko");
	$kriteria = query("SELECT * FROM krit");
	$subkriteria = query("SELECT * FROM subkrit WHERE kodesub = '$id'")[0];

	if (isset($_POST["simpan"])) {
		//cek apakah data sudah ditambah atau belum
		if ($_POST["kriteria"] == "") {
			echo "
				<script>
					alert('Kriteria Belum Dipilih!'); 
					document.location.href = 'tsubkrit.php';
				</script>
			";
		} else if (usubkrit($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Diubah!'); 
					document.location.href = 'subkrit.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Diubah!'); 
					document.location.href = 'subkrit.php';
				</script>
			";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<style>
	.navside{
		position: fixed; 
		z-index: 1;
		top: 50%;
     	left: 50%;
     	transform: translate(0%, -50%);
		left: 10px;
		background-color: black;
		padding: 20px;
		border-radius: 10px;
		width: 15%;
		height: 95%;
	}
	.navside a{
		color: white;
	}
	.navside a:hover{
		color: gray;
	}
</style>
<body style="background-color: lightgray">
		<div class="navside">
			<ul class="nav flex-column">
				<li class="nav-item" style="text-align: center;">
					<img src="img/nopicture.jpg" style="width: 75%; border-radius: 50%">
				</li>
				<br>
				<li class="nav-item">
					<a class="nav-link active" href="index.php">HOME</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="toko.php">Toko</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="kriteria.php">Kriteria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="subkrit.php">Sub Kriteria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="combine.php">Nilai Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="perhitungan.php">Perhitungan</a>
				</li>
			</ul>	
			<div style="position: absolute; bottom: 0; width: 80%">
				<div style="margin-bottom: 10%;">
					<a href="logout.php"><button name="logout" class="btn btn-secondary" style="width: 100%">LOGOUT</button></a>
				</div>
			</div>
		</div>

		<div style="margin-left: 15%;">
			<div style="width: 50%; background-color: white; margin: 25px; border-radius: 10px">
				<div style="padding: 25px">
					<h1>Edit Sub Kriteria</h1>
					<br>
					<div style="width: 95%">
						<form action="" method="post">
							<input type="hidden" name="kodesub" value="<?= $subkriteria['kodesub']; ?>">
							<h5>Kriteria</h5>
							<select name="kriteria" class="form-select form-control">
								<option hidden="true" disabled selected>Pilih Atribut</option>
								<?php foreach ($kriteria as $krit): ?>
									<option value="<?= $krit["kodekrit"]; ?>" 
										<?php if ($krit["kodekrit"] == $subkriteria["kodekrit"]) {
											echo "selected = 'selected'";
										} ?>>
										<?= $krit["kriteria"]; ?>
									</option>
								<?php endforeach ?>
							</select>
							<br>
							<h5>Keterangan</h5>
							<input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan"  autocomplete="off"  style="width: 100%" required value="<?= $subkriteria['keterangan']; ?>">
							<br>
							<h5>Nilai</h5>
							<input type="text" name="nilai" class="form-control" placeholder="Masukan Nilai"  autocomplete="off"  style="width: 100%" required value="<?= $subkriteria['nilai']; ?>">
							<br>
							<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
							<a class="btn btn-success" href="subkrit.php">Kembali</a>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>	
</html>