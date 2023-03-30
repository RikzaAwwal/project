<?php 
	require "function.php";

	$toko = query("SELECT * FROM toko");
	$kriteria = query("SELECT * FROM krit");
	$subkriteria = query("SELECT * FROM subkrit");
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
					<button name="logout" class="btn btn-secondary" style="width: 100%">LOGOUT</button>
				</div>
			</div>
		</div>

		<div style="margin-left: 15%;">
			<div style="background-color: white; margin: 25px; border-radius: 10px">
				<div style="padding: 25px">
					<div style="background-color: gray; color: white; padding: 10px 10px 10px 20px; border-radius: 10px">
						<h3>Daftar Toko</h3>
					</div>
					<br>
					<div style="float: right; margin-bottom: 10px">
						<a href="ttoko.php"><button class="btn btn-success">Tambah</button></a>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table table-dark">
							<tr>
								<th style="text-align: center;">No.</th>
								<th style="text-align: center;">Kode</th>
								<th style="text-align: center;">Nama Toko</th>
								<th style="text-align: center;">Alamat</th>
								<th style="text-align: center;">Aksi</th>
							</tr>
							</thead>
							<?php 
								$i = 1;
								foreach ($toko as $tokoo): 
							?>
							<tr>
								<td style="text-align: center;"><?= $i; ?></td>
								<td style="text-align: center;"><?= $tokoo["kodetoko"]; ?></td>
								<td><?= $tokoo["nama"]; ?></td>
								<td><?= $tokoo["alamat"]; ?></td>
								<td style="text-align: center; white-space: nowrap;">
									<a class="btn btn-info" href="utoko.php?id=<?= $tokoo["kodetoko"]; ?>">Edit</a>
									<a class="btn btn-danger" href="htoko.php?id=<?= $tokoo["kodetoko"]; ?>">Hapus</a>
								</td>
							</tr>
							<?php 
								$i++;
								endforeach 
							?>
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>