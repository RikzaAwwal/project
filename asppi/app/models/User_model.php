<?php 
	class User_model{
		private $db;

		public function __construct()
		{
			$this->db = new Database;
		}

		public function getUser(){
			$this->db->query("SELECT * FROM user WHERE status = 'user'");
			return $this->db->resultSet();
		}

		public function getUserById($id){
			$this->db->query("SELECT * FROM user WHERE id = :id");
			$this->db->bind("id", $id);

			return $this->db->single();
		}

		public function validasiUser($data){
			$this->db->query('SELECT * FROM user WHERE username = :username');
			$this->db->bind("username", $data);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function tambahUser($data){
			$username = strtolower(stripslashes($data['username']));
			$password = htmlspecialchars($data['password']);
			$confirm = htmlspecialchars($data['confirm']);

			if ($this->validasiUser($username) > 0) {
				Alert::setAlert('SUDAH', 'Terdaftar', 'danger', 'User');
				return false;
			}

			if ($password !== $confirm) {
				Alert::setAlert('Tidak', 'Sesuai', 'danger', 'Konfirmasi');
				return false;
			}

			$password = password_hash($password, PASSWORD_DEFAULT);

			$this->db->query("INSERT INTO user VALUES ('', :username, :password, 'user')");
				
			$this->db->bind('username', $username);
			$this->db->bind('password', $password);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function ubahUser($data){
			$password = htmlspecialchars($data['password']);
			$confirm = htmlspecialchars($data['confirm']);

			if ($password !== $confirm) {
				return false;
			}

			$password = password_hash($password, PASSWORD_DEFAULT);

			$this->db->query("UPDATE user SET password = :password WHERE id = :id");
				
			$this->db->bind('password', $password);
			$this->db->bind('id', $data['id']);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function hapusUser($id){
			$this->db->query('DELETE FROM user WHERE id = :id');
			$this->db->bind('id', $id);

			$this->db->execute();

			return $this->db->rowCount();
		}
	}