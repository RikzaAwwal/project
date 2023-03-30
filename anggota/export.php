<?php 
	require "function.php";
  session_start();

  if (empty($_SESSION["status"])) {
    header("Location: login.php");    
    exit;
  }else if ($_SESSION["status"]!=="admin") {
    header("Location: halaman_user.php");
    exit;
  }

	$anggota = query("SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Export Data</title>
</head>
<style>
	th{
		white-space: nowrap;
	}
</style>
<body style="background-color: lightgray;">
	<?php
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Anggota.xls");
	?>
	<div class="container" style="background-color: white; margin-top: 2%; margin-bottom: 2%; border-radius: 10px">
	<div style="padding-top: 2%">
		<h3 style="text-align: center;">Data Anggota Asosiasi Pelaku Pariwisata Indonesia DPC Wilayah III Jawa Barat</h3>
	</div>
	<div style="padding: 3%">
		
	<div style="overflow-x: scroll;">     
                <table border="1">
                  <thead>
                    <tr>
                      <th><center>No.</center></th>
                      <th><center>No. Anggota</center></th>
                      <th><center>NIK</center></th>
                      <th><center>Nama</center></th>
                      <th><center>Tempat, Tgl Lahir</center></th>
                      <th><center>Jenis Kelamin</center></th>
                      <th><center>Alamat</center></th>
                      <th><center>Telepon</center></th>
                      <th><center>E-Mail</center></th>
                      <th><center>Perusahaan</center></th>
                      <th><center>Bidang Usaha</center></th>
                      <th><center>Tanggal Masuk</center></th>
                    </tr>
                  </thead>
                  
                    <?php $i=1; ?>
            <?php foreach ($anggota as $row) : ?>
            <?php 
              $id = $row["id"];
              $tlp = dekrip($row["notlp"]);
              $email = dekrip($row["email"]);
              $nik = dekrip($row["nik"]);
            ?>
                    <tr>
                      <td><center><?= $i; ?></center></td>
                      <td style="text-align: left;"><?= $row["noanggota"]; ?></td>
                      <td style="text-align: left;"><?= $row["nik"]; ?></td>
                      <td style="text-align: left;"><?= $row["nama"]; ?></td>
                      <td style="text-align: left;"><?= $row["ttl"]; ?></td>
                      <td style="text-align: left;"><?= $row["jk"]; ?></td>
                      <td style="text-align: left;"><?= $row["alamat"]; ?></td>
                      <td style="text-align: left;"><?= $row["notlp"]; ?></td>
                      <td style="text-align: left;"><?= $row["email"]; ?></td>
                      <td style="text-align: left;"><?= $row["perusahaan"]; ?></td>
                      <td style="text-align: left;"><?= $row["bidusaha"]; ?></td>
                      <td style="text-align: left;"><?= $row["tglmasuk"]; ?></td>
                    </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </table>
            </div>
	</div>
	</div>
</body>
</html>