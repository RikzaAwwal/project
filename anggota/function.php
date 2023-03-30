<?php 
	$conn = mysqli_connect("localhost", "root", "", "asppi");

	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows [] = $row;
		}
		return $rows;
	}

	function tambah($data){
		global $conn;

		$tl = tanggal($data["tl"]);
		$tmpttl = $data["tempat"].", ".$tl;

		$noanggota = htmlspecialchars($data["noanggota"]);
		$nama = htmlspecialchars($data["nama"]);
		$ttl = htmlspecialchars($tmpttl);
		$jk = htmlspecialchars($data["jk"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$perusahaan = htmlspecialchars($data["perusahaan"]);
		$bidusaha = htmlspecialchars($data["bidusaha"]);
		$tglmasuk = htmlspecialchars(tanggal($data["tglmasuk"]));
		$alamatp = htmlspecialchars($data["alamatp"]);
		$telpp = htmlspecialchars($data["telpp"]);
		$jabatan = htmlspecialchars($data["jabatan"]);

		$nik = enkrip($data["nik"]);
		$notlp = enkrip($data["notlp"]);
		$email = enkrip($data["email"]);

		//upload gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		}
		
		$query = "INSERT INTO anggota VALUES (
				'', '$noanggota','$nik', '$nama', '$ttl', '$jk','$alamat', '$notlp', '$email', '$perusahaan', '$alamatp', '$telpp', '$jabatan', '$bidusaha', '$tglmasuk', '$gambar'
				)";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
	
	function upload() {
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		if ($error === 4) {
			$namaBaru = "nopicture.jpg";
			return $namaBaru;
		}

		$ekstensiValid = ['jpg','jpeg','png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if (!in_array($ekstensiGambar, $ekstensiValid)) {
			echo "<script>
				alert('Data yang Anda upload bukan gambar');
			</script>";
			return false;
		}

		if ($ukuranFile > 1000000) {
			echo "<script>
				alert('Ukuran gambar terlalu besar');
			</script>";
			return false;
		}

		$namaBaru = uniqid();
		$namaBaru .= '.';
		$namaBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/'.$namaBaru);

		return $namaBaru; 
	}

	function hapus($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM anggota WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;
		//ambil data dari tiap elemen
		$id = $data["id"];
		$noanggota = htmlspecialchars($data["noanggota"]);
		$nama = htmlspecialchars($data["nama"]);
		$ttl = htmlspecialchars($data["ttl"]);
		$jk = htmlspecialchars($data["jk"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$perusahaan = htmlspecialchars($data["perusahaan"]);
		$bidusaha = htmlspecialchars($data["bidusaha"]);
		$tglmasuk = htmlspecialchars($data["tglmasuk"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);
		$alamatp = htmlspecialchars($data["alamatp"]);
		$telpp = htmlspecialchars($data["telpp"]);
		$jabatan = htmlspecialchars($data["jabatan"]);

		$nik = enkrip($data["nik"]);
		$notlp = enkrip($data["notlp"]);
		$email = enkrip($data["email"]);

		//cek apakah user memasukan gambar baru
		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarLama;
		}else{
			$gambar = upload();
		}

		$query = "UPDATE anggota SET
					nama = '$nama',
					ttl = '$ttl',
					alamat = '$alamat',
					notlp = '$notlp',
					email = '$email',
					perusahaan = '$perusahaan',
					alamatp = '$alamatp',
					noper = '$telpp',
					jabatan = '$jabatan',
					bidusaha = '$bidusaha',
					foto = '$gambar'
				WHERE id=$id
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function cari($keyword){
		$query = "SELECT * FROM anggota WHERE
					nama LIKE '%$keyword%' OR
					bidusaha LIKE '%$keyword%' OR
					alamat LIKE '%$keyword%'
				";

		return query($query);
	}

	function register($data){
		global $conn;

		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$confirm = mysqli_real_escape_string($conn, $data["confirm"]);
		$status = htmlspecialchars($data["status"]);

		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
				alert('username sudah terdaftar!');
			</script>";
			return false;
		}

		if ($password !== $confirm) {
			echo "<script>
				alert('konfirmasi password tidak sesuai!'); 
			</script>";
			return false; 
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$status')");

		return mysqli_affected_rows($conn);
	}

	function hapususer($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM user WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

	function changepw($item){
		global $conn;

		$id = $item["id"];
		$pass = mysqli_real_escape_string($conn, $item["password"]);
		$repass = mysqli_real_escape_string($conn, $item["confirm"]);

		if ($pass !== $repass) {
			echo "<script>
				alert('Konfirmasi Password TIDAK Sesuai!'); 
			</script>";
			return false; 
		}

		$password = password_hash($pass, PASSWORD_DEFAULT);


		$query = "UPDATE user SET password = '$password' WHERE id = $id";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function encRSA($P){
		$data[1]=$P;
		$i=1;
		$get=1;
		
		do {
			$pow = pow($data[$i], 2)%123;
			$get = $get*$data[$i];
			$data[$i*2]=$pow;


			$i=$i*2;
		} while ($i < 5);

		$t=$get%123;
		return $t;
	}

	function decRSA($C){
		$data[1]=$C;
		$i=1;
		$get=1;
	
		do {
			$pow = pow($data[$i], 2)%123;
			if ($i!=8) {
				
				$get = $get*$data[$i];
			}
				
			$data[$i*2]=$pow;


			$i=$i*2;
		} while ($i < 32);

		$t=$get%123;
		return $t;
	}

	function enkrip($Pt){
		$kalimat = $Pt;
		$s = str_split($kalimat);
		$enc = "";

		for ($i=0; $i < strlen($kalimat); $i++) { 
			$z[$i] = ord($s[$i]);

			$enc = $enc.chr(encRSA($z[$i]));
		}
		return $enc;
	}

	function dekrip($Ct){
		$kalimat = $Ct;
		$s = str_split($kalimat);
		$dec = "";

		for ($i=0; $i < strlen($kalimat); $i++) { 
			$z[$i] = ord($s[$i]);
			$dec = $dec.chr(decRSA($z[$i]));
		}
		return $dec;
	}

	function bulan($b){
		if ($b == 1) {
			$b = "Januari";
		}else if ($b == 2) {
			$b = "Februari";
		}else if ($b == 3) {
			$b = "Maret";
		}else if ($b == 4) {
			$b = "April";
		}else if ($b == 5) {
			$b = "Mei";
		}else if ($b == 6) {
			$b = "Juni";
		}else if ($b == 7) {
			$b = "Juli";
		}else if ($b == 8) {
			$b = "Agustus";
		}else if ($b == 9) {
			$b = "September";
		}else if ($b == 10) {
			$b = "Oktober";
		}else if ($b == 11) {
			$b = "November";
		}else{
			$b = "Desember";
		}

		return $b;
	}

	function tanggal($d){
		$tgl = explode("-", $d);
		$bulan = bulan($tgl["1"]);

		$tanggal = $tgl["2"]." ".$bulan." ".$tgl["0"];

		return $tanggal;
	}
?>