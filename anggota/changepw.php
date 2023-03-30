<?php 
	require 'function.php';
	session_start();

  	if (empty($_SESSION["status"])) {
    	header("Location: login.php");    
	    exit;
  	}

 	$id = $_GET["id"];
 	$select = query("SELECT * FROM user WHERE id=$id")[0];

	if (isset($_POST["change"])) {
		if (changepw($_POST) > 0) {
			echo "<script>
				alert('Password Berhasil Diubah');
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
	<title>Ganti Password</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div style="background-color: white; margin: 100px auto; width: 400px;padding: 15px; border-radius: 10px">
	<h3>Ganti Password</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $select["id"]; ?>"> 

	<table>
		<tr>
			<td ><label for="username">Username</label></td>
			<td> : </td>
			<td style="width: 70%"><input type="text" name="username" id="username" value="<?= $select['username']; ?>" class="form-control" disabled></td>
		</tr>
		<tr>
			<td ><label for="password">Password </label></td>
			<td> : </td>
			<td><input type="password" name="password" id="password" placeholder="Masukan Password Baru" class="form-control" required></td>
		</tr>
		<tr>
			<td ><label for="confirm">Confirm Password </label></td>
			<td> : </td>
			<td><input type="password" name="confirm" id="confirm" placeholder="Konfirmasi Password Baru" class="form-control" required></td>
		</tr>
	</table>
	<br>
	<button type="submit" name="change" class="btn-secondary" style="border-radius: 10px; width: 100%">Ganti Password</button>

	</form>
	</div>
</body>
</html>