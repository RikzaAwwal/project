<?php 
	class Anggota extends Controller{
		public $crypt;

		public function __construct(){
			$this->crypt = new Kriptografi;

			if (!isset($_SESSION['login'])) {
				header('Location: '.BASEURL."/login");
				exit;
			}
		}

		public function index(){
			$data['id'] = $_SESSION['id'];
			if ($_SESSION['login'] == 'admin') {
				$data["judul"] = 'Data Anggota';
				$data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
				$this->view('templates/header',$data);
				$this->view('anggota/template');	
				$this->view('anggota/index', $data);
				$this->view('anggota/modal');
				$this->view('templates/footer');
			}
			if ($_SESSION['login'] == 'user') {
				$data["judul"] = 'Data Anggota';
				$data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
				$this->view('anggota/user/header',$data);
				$this->view('anggota/user/template');	
				$this->view('anggota/user/index', $data);
				$this->view('anggota/user/footer');
			}
		}

		public function list(){
			$data['id'] = $_SESSION['id'];
			if ($_SESSION['login'] == 'admin') {
				$data["judul"] = 'Data Anggota';
				$data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
				$this->view('templates/header',$data);
				$this->view('anggota/template');	
				$this->view('anggota/list', $data);
				$this->view('anggota/modal');
				$this->view('templates/footer');
			}
			if ($_SESSION['login'] == 'user') {
				$data["judul"] = 'Data Anggota';
				$data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
				$this->view('anggota/user/header',$data);
				$this->view('anggota/user/template');	
				$this->view('anggota/user/list', $data);
				$this->view('anggota/user/footer');
			}
		}

		public function getanggota(){
			echo json_encode($this->model('Anggota_model')->getById($_POST['id']));			
		}

		public function get(){
			echo json_encode($this->model('User_model')->getUserById($_POST['id']));			
		}

		public function cari(){
			$data['id'] = $_SESSION['id'];
			if ($_SESSION['login'] == 'admin') {
				$data["judul"] = 'Data Anggota';
				$data['anggota'] = $this->model('Anggota_model')->cariAnggota();
				$this->view('templates/header',$data);
				$this->view('anggota/template');	
				$this->view('anggota/index', $data);
				$this->view('anggota/modal');
				$this->view('templates/footer');
			}
			if ($_SESSION['login'] == 'user') {
				$data["judul"] = 'Data Anggota';
				$data['anggota'] = $this->model('Anggota_model')->cariAnggota();
				$this->view('anggota/user/header',$data);
				$this->view('anggota/user/template');	
				$this->view('anggota/user/index', $data);
				$this->view('anggota/user/footer');
			}
		}

		public function ubahUser(){
			if ($this->model('User_model')->ubahUser($_POST) > 0) {
				Alert::setAlert('Berhasil', 'Diubah', 'success', 'Password User');
				header('Location: '.BASEURL.'/user');
				exit;
			} else {
				Alert::setAlert('Gagal', 'Diubah', 'danger', 'Password User');
				header('Location: '.BASEURL.'/user');
				exit;
			}
		}

		public function encdb(){
			if ($this->model('Anggota_model')->encDB() > 0) {
				Alert::setAlert('Berhasil', 'Dienkripsi', 'success', 'Base');
				header('Location: '.BASEURL);
				exit;
			} else {
				Alert::setAlert('Gagal', 'Dienkripsi', 'danger', 'Base');
				header('Location: '.BASEURL);
				exit;
			}
		}

		public function decdb(){
			if ($this->model('Anggota_model')->decDB() > 0) {
				Alert::setAlert('Berhasil', 'Didekripsi', 'success', 'Base');
				header('Location: '.BASEURL);
				exit;
			} else {
				Alert::setAlert('Gagal', 'Didekripsi', 'danger', 'Base');
				header('Location: '.BASEURL);
				exit;
			}
		}

		public function tambah(){
			if ($_SESSION['login'] == 'admin') {
				if ($this->model('Anggota_model')->tambahDataAnggota($_POST, $_FILES) > 0) {
					Alert::setAlert('Berhasil', 'Ditambahkan', 'success', 'Anggota');
					header('Location: '.BASEURL);
					exit;
				} else {
					Alert::setAlert('Gagal', 'Ditambahkan', 'danger', 'Anggota');
					header('Location: '.BASEURL);
					exit;
				}
			}else{
				header('Location: '.BASEURL);
				exit;
			}
		}

		public function hapus($id){
			if ($_SESSION['login'] == 'admin') {
				if ($this->model('Anggota_model')->hapusDataAnggota($id) > 0) {
					Alert::setAlert('Berhasil', 'Dihapus', 'success', 'Anggota');
					header('Location: '.BASEURL);
					exit;
				} else {
					Alert::setAlert('Gagal', 'Dihapus', 'danger', 'Anggota');
					header('Location: '.BASEURL);
					exit;
				}
			}else{
				header('Location: '.BASEURL);
				exit;
			}
		}

		public function download(){
			if ($_SESSION['login'] == 'admin') {
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=Data Anggota.xls");
				$data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
				$this->view('anggota/download', $data);
			}else{
				header('Location: '.BASEURL);
				exit;
			}
		}
	}