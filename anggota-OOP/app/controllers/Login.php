<?php 
	class Login extends Controller{
		public function __construct(){
			if (isset($_SESSION['login'])) {
				header("Location: ".BASEURL);    
			    exit;
			}
		}

		public function index(){
			$data['judul'] = "Halaman Login";
			$this->view('login/index', $data);
		}

		public function verify(){
			$this->model('login_model')->check($_POST);
		}
	}