<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
	require 'fungsi.php';
	  session_start();

	$nasabah = query('SELECT * FROM nasabah');

	if(isset($_GET["keyword"])){
		if ($_GET["keyword"]!="") {
			# code...
		$nasabah = cari($_GET["keyword"]);
		}


	}



	if (!isset($_SESSION["login"])) {
    header("Location: login.php");    
    exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Nasabah</title>

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
			        <a class="nav-link text-white" href="datanasabah.php">Data Nasabah</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="datatransaksi.php">Data Transaksi</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="datasampah.php">Data Sampah</a>
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
		
			<form action="" method="GET">
          <div class="input-group" style="width: 30%; float: right;">
          <input type="search" name="keyword" class="form-control rounded" placeholder="Masukan NIK" style="width: 30%; display: inline;"/ autocomplete="off">
          <button type="submit" class="btn btn-outline-primary">search</button>
      </div>
        </form>
		
		<a href="tambahnasabah.php"><button type="button" class="btn btn-success">Tambah Nasabah</button></a>
		<br><br>
		<table class="table table-bordered">
				<thead style="background-color: #11150D;color: white">
			<tr>
				<th style="text-align: center;">ID</th>
				<th>Nama</th>
				<th>NIK</th>
				<th>Alamat</th>
				<th>No. Telp</th>
				<th>Saldo</th>
				
			</tr>
			</thead>
			<tbody>
		<?php foreach ($nasabah as $key): ?>
			<tr>
				<td style="text-align: center;">
					<?= $key['id_nasabah']; ?>
				</td>
				<td>
					<a href="edit.php?id=<?= $key['id_nasabah']; ?>"><button class="fas icon-edit btn btn-outline-info" style="text-decoration: none" ></button></a>
					<a href="transaksi.php?id=<?= $key['id_nasabah']; ?>"  style="text-decoration: none"><?= $key['nama']; ?></a>
				</td>
				<td>
					<?= $key['nik']; ?> 
				</td>
				
				<td>
					<?= $key["alamat"]; ?>
				</td>
				<td>
					<?= $key["notelp"]; ?>
				</td>
				<td>
					<?= $key["saldo"]; ?>
				</td>
			
			</tr>
		<?php endforeach ?>
			</tbody>
		</table>
		<div style="float: right;">
			<a href="index.php" style="text-decoration: none;"><h6> < Kembali </h6></a>
		</div>
			<a href="ambil.php" ><button  type="button" class="btn btn-secondary">Ambil Saldo</button></a>
		<div style="display: flex; justify-content: flex-end; ">
			
		</div>
	</div>
</body>
</html>