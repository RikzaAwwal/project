<!DOCTYPE html>
<html>
<head>
	<title><?= $data['judul'] ?></title>
	<link href="<?= BASEURL; ?>/css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body class="overflow-hidden" style="background-color: lightgray;">
	<div class="row" style="height: 100vh">
		<div class="col-4"></div>
		<div class="d-flex align-items-center justify-content-center col-4" style="height: 90%">
			<div class="p-3 rounded-3 bg-white w-75">
				<h3 class="mb-4">Login</h3>
				<form action="<?= BASEURL; ?>/login/verify" method="post">
					<div class="mb-2">
			        	<label for="username" class="form-label">Username</label>
			        	<input type="text" class="form-control" id="username" name="username" autocomplete="off">
			        </div>
			        <div class="mb-4">
			        	<label for="password" class="form-label">Password</label>
			        	<input type="password" class="form-control" id="password" name="password" autocomplete="off">
			        </div>
			        <div class="mb-2">
			        	<button class="btn btn-primary text-right float-end">Login</button>
			        </div>
				</form>
			</div>
		</div>
		<div class="col-4"></div>
	</div>
</body>
</html>