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
 

 	$anggota = query("SELECT * FROM anggota");


	//cek tombol submit 
	if (isset($_POST["submit"])) {
		//cek apakah data sudah ditambah atau belum
		// var_dump($_POST); die;
		if (ubah($_POST) > 0) {
			echo "
				<script>
					alert('Data Berhasil Diubah!'); 
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Diubah!'); 
					document.location.href = 'index.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Database Anggota</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
	<div class="container" style="margin-top: 20px; background-color: #F5F5F5; width: 600px; border-radius: 15px">
	<div style="padding-top: 15px;padding-bottom: 15px">
	<center>
		<h3>Enkripsi/Dekripsi Database Anggota</h3>
	</center>
	<br>
	<form action="" method="POST">		
		<button type="submit" name="enkripdb" class="btn-success" style="border-radius: 10px; width: 49%">Enkripsi Database</button>
		<button type="submit" name="dekripdb" class="btn-danger" style="border-radius: 10px; width: 49%">Dekripsi Database</button>
	</form>

		<?php if (isset($_POST["dekripdb"])): ?>
			<?php $i=1; ?>
            <?php foreach ($anggota as $row) : ?>
            <?php 
              $id = $row["id"];

              $nik = dekrip($row["nik"]);
              $notlp = dekrip($row["notlp"]);
              $email = dekrip($row["email"]);

              //masukan query update data
				$query = "UPDATE anggota SET
						nik = '$nik',
						notlp = '$notlp',
						email = '$email'
						WHERE id=$id
				";
				mysqli_query($conn, $query);	
            ?>

            <?php $i++; ?>
            <?php endforeach; ?>

            <?php 
            	echo "
					<script>
						alert('Database Berhasil Didekripsi!'); 
						document.location.href = 'index.php';
					</script>
				";
            ?>
		<?php endif ?>

		<?php if (isset($_POST["enkripdb"])): ?>
			<?php $i=1; ?>
            <?php foreach ($anggota as $row) : ?>
            <?php 
              $id = $row["id"];

              $nik = enkrip($row["nik"]);
              $notlp = enkrip($row["notlp"]);
              $email = enkrip($row["email"]);

              //masukan query update data
				$query = "UPDATE anggota SET
						nik = '$nik',
						notlp = '$notlp',
						email = '$email'
						WHERE id=$id
				";
				mysqli_query($conn, $query);	
            ?>

            <?php $i++; ?>
            <?php endforeach; ?>

            <?php 
            	echo "
					<script>
						alert('Database Berhasil Dienkripsi!'); 
						document.location.href = 'index.php';
					</script>
				";
            ?>
		<?php endif ?>
	</div>
	</div>
</body>
</html>