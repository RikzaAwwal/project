<?php 
	$conn = mysqli_connect("localhost", "root", "", "bank");

	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows [] = $row;
		}
		return $rows;
	}

	function ambil($data){
		global $conn;

		$idnasabah = $data["noanggota"];
		$saldo = $data["saldo"];
		$tarik = $data["tarik"];

		$total = $saldo - $tarik;
		if ($total < 0) {
			return $error;
		}else{
			$query = "UPDATE nasabah SET saldo = '$total' WHERE id_nasabah = '$idnasabah'";
			mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}
	}

	function ambilTransaksi($data){
		global $conn;

		$idnasabah = $data["noanggota"];
		$saldo = $data["saldo"];
		$tarik = $data["tarik"];
		$tanggal = $data["tanggal"];

		$total = $saldo - $tarik;
		if ($total < 0) {
			return $error;
		}else{
			$query = "INSERT INTO transaksi VALUES(
						'', '$tanggal', '$idnasabah', '$tarik', 'Tarik', '$total'
						)";
			mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}			
	}


	function setor($data){
		global $conn;

		$idnasabah = $data["noanggota"];
		$saldo = $data["saldo"];
		$total = $data["total"];

		$jumlah = $saldo + $total;
		$query = "UPDATE nasabah SET saldo = '$jumlah' WHERE id_nasabah = '$idnasabah'";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function setorTransaksi($data){
		global $conn;

		$idnasabah = $data["noanggota"];
		$saldo = $data["saldo"];
		$total = $data["total"];
		$tanggal = $data["tanggal"];
      
		$jumlah = $saldo + $total;
        
		$query = "INSERT INTO transaksi VALUES(
					'', '$tanggal', '$idnasabah', '$total', 'Setor', '$jumlah'
					)";
 
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);			
	}

	function tambahnasabah($data){
		global $conn;

		//$na = htmlspecialchars($data["noanggota"]);//
 		$nama = $data["nama"];
		$alamat = htmlspecialchars($data["alamat"]);
		$notelp = $data["notlp"];
		$telp = $notelp;
		$nonik = $data["nik"];
		$nnik = $nonik;
		
		$query = "INSERT INTO nasabah VALUES (
				'', '$nama','$alamat','$telp','0','$nnik'
				)";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
		
	function editnasabah($data){
		global $conn;
		$id = $data["id"];
		//$na = htmlspecialchars($data["noanggota"]);//
 		$nama = $data["nama"];
 		$nam = $nama;
		$alamat = htmlspecialchars($data["alamat"]);
		$notelp = $data["notlp"];
		$telp = $notelp;
		$nonik = $data["nik"];
		$nnik=$nonik;
		
		$query = "UPDATE nasabah SET 
				nama ='$nam',alamat ='$alamat',notelp ='$telp',nik ='$nnik'
				WHERE id_nasabah = $id";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function tambahsampah($s){
		global $conn;

		$id = $s["id"];
		$jenis = $s["jenis"];
		$harga = $s["harga"];

		$query = "INSERT INTO sampah VALUES ('$id', '$jenis', '$harga')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function editsampah($s){
		global $conn;

		$id = $s["id"];
		$jenis = $s["jenis"];
		$harga = $s["harga"];

		$query = "UPDATE sampah SET jenis = '$jenis', harga = '$harga' WHERE id_sampah = '$id'";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function hapussampah($s){
		global $conn;

		mysqli_query($conn, "DELETE FROM sampah WHERE id_sampah = '$s'");
			
		return mysqli_affected_rows($conn);
	}

	function cari($k){
		$keyword = $k;
		$query = "SELECT * FROM nasabah WHERE
					nik LIKE '%$keyword%' 
				";

		return query($query);
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