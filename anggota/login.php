<?php 
  require 'function.php';
  session_start();

  //cek cookie
    if (isset($_COOKIE['admin'])) {
      $_SESSION["status"] = 'admin';
    }else if(isset($_COOKIE['user'])){
      $_SESSION['status'] = 'user';
      $_SESSION['id'] = $_COOKIE['id'];
    }

  if (isset($_SESSION["status"])){
    if ($_SESSION["status"] == "admin") {
      header("Location: index.php");    
      exit;
    }else{
      header("Location: halaman_user.php");
      exit;
    }
  }  

  if (isset($_POST["demo"])) {
    header("Location: demo.php");
  }else if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])){
        $status = $row["status"];

        if ($status == 'admin') {
          $_SESSION["status"] = "admin"; 
          if (isset($_POST['remember'])) {
            setcookie('admin', 'true', time()+86400);
          }

          header("Location: index.php");
        }else{
          $_SESSION["status"] = "user";
          $_SESSION["id"] = $row["id"];
          if (isset($_POST['remember'])) {
            setcookie('user', 'true', time()+86400);
            setcookie('id', $row['id'], time()+86400);
          }

          header("Location: halaman_user.php");
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

  <div class="form-check" style="margin-bottom: 5px;">
    <input type="checkbox" name="remember" class="form-check-input" id="remember">
    <label class="form-check-label" for="remember">Remember me!</label>
  </div>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
  <button class="btn btn-link" style="float: right;" name="demo">Demo</button></a>
  </form>
  </div>

  
</body>
</html>