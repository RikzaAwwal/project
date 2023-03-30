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

	$toko = query("SELECT * FROM toko");
	$kriteria = query("SELECT * FROM krit");
	$subkriteria = query("SELECT * FROM subkrit");
	$combine = query("SELECT * FROM combine");
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
	.table th, .table td {
		white-space: nowrap;
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
			<div style="background-color: white; margin: 25px; border-radius: 10px">
				<div style="padding: 25px">
					<div style="background-color: gray; color: white; padding: 10px 10px 10px 20px; border-radius: 10px">
						<h3>Perhitungan WASPAS</h3>
					</div>
					<br>
					<?php foreach ($combine as $com): ?>
						<?php if ($com["kodesub"] == 0): ?>
							<h3 style="color: red">Ada Data Yang Belum Lengkap!</h3>
							<?php exit(); ?>
						<?php endif ?>
					<?php endforeach ?>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class="table table-dark">
						<tr>
							<th></th>
							<?php foreach ($kriteria as $krit): ?>
								<th style="text-align: center;"><?= $krit["kriteria"]; ?></th>
							<?php endforeach ?>
						</tr>
						</thead>
						<tr style="background-color: lightgreen; font-weight: bold;">
							<td>Jenis</td>
							<?php foreach ($kriteria as $krit): ?>
								<td style="text-align: center;"><?= $krit["jenis"]; ?></td>
							<?php endforeach ?>
						</tr>


						<tr style="background-color: yellow; font-weight: bold;">
							<td>Bobot</td>
							<?php foreach ($kriteria as $krit): ?>
								<td style="text-align: center"><?= $krit["bobot"]; ?></td>
							<?php endforeach ?>
						</tr>

						<?php foreach ($toko as $tokoo): ?>
						<tr>
							<th><?= $tokoo["nama"]; ?></th>
							<?php foreach ($kriteria as $krit): ?>
								<td style="text-align: center">
									<?php 
										$a = $tokoo["kodetoko"];
										$b = $krit["kodekrit"];
										$z = cari($a, $b);
									?>	
									
									<?php foreach ($z as $key): ?>
										<?= $key["nilai"]; ?>
									<?php endforeach ?>		  
								</td>
							<?php endforeach ?>
						</tr>
						<?php endforeach ?>
					</table>
					
					<br><br>

					<table class="table table-bordered">
						<thead class="table table-dark">
						<tr>
							<th></th>
							<?php foreach ($kriteria as $krit): ?>
								<th><?= $krit["kriteria"]; ?></th>
							<?php endforeach ?>
						</tr>
						</thead>

						<tr>
							<th>Maks</th>
							<?php foreach ($kriteria as $krit): ?>
								<?php 
									$a = $krit["kodekrit"];
									$maks = up($a);
								?>

								<?php foreach ($maks as $key): ?>
									<td><?= $key["maks"]; ?></td>
								<?php endforeach ?>
							<?php endforeach ?>
						</tr>

						<tr>
							<th>Min</th>
							<?php foreach ($kriteria as $krit): ?>
								<?php 
									$a = $krit["kodekrit"];
									$maks = down($a);
								?>

								<?php foreach ($maks as $key): ?>
									<td><?= $key["min"]; ?></td>
								<?php endforeach ?>
							<?php endforeach ?>
						</tr>
					</table>

					<br><br>

					<table class="table table-bordered">
						<tr style="background-color: pink">
							<th>Alternatif</th>
							<?php foreach ($kriteria as $krit): ?>
								<th><?= $krit["kriteria"]; ?></th>
							<?php endforeach ?>
						</tr>

						<?php foreach ($toko as $tokoo): ?>
						<tr>
							<th><?= $tokoo["nama"]; ?></th>
							<?php foreach ($kriteria as $krit): ?>
								<td>
									<?php 
										$a = $tokoo["kodetoko"];
										$b = $krit["kodekrit"];
										$jenis = $krit["jenis"];
										$maks = up($b);
										$min = down($b);
										$z = cari($a, $b);
									?>	
									
									<?php foreach ($z as $key): ?>
										<?php foreach ($maks as $up): ?>
										  	<?php foreach ($min as $down): ?>
												<?php if ($jenis == "Cost"): ?>
										  			<?= $down["min"]/$key["nilai"]; ?>
												<?php else: ?>
										  			<?= $key["nilai"]/$up["maks"]; ?>
												<?php endif ?>  
										  	<?php endforeach ?>
										<?php endforeach ?>
									<?php endforeach ?>
								</td>
							<?php endforeach ?>
						</tr>
						<?php endforeach ?>
					</table>

					<br><br>

					<table class="table table-bordered">
						<tr style="background-color: aqua">
							<th style="width: 40%">Alternatif</th>
							<th style="width: 20%">WSM</th>
							<th style="width: 20%">WPM</th>
							<th style="width: 20%">Nilai Akhir</th>
						</tr>	

						<?php $tinggi = 0; ?>
						<?php foreach ($toko as $tokoo): ?>
						<tr>
							<th><?= $tokoo["nama"]; ?></th>
							<?php 
								$p = 0; 
								$q = 1;
							?>
								<?php foreach ($kriteria as $krit): ?>
									<?php 
										$a = $tokoo["kodetoko"];
										$b = $krit["kodekrit"];
										$jenis = $krit["jenis"];
										$maks = up($b);
										$min = down($b);
										$z = cari($a, $b);
									?>	
									
									<?php foreach ($z as $key): ?>
										<?php foreach ($maks as $up): ?>
										  	<?php foreach ($min as $down): ?>
												<?php if ($jenis == "Cost"): ?>
										  			<?php $p = $p + ($down["min"]/$key["nilai"]*$krit["bobot"]); ?>
												<?php else: ?>
										  			<?php $p = $p + ($key["nilai"]/$up["maks"]*$krit["bobot"]); ?>
												<?php endif ?>  
										  	<?php endforeach ?>
										<?php endforeach ?>
									<?php endforeach ?>

									<?php foreach ($z as $key): ?>
										<?php foreach ($maks as $up): ?>
										  	<?php foreach ($min as $down): ?>
												<?php if ($jenis == "Cost"): ?>
										  			<?php 
										  				$ada = $down["min"]/$key["nilai"];
										  				$q = $q * pow($ada,$krit["bobot"]); 
										  			?>
												<?php else: ?>
										  			<?php 
										  				$ada = $key["nilai"]/$up["maks"];
										  				$q = $q * pow($ada,$krit["bobot"]); 
										  			?>
												<?php endif ?>  
										  	<?php endforeach ?>
										<?php endforeach ?>
									<?php endforeach ?>
								<?php endforeach ?>
								<?php 
									$hasil = 0.5*$p+0.5*$q; 

									if ($tinggi < $hasil) {
										$tinggi = $hasil;
										$string = "Nilai Tertinggi adalah <b>".$tokoo["nama"]."</b> dengan Nilai <b>".$hasil.".";
									}
								?>
								<td><?= $p; ?></td>
								<td><?= $q; ?></td>
								<td><?= $hasil; ?></td>
						</tr>
						<?php endforeach ?>
					</table>
					<br>
					<?= $string; ?>	
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>