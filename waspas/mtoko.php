<?php 
	require "function.php";
	session_start();

  	if (empty($_SESSION["status"])) {
    	header("Location: login.php");    
    	exit;
  	}else if ($_SESSION["status"]!=="manager") {
    	header("Location: index.php");
    	exit;
  	}

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
    <title>Halaman Manager</title>
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
					<a class="nav-link" href="mtoko.php">Toko</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mperhitungan.php">Perhitungan</a>
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
						<h3>Daftar Toko</h3>
					</div>
					<br>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table table-dark">
							<tr>
								<th style="text-align: center; width: 10%">No.</th>
								<th style="text-align: center;">Kode</th>
								<th style="text-align: center;">Nama Toko</th>
								<th style="text-align: center;">Alamat</th>
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