<?php 
	class Alert{
		public static function setAlert($pesan, $aksi, $tipe, $data){
			$_SESSION['alert'] = [
				'pesan' => $pesan,
				'aksi' => $aksi,
				'tipe' => $tipe,
				'data' => $data
			];
		}

		public static function flash(){
			if (isset($_SESSION['alert'])) {
				echo '<div class="alert alert-'.$_SESSION["alert"]["tipe"].' alert-dismissible fade show" role="alert">
  						Data '.$_SESSION["alert"]["data"].' <strong>'.$_SESSION["alert"]["pesan"].'</strong> '.$_SESSION["alert"]["aksi"].'
  						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </div>';
				unset($_SESSION['alert']);
			}
		}
	}