<?php 
	require 'fungsi.php';
	  session_start();

	$id = $_GET['id'];

	$nama = query("SELECT * FROM nasabah Where id_nasabah = $id")[0];

	$data = query("SELECT * FROM transaksi t
					INNER JOIN nasabah n ON t.id_nasabah = n.id_nasabah 
    				Where t.id_nasabah = $id order by t.tanggal ASC");

	if (!isset($_SESSION["login"])) {
    	header("Location: login.php");    
    	exit;
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Riwayat</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
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
	 	<h1><?php 
						$b = $nama["nama"];
				$chiper_algo = "aes-128-ecb";
				$pw ="stikomcirebonidn";
				$opsi= 0;

			$chiperdec_nama = openssl_decrypt("$b", "aes-128-ecb" , "stikomcirebonidn", $opsi);
			echo $chiperdec_nama; ?></h1>
	 	<br>
	 	<table class="table table-bordered">
	 		<thead style="background-color: #11150D;color: white">
	 		<tr>
	 			<th>Tanggal</th> 
	 			<th>Transaksi</th>
	 			<th>total</th>
	 			<th>Saldo</th>
	 		</tr>
	 		</thead>
	 		<tbody>
	 		<?php foreach ($data as $key): ?>
	 			<tr>
	 				<td><?= tanggal($key['tanggal']); ?></td>
	 				<td><?= $key['jenis_transaksi']; ?></td>
	 				<td><?= $key['total']; ?></td>
	 				<td><?= $key['tsaldo']; ?></td>
	 			</tr>
	 		<?php endforeach ?>
	 		</tbody>
	 	</table>
	 	<div style="display: flex; justify-content: flex-end; ">
	 			<a href="datanasabah.php"><button  type="button" class="btn btn-secondary">Back</button></a>
		</div>
 	</div>
 </body>
 </html>