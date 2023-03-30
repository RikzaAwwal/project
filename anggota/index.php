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
  //ORDER BY (urutkan data berdasarkan "...") ASC/DESC

  //jika tombol cari di klik
  if (isset($_GET["keyword"])) {
    $anggota = cari($_GET["keyword"]);
  }

  if (isset($_GET["list"])) {
    $layout = 1;
  }else{
    $layout = 0;
  }
  

  // $_POST["grid"] = 1;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Admin</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>    
</head>
<body style="background-color: #F3F3F3;">
  <div class="navbar navbar-expand-lg navbar-dark" style="background-color: #1d73be">
    <div class="container">
      <a class="navbar-brand" href="#"><h3>DAFTAR ANGGOTA</h3></a>

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
        <form action="" method="GET">
          <div class="input-group" style="width: 30%; float: right;">
          <input type="search" name="keyword" class="form-control rounded" placeholder="Search" style="width: 30%; display: inline;"/ autocomplete="off">
          <button type="submit" class="btn btn-outline-primary">search</button>
        </form>
      </div>  
      <a href="tambah.php"><button class="btn btn-success">Tambah Data</button></a>  
    </div>

    <div style="overflow: auto; margin-top: 10px;">
      <div style=" float: right;">
        <form action="" method="GET">
            <button name="grid" type="submit" class="fas icon-th btn btn-secondary"></button>
            <button name="list" type="submit" class="fas icon-list btn btn-secondary"></button>
        </form>
      </div>
    </div>

    <div class="col-md-12 grid-margin">
      <div class="card-body">
        <div class="row">
    
          <?php if ($layout == 1): ?>
            <div style="overflow-x: scroll;">     
              <table class="table table-striped">
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
                    <td style="text-align: left;"><?= $nik; ?></td>
                    <td style="text-align: left;"><?= $row["nama"]; ?></td>
                    <td style="text-align: left;"><?= $row["ttl"]; ?></td>
                    <td style="text-align: left;"><?= $row["jk"]; ?></td>
                    <td style="text-align: left;"><?= $row["alamat"]; ?></td>
                    <td style="text-align: left;"><?= $tlp; ?></td>
                    <td style="text-align: left;"><?= $email; ?></td>
                    <td style="text-align: left;"><?= $row["bidusaha"]; ?></td>
                    <td style="text-align: left;"><?= $row["perusahaan"]; ?></td>
                    <td style="text-align: left;"><?= $row["alamatp"]; ?></td>
                    <td style="text-align: left;"><?= $row["noper"]; ?></td>
                    <td style="text-align: left;"><?= $row["jabatan"]; ?></td>
                    <td style="text-align: left;"><?= $row["tglmasuk"]; ?></td>
                  </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
              </table>
            </div>
            <?php exit; ?>
          <?php endif ?>

          <?php if ($layout == 0): ?>
            <?php $i=1; ?>
            <?php foreach ($anggota as $row) : ?>
            <?php 
              $id = $row["id"];
            ?>
    
            <div class="form-group col-lg-3 col-sm-12 col-md-4">
              <div class="card" style="width: 100%; height: 100%;">
                <img src="img/<?= $row["foto"]; ?>" style="height: 60%; width: 100%">
                <div style="width: 100%; height: 40%">
                  <br>
                  <h5 style="padding-left: 10px; white-space: nowrap; display: inline-block; overflow: hidden; text-overflow: ellipsis; width: calc(95%)"><b><?= $row["nama"]; ?></b></h5>
                  <p style="padding-left: 10px"><?= $row["noanggota"]; ?></p>
                  <div style="overflow: auto; margin-right: 5%; margin-bottom: 5%">
                    <div style="float: right;">
                      <a href="#" data-toggle="modal" data-target="#exampleModalLong<?= $row["id"]; ?>">
                        <button class="fas icon-info btn btn-warning" style="width: 30px; height: 30px"></button>
                      </a>
                      <a href="ubah.php?id=<?= $row["id"]; ?>"><button class="fas icon-edit btn btn-info" style="width: 40px"></button></a>
                      <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><button class="btn btn-danger fas icon-trash " style="width: 40px"></button></a>
                    </div>
                  </div>              
                </div>
              </div> 
            </div>
    
            <div class="modal fade" id="exampleModalLong<?= $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Profil Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $id = $row["id"];
                      $anggota = query("SELECT * FROM anggota WHERE id=$id")[0];
                    ?>
                    <center>
                      <div style="width: 200px; height: 200px">
                        <img src="img/<?= $anggota["foto"]; ?>" style="width: 100%; height: 100%"> 
                      </div>
                    </center>
                    <br>
                    <table class="table table-striped" style="width: 100%; table-layout: fixed;">
                      <tr>
                        <td style="width: 220px"><label for="noanggota">Nomor Anggota </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td style="width: 450px"><?= $anggota["noanggota"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="nik">NIK </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= dekrip($anggota["nik"]); ?></td>
                      </tr>
                      <tr>
                        <td ><label for="nama">Nama </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["nama"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="ttl">Tempat, Tanggal Lahir </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["ttl"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="jk">Jenis Kelamin </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["jk"]; ?></td>
                      </tr>
                      <tr>
                        <td><label for="alamat" >Alamat </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td style="word-wrap: break-word;"><?= $anggota["alamat"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="notlp">Nomor Telepon </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= dekrip($anggota["notlp"]); ?></td>
                      </tr>
                      <tr>
                        <td ><label for="email">Email </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= dekrip($anggota["email"]); ?></td>
                      </tr>
                      <tr>
                        <td ><label for="bidusaha">Bidang Usaha </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["bidusaha"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="perusahaan">Perusahaan </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["perusahaan"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="perusahaan">Alamat Perusahaan </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["alamatp"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="perusahaan">Telepon Perusahaan </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["noper"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="perusahaan">Jabatan </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["jabatan"]; ?></td>
                      </tr>
                      <tr>
                        <td ><label for="tglmasuk">Tanggal Masuk </label></td>
                        <td style="width: 30px;text-align: center;"> : </td>
                        <td><?= $anggota["tglmasuk"]; ?></td>
                      </tr>
                    </table> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
          <?php endif ?>
        </div>
      </div>  
    </div>  
  </div>
</body>
</html>


