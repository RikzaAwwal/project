<?php 
  require 'function.php';
  session_start();

  //cek cookie
  if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
      $_SESSION["login"] = true;
    }
  }

  if (isset($_SESSION["status"])){
    if ($_SESSION["status"] == "manager") {
      header("Location: mtoko.php");
      exit;
    }else{
      header("Location: index.php");    
      exit;
    }
  }  

  if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($result);
      if($password == $row["password"]){
        $status = $row["status"];

        if ($status == 'manager') {
          $_SESSION["status"] = "manager";
          $_SESSION["id"] = $row["id"];
          if (isset($_POST['remember'])) {
            setcookie('manager', 'true', time()+86400);
          }

          header("Location: mtoko.php");
        }else{
          $_SESSION["status"] = "sales";
          if (isset($_POST['remember'])) {
            setcookie('sales', 'true', time()+86400);
          }

          header("Location: index.php");
        }

        exit;
      }
    }
    $error = true;
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: lightgray">
  <div style="background-color: white; margin: 100px auto; width: 300px;padding: 15px; border-radius: 10px">
  <h4>Login</h4>
  <br>
  <form action="" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <?php if(isset($error)) : ?>
          <p style="color: red; font-style: italic">Username atau Password SALAH</p>
    <?php endif; ?>

  <button type="submit" name="login" class="btn btn-dark" style="display: block; margin-right: 0; margin-left: auto;">Login</button>
  </form>
  </div>  
</body>
</html>