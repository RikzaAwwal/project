<?php 
require 'fungsi.php';  
  session_start();

  if (!isset($_SESSION["login"])) {
    header("Location: login.php");    
    exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color: #f3f3f3">
		
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<a class="navbar-brand" href="#">Bank Sampah</a>

	  		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			      <li class="nav-item">
			        <a class="nav-link text-white" href="index.php">Home</a>
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
		<center>
			<h1>HOME</h1>
		</center>
	</div>
</body>
</html>