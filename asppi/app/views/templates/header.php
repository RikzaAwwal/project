<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul'] ?></title>
	<link href="<?= BASEURL; ?>/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="background-color: #D9DDDC">

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container">
    <a class="navbar-brand" href="<?= BASEURL; ?>"><b>A S P P I</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?php if($data['judul']=='Data Anggota'){echo 'active';} ?>" aria-current="page" href="<?= BASEURL; ?>">Data Anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($data['judul']=='Data User'){echo 'active';} ?>" href="<?= BASEURL; ?>/user">Data User</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalSet">Setting Database</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/anggota/download">Download Data</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>