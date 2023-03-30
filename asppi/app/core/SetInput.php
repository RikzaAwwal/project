<?php 
	class SetInput{
		public function bulan($m){
			if ($m == 1) {
				$m = "Januari";
			}else if ($m == 2){
				$m = "Februari";
			}else if ($m == 3){
				$m = "Maret";
			}else if ($m == 4){
				$m = "April";
			}else if ($m == 5){
				$m = "Mei";
			}else if ($m == 6){
				$m = "Juni";
			}else if ($m == 7){
				$m = "Juli";
			}else if ($m == 8){
				$m = "Agustus";
			}else if ($m == 9){
				$m = "September";
			}else if ($m == 10){
				$m = "Oktober";
			}else if ($m == 11){
				$m = "November";
			}else{
				$m = "Desember";
			}

			return $m;
		}

		public function tanggal($d){
			$tgl = explode('-', $d);
			$bulan = $this->bulan($tgl['1']);

			$tanggal = $tgl['2']." ".$bulan." ".$tgl['0'];

			return $tanggal;
		}

		public function upload($data){
			$nama = $data['name'];
			$ukuran = $data['size'];
			$error = $data['error'];
			$tmp = $data['tmp_name'];

			if ($error === 4) {
				$nama = 'nopicture.jpg';

				return $nama;
			}

			$valid = ['jpg', 'png', 'jpeg'];
			$tipe = explode('.', $nama);
			$tipe = strtolower(end($tipe));

			if (!in_array($tipe, $valid)) {
				echo "<script>alert('Data yang Anda Upload Bukan Gambar')</script>";

				return false;
			}

			if ($ukuran > 1000000) {
				echo "<script>alert('Ukuran Gambar Terlalu Besar')</script>";
			
				return false;
			}

			$new = uniqid();
			$new .= '.';
			$new .= $tipe;

			$newDir = '../public/img/'.$new;

			move_uploaded_file($tmp, $newDir);

			return $new;
		}
	}