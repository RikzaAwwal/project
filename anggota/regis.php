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
 

	if (isset($_POST["register"])) {
		if (register($_POST) > 0) {
			echo "<script>
				alert('User Baru Berhasil Ditambahkan!');
				document.location.href = 'user.php';
			</script>";
		}else{
			echo mysqli_error($conn);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div style="background-color: white; margin: 100px auto; width: 400px;padding: 15px; border-radius: 10px">
	<h3>Tambah User</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="status" value="user">

	<table>
		<tr>
			<td ><label for="username">Username</label></td>
			<td> : </td>
			<td style="width: 70%"><input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required></td>
		</tr>
		<tr>
			<td ><label for="password">Password </label></td>
			<td> : </td>
			<td><input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required></td>
		</tr>
		<tr>
			<td ><label for="confirm">Confirm Password </label></td>
			<td> : </td>
			<td><input type="password" name="confirm" id="confirm" class="form-control" placeholder="Konfirmasi Password" required></td>
		</tr>
	</table>
	<br>
	<button type="submit" name="register" class="btn-secondary" style="border-radius: 10px; width: 100%">Tambah User</button>

	</form>
	</div>
</body>
</html>