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
	$kriteria = query("SELECT * FROM krit WHERE kodekrit = '$id'")[0];
	$subkriteria = query("SELECT * FROM subkrit");

	if (isset($_POST["simpan"])) {
		//cek apakah data sudah ditambah atau belum
		if (ukrit($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Diubah!'); 
					document.location.href = 'kriteria.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Diubah!'); 
					document.location.href = 'kriteria.php';
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
					<h1>Edit Kriteria</h1>
					<br>
					<div style="width: 95%">
						<form action="" method="post">
							<input type="hidden" name="kodekrit" value="<?= $kriteria['kodekrit']; ?>"> 
							<h5>Kode Kriteria</h5>
							<input type="text" name="kodekrit" class="form-control" placeholder="Masukan Kode Toko" autocomplete="off" style="width: 100%" required value="<?= $kriteria['kodekrit']; ?>" disabled>
							<br>
							<h5>Nama Kriteria</h5>
							<input type="text" name="nama" class="form-control" placeholder="Masukan Kode Toko"  autocomplete="off"  style="width: 100%" required value="<?= $kriteria['kriteria']; ?>">
							<br>
							<h5>Atribut</h5>
							<?php $value = $kriteria["jenis"]; ?>
							<select name="atribut" class="form-select form-control">
								<option value="Benefit" 
									<?php if ($value == "Benefit") { echo "selected = 'selected'"; } ?>
								>Benefit</option>
								<option value="Cost" 
									<?php if ($value == "Cost") { echo "selected = 'selected'"; } ?>
								>Cost</option>
							</select>
							<br>
							<h5>Bobot</h5>
							<input type="text" name="bobot" class="form-control" placeholder="Masukan Kode Toko"  autocomplete="off"  style="width: 100%" required value="<?= $kriteria['bobot']; ?>">
							<br>
							<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
							<a class="btn btn-success" href="kriteria.php">Kembali</a>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>	
</html>