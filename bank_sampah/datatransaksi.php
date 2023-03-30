<?php 
	require "fungsi.php";
	  session_start();

 $data = query("SELECT * FROM transaksi t
					INNER JOIN nasabah n ON t.id_nasabah = n.id_nasabah 
    				ORDER BY t.tanggal ASC");
 
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
			        <a class="nav-link text-white" href="datatransaksi.php">Data Transaksi</a>
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
		<div style="float: right;">
			<a href="index.php" style="text-decoration: none;"><h6> < Kembali </h6></a>
		</div>
		
 			<a href="tambahtransaksi.php"><button class="btn btn-success">Tambah Data</button></a>
		<br><br>
 	<table class="table table-bordered">
 			<thead style="background-color: #11150D;color: white">
 		<tr>
 			<th>Tanggal</th> 
 			<th>Nama</th>
 			<th>Transaksi</th>
 			<th>total</th>
 			<th>Saldo</th>
 			<!-- <th>test</th> -->
 		</tr>
 			</thead>
 			<tbody>
 		<?php foreach ($data as $key): ?>
 			<tr>
 				<td><?= tanggal($key['tanggal']); ?></td>
 				<td><?= $key["nama"]; ?></td>
 				<td><?= $key['jenis_transaksi']; ?></td>
 				<td><?= $key['total']; ?></td>
 				<td><?= $key['tsaldo']; ?></td>
 			</tr>
 		<?php endforeach ?>
 			</tbody>
 	</table>
 	

 </body>
 </html>