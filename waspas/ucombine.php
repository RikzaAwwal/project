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

	$toko = query("SELECT * FROM toko WHERE kodetoko = '$id'")[0];
	$kriteria = query("SELECT * FROM krit");
	$subkriteria = query("SELECT * FROM subkrit");

	if (isset($_POST["simpan"])) {
		//cek apakah data sudah ditambah atau belum
		$j = 1;
		$a = $_POST["kodetoko"];
		foreach ($kriteria as $krt) {
			$b = $krt["kodekrit"];
			$c = $_POST["combine".$j];

			if (ucombine($a,$b,$c) > 0) {
				echo "
					<script>
						alert('Data Berhasil Diubah!'); 
						document.location.href = 'combine.php';
					</script>
				";
			} else {
				echo "
					<script>
						alert('Data Gagal Diubah!'); 
						document.location.href = 'combine.php';
					</script>
				";
			}
			$j++;
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
					<h1>Edit Nilai <span style="color: blue"><?= $toko["nama"]; ?></span></h1>
					<br>
					<div style="width: 95%">
						<form action="" method="post">
							<input type="hidden" name="kodetoko" value="<?= $toko['kodetoko']; ?>">
							<?php $i=1; ?>
							<?php foreach ($kriteria as $krit): ?>
								<h5><?= $krit["kriteria"]; ?></h5>
								<select name="combine<?= $i; ?>" class="form-select form-control">
								<?php foreach ($subkriteria as $subkrit): ?>
									<?php 
										$a = $toko["kodetoko"];
										$b = $krit["kodekrit"];
										$c = $subkrit["kodesub"];
										$z = cari($a,$b);
										$x = isiSubkrit($b,$c);
									?>

									<?php foreach ($z as $key): ?>
										<?php $tes = $key["kodesub"] ?>
										
									<?php endforeach ?>
									
									<?php foreach ($x as $key1): ?>
										<?php if ($tes == ""): ?>
											<option hidden="true" value="" disabled selected>Pilih Nilai</option>
											<option value="<?= $key1["kodesub"]; ?>"><?= $key1["keterangan"]; ?></option>
										<?php else: ?>
											
										<option value="<?= $key1["kodesub"]; ?>"
											<?php if ($key1["kodesub"] == $tes): ?>
												<?php echo "selected = 'selected'" ?>
											<?php endif ?>>
											<?= $key1["keterangan"]; ?>
										</option>				
										<?php endif ?>
									<?php endforeach ?>									

								<?php endforeach ?>
								</select>
								<br>
								<?php $i++; ?>
							<?php endforeach ?>												
							<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
							<a class="btn btn-success" href="combine.php">Kembali</a>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>	
</html>