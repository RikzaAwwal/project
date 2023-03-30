<?php 
	$conn = mysqli_connect("localhost", "root", "", "waspas");

	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows [] = $row;
		}
		return $rows;
	}

	function select($a, $b){
		global $conn;

		$z = query("SELECT * FROM subkrit s 
					INNER JOIN combine c ON s.kodesub = c.kodesub
					INNER JOIN krit k ON c.kodekrit = k.kodekrit
					INNER JOIN toko t ON c.kodetoko = t.kodetoko
					WHERE c.kodetoko = '$a' AND c.kodekrit = '$b' AND c.kodesub = s.kodesub");

		return $z;
	}

	function cari($a, $b){
		$query = "SELECT * FROM subkrit s 
					INNER JOIN combine c ON s.kodesub = c.kodesub
					INNER JOIN krit k ON c.kodekrit = k.kodekrit
					INNER JOIN toko t ON c.kodetoko = t.kodetoko
					WHERE c.kodetoko = '$a' AND c.kodekrit = '$b'
				";	

		return query($query);
	}

	function isiSubkrit($a,$b){
		$query = "SELECT * FROM subkrit s 
					INNER JOIN krit k ON s.kodekrit = k.kodekrit
					WHERE k.kodekrit = '$a' AND s.kodesub = '$b'
				";

		return query($query);
	}

	function up($a){
		$query = "SELECT MAX(nilai) AS maks FROM subkrit s 
					INNER JOIN combine c ON s.kodesub = c.kodesub
					INNER JOIN krit k ON c.kodekrit = k.kodekrit
					WHERE c.kodekrit = '$a'
				";

		return query($query);
	}

	function down($a){
		$query = "SELECT MIN(nilai) AS min FROM subkrit s 
					INNER JOIN combine c ON s.kodesub = c.kodesub
					INNER JOIN krit k ON c.kodekrit = k.kodekrit
					WHERE c.kodekrit = '$a'
				";

		return query($query);
	}

	function ttoko($data){
		global $conn;

		$kode = htmlspecialchars($data["kodetoko"]);
		$toko = htmlspecialchars($data["nama"]);
		$alamat = htmlspecialchars($data["alamat"]);

		$query = "INSERT INTO toko VALUES(
				'$kode', '$toko', '$alamat'
				)";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function ctoko($a,$b){
		global $conn;

		$toko = htmlspecialchars($a);
		$krit = htmlspecialchars($b);

		$query = "INSERT INTO combine VALUES(
				'','$toko', '$krit', ''
				)";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);					
	}

	function utoko($data){
		global $conn;

		$kode = htmlspecialchars($data["kodetoko"]);
		$toko = htmlspecialchars($data["nama"]);
		$alamat = htmlspecialchars($data["alamat"]);

		$query = "UPDATE toko SET
					nama = '$toko',
					alamat = '$alamat'
				WHERE kodetoko = '$kode'
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function htoko($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM toko WHERE kodetoko = '$id'");
		return mysqli_affected_rows($conn);
	}

	function hctoko($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM combine WHERE kodetoko = '$id'");
		return mysqli_affected_rows($conn);
	}

	function tkrit($data){
		global $conn;

		$kode = htmlspecialchars($data["kodekrit"]);
		$krit = htmlspecialchars($data["nama"]);
		$atribut = htmlspecialchars($data["atribut"]);
		$bobot = htmlspecialchars($data["bobot"]);

		$query = "INSERT INTO krit VALUES(
				'$kode', '$krit', '$atribut', '$bobot'
				)";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function ckrit($a,$b){
		global $conn;

		$krit = htmlspecialchars($a);
		$toko = htmlspecialchars($b);

		$query = "INSERT INTO combine VALUES(
				'','$toko', '$krit', ''
				)";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);					
	}

	function ukrit($data){
		global $conn;

		$kode = htmlspecialchars($data["kodekrit"]);
		$krit = htmlspecialchars($data["nama"]);
		$atribut = htmlspecialchars($data["atribut"]);
		$bobot = htmlspecialchars($data["bobot"]);

		$query = "UPDATE krit SET
					kriteria = '$krit',
					jenis = '$atribut',
					bobot = '$bobot'
				WHERE kodekrit = '$kode'
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function hkrit($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM krit WHERE kodekrit = '$id'");
		return mysqli_affected_rows($conn);
	}

	function hckrit($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM combine WHERE kodekrit = '$id'");
		return mysqli_affected_rows($conn);
	}

	function hskrit($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM subkrit WHERE kodekrit = '$id'");
		return mysqli_affected_rows($conn);
	}

	function tsubkrit($data){
		global $conn;

		$kodekrit = htmlspecialchars($data["kriteria"]);
		$ket = htmlspecialchars($data["keterangan"]);
		$nilai = htmlspecialchars($data["nilai"]);

		$query = "INSERT INTO subkrit VALUES(
				'', '$kodekrit', '$ket', '$nilai'
				)";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function usubkrit($data){
		global $conn;

		$kode = htmlspecialchars($data["kodesub"]);
		$krit = htmlspecialchars($data["kriteria"]);
		$ket = htmlspecialchars($data["keterangan"]);
		$nilai = htmlspecialchars($data["nilai"]);

		$query = "UPDATE subkrit SET
					kodekrit = '$krit',
					keterangan = '$ket',
					nilai = '$nilai'
				WHERE kodesub = '$kode'
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}	

	function hsubkrit($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM subkrit WHERE kodesub = '$id'");
		return mysqli_affected_rows($conn);
	}

	function ucombine($a,$b,$c){
		global $conn;

		$query = "UPDATE combine SET
					kodesub = $c
				WHERE kodetoko = '$a' AND kodekrit = '$b'
				";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

?>