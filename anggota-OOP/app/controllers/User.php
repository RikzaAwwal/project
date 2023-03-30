<?php 
	class User extends Controller{
		public function __construct(){
			if ($_SESSION['login'] !== "admin"){
				header('Location: '.BASEURL);
				exit;
			}
		}

		public function index(){
			$data['judul'] = "Data User";
			$data['user'] = $this->model('User_model')->getUser();
			$this->view('templates/header',$data);
			$this->view('user/index', $data);
			$this->view('templates/footer');
		}

		public function tambah(){
			if ($this->model('User_model')->tambahUser($_POST) > 0) {
				Alert::setAlert('Berhasil', 'Ditambahkan', 'success', 'User');
				header('Location: '.BASEURL.'/user');
				exit;
			} else {
				header('Location: '.BASEURL.'/user');
				exit;
			}
		}

		public function get(){
			echo json_encode($this->model('User_model')->getUserById($_POST['id']));			
		}

		public function ubah(){
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

		public function hapus($id){
			if ($this->model('User_model')->hapusUser($id) > 0) {
				Alert::setAlert('Berhasil', 'Dihapus', 'success', 'User');
				header('Location: '.BASEURL.'/user');
				exit;
			} else {
				Alert::setAlert('Gagal', 'Dihapus', 'danger', 'User');
				header('Location: '.BASEURL.'/user');
				exit;
			}
		}
	}