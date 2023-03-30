<?php 
	require "fungsi.php";
	session_start();

	if (!isset($_SESSION["login"])) {
	    header("Location: login.php");    
	    exit;
  	}

  	$sampah = query("SELECT * FROM sampah");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Sampah</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
</head>
<body style="background-color: #F3F3F3">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<a class="navbar-brand" href="#">Bank Sampah</a>

	  		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			      <li class="nav-item">
			        <a class="nav-link" href="index.php">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="datanasabah.php">Data Nasabah</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="datatransaksi.php">Data Transaksi</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-white" href="datasampah.php">Data Sampah</a>
			      </li>
			    </ul>
	  		</div>
  		<div style="display: flex; right: 0">
  			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			    <li class="nav-item">
			    	<a class="nav-link"  style="color: white" href="logout.php">Logout</a>
			    </li>
			</ul>
  		</div>
  		</div>
	</nav>
	<div class="container" style="background-color: white; margin-top: 10px; padding: 2%">
		<div style="float: right;">
			<a href="index.php" style="text-decoration: none;"><h6> < Kembali </h6></a>
		</div>
		<a href="tambahsampah.php"><button class="btn btn-success">Tambah Data</button></a>
		<br><br>
		<table class="table table-bordered">
			<thead style="background-color: #11150D;color: white">
				<tr>
					<th>ID Sampah</th>
					<th>Jenis Sampah</th>
					<th>Harga/Kg</th>
					<th style="text-align: center;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sampah as $s): ?>
					<tr>
						<td><?= $s["id_sampah"]; ?></td>
						<td><?= $s["jenis"]; ?></td>
						<td><?= $s["harga"]; ?></td>
						<td style="width: 20%; text-align: center;">
							<a href="editsampah.php?id=<?= $s['id_sampah']; ?>"><button class="btn btn-outline-info"><b>Edit</b></button></a>
							<a href="hapussampah.php?id=<?= $s['id_sampah']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><button class="btn btn-outline-danger"><b>Hapus</b></button></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>