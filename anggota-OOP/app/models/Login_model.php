<?php 
	class Login_model{
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function check($data){
			$this->db->query('SELECT * FROM user WHERE username = :username');
			$this->db->bind('username', $data['username']);

			$account = $this->db->single();

			$result = $this->db->rowCount();

			if ($result === 1) {
				if (password_verify($data['password'], $account['password'])) {
					$_SESSION['login'] = $account['status'];
					$_SESSION['id'] = $account['id'];
					header("Location: ".BASEURL);
					exit;
				}else{
					echo "<script>
						alert('Password TIDAK SESUAI'); 
						document.location.href = '".BASEURL."/login';
					</script>";
					exit;
				}
			}else{
				echo "<script>
					alert('Username TIDAK TERDAFTAR'); 
					document.location.href = '".BASEURL."/login';
				</script>";
				exit;
			}
		}
	}