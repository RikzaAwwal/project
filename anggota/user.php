<?php 
	require 'function.php';
	session_start();

	if (empty($_SESSION["status"])) {
    header("Location: login.php");    
    exit;
  }else if ($_SESSION["status"]!=="admin") {
    header("Location: halaman_user.php");
    exit;
  }
 

  $user = query("SELECT * FROM user WHERE status='user'");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Data User</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script> 
</head>
<style>
	th{
		text-align: center;
	}
</style>
<body style="background-color: #F3F3F3;">
  <div class="navbar navbar-expand-lg navbar-dark" style="background-color: #1d73be">
    <div class="container">
      <a class="navbar-brand" href="#"></a>

      <div style="display: flex; right: 0;">
        <ul class="navbar-nav"> 
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            	<b>Menu</b>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="user.php">Data User</a>
              <a class="dropdown-item" href="ubahdb.php">Setting Database</a>
              <a class="dropdown-item" href="export.php">Download Data</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div style="padding-top: 15px; padding-bottom: 15px">
    <div class="container" style="background-color: white; padding-top: 15px; padding-bottom: 15px; ">
      <div style="border-bottom: 1px solid #DEE2E6; padding-bottom: 10px">
        <div style="float: right;">
          <a href="index.php"><h6>< Kembali</h6></a>
      	</div>  
      	<a href="regis.php"><button class="btn btn-success">Tambah User</button></a>  
    </div>

    <div class="container" style="margin-top: 15px">
    <table class="table table-bordered">
      <thead class="table table-dark">
        <tr>
          <th>No.</th>
          <th>Username</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php $i=1; ?>
      <?php foreach ($user as $key): ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $key["username"]; ?></td>
          <td><?= $key["password"]; ?></td>
          <td style="text-align: center;">
            <a href="changepw.php?id=<?= $key["id"]; ?>"><button class="btn btn-outline-info">Change Password</button></a>
            <a href="hapususer.php?id=<?= $key["id"]; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Akun Ini?')"><button class="btn btn-outline-danger">Delete</button></a>
          </td>
        </tr>
      <?php $i++; ?>
      <?php endforeach ?>
    </table>
  </div> 
  </div> 
  </div>
</body>