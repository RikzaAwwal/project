<?php 
  require "function.php";

  if (isset($_POST["back"])) {
    header("Location: login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Demo Kriptografi</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
  <div style="background-color: white; margin: 50px auto; width: 500px;height: 450px ;padding: 15px; border-radius: 10px">
  <form action="" method="post">
    <button class="btn btn-link" style="float: right;" name="back">back</button></a>  
    <h4>Demo</h4>
  </form>
 
  
  <br>
  <form action="" method="post">
    <div style="width: 100%;">
      <input type="text" name="plaintext" class="form-control" placeholder="Masukan Text" style="width: 100%;" autocomplete="off">
      <br>
      <div class="input-group">
        <button name="enkripsi" type="submit" class="btn btn-primary" style="width: 49%; display: inline-block;">Enkripsi</button>
        <div style="width: 2%"></div>
        <button name="dekripsi" type="submit" class="btn btn-secondary" style="width: 49%; display: inline-block;">Dekripsi</button>  
      </div>
  </div>
  </form>
  <br>

  <?php
    if (isset($_POST["enkripsi"]) && $_POST["plaintext"]!=="") {
      $enkrip = enkrip($_POST["plaintext"]);
      $kata = htmlspecialchars($_POST["plaintext"]);
  ?>
    <label for="">Text</label>
    <input type="text" class="form-control" id="" value="<?= $kata; ?>" disabled> 
    <br>

    <center>
      <label>Hasil Enkripsi : </label> 
      <h3><?= htmlspecialchars($enkrip); ?></h3> 
    </center>

    <br>

    <form action="" method="post">
      <?php $_POST["plainteks"] = ""?>
      <button type="submit" name="submit" style="float: right;" class="btn btn-success">Clear</button>
    </form>

  <?php
    } else if (isset($_POST["dekripsi"]) && $_POST["plaintext"]!=="") {
      $dekrip = dekrip($_POST["plaintext"]);
      $kata = htmlspecialchars($_POST["plaintext"]);
  ?>
    <label for="">Text</label>
    <input type="text" class="form-control" id="" value="<?= $kata; ?>" disabled>  
    <br>
    
    <center>
      <label>Hasil Dekripsi : </label> 
      <h3><?= htmlspecialchars($dekrip); ?></h3> 
    </center>

    <br>

    <form action="" method="post">
      <?php $_POST["plainteks"] = ""?>
      <button type="submit" name="submit" style="float: right;" class="btn btn-success">Clear</button>
    </form>

  
  <?php     
    }else{
  ?>
      <label for="">Text</label>
      <input type="text" class="form-control" id="" value="" disabled>  
  <?php
    }
   ?>

  </div>
</body>
</html>