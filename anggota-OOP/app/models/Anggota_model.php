<?php 
	class Anggota_model{
		private $db;
		private $set;
		public $crypt;

		public function __construct(){
			$this->db = new Database;
			$this->set = new SetInput;
			$this->crypt = new Kriptografi;
		}

		public function getAllAnggota(){
			$this->db->query('SELECT * FROM anggota');

			$data = $this->db->resultSet();

			return $data;
		}

		public function getById($id){
			$this->db->query('SELECT * FROM anggota WHERE id=:id');
			$this->db->bind('id', $id);

			$data = $this->db->single();
			
			$data['nik'] = $this->crypt->dec($data['nik']);
			$data['notlp'] = $this->crypt->dec($data['notlp']);
			$data['email'] = $this->crypt->dec($data['email']);

			return $data;
		}

		public function tambahDataAnggota($data, $file){
			$tl = $this->set->tanggal($data['tl']);
			$ttl = $data['tempat'].", ".$tl;
			$tm = $this->set->tanggal($data['tglmasuk']);
			$nik = $this->crypt->enc($data['nik']);
			$notlp = $this->crypt->enc($data['notlp']);
			$email = $this->crypt->enc($data['email']);
			$foto = $this->set->upload($file['foto']);

			$query = "INSERT INTO anggota VALUES ('',
						:noanggota, :nik, :nama, :ttl, :jk, :alamat, :notlp, :email, :perusahaan, :alamatp, :noper, :jabatan, :bidusaha, :tglmasuk, :foto)";
			$this->db->query($query);

			$this->db->bind('noanggota', $data['noanggota']);
			$this->db->bind('nik', $nik);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('ttl', $ttl);
			$this->db->bind('jk', $data['jk']);
			$this->db->bind('alamat', $data['alamat']);
			$this->db->bind('notlp', $notlp);
			$this->db->bind('email', $email);
			$this->db->bind('perusahaan', $data['perusahaan']);
			$this->db->bind('alamatp', $data['alamatp']);
			$this->db->bind('noper', $data['noper']);
			$this->db->bind('jabatan', $data['jabatan']);
			$this->db->bind('bidusaha', $data['bidusaha']);
			$this->db->bind('tglmasuk', $tm);
			$this->db->bind('foto', $foto);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function ubahDataAnggota($data, $file){
			$tl = $this->set->tanggal($data['tl']);
			$ttl = $data['tempat'].", ".$tl;
			$tm = $this->set->tanggal($data['tglmasuk']);
			$foto = $this->set->upload($file['foto']);

			$query = "INSERT INTO anggota VALUES ('',
						:noanggota, :nik, :nama, :ttl, :jk, :alamat, :notlp, :email, :perusahaan, :alamatp, :noper, :jabatan, :bidusaha, :tglmasuk, :foto)";
			$this->db->query($query);

			$this->db->bind('noanggota', $data['noanggota']);
			$this->db->bind('nik', $data['nik']);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('ttl', $ttl);
			$this->db->bind('jk', $data['jk']);
			$this->db->bind('alamat', $data['alamat']);
			$this->db->bind('notlp', $data['notlp']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('perusahaan', $data['perusahaan']);
			$this->db->bind('alamatp', $data['alamatp']);
			$this->db->bind('noper', $data['noper']);
			$this->db->bind('jabatan', $data['jabatan']);
			$this->db->bind('bidusaha', $data['bidusaha']);
			$this->db->bind('tglmasuk', $tm);
			$this->db->bind('foto', $foto);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function hapusDataAnggota($id){
			$this->db->query('DELETE FROM anggota WHERE id=:id');
			$this->db->bind('id', $id);

			$this->db->execute();

			return $this->db->rowCount();
		}

		public function cariAnggota(){
			$key = $_POST['keyword'];

			$query = "SELECT * FROM anggota WHERE
					nama LIKE :keyword OR
					bidusaha LIKE :keyword OR
					alamat LIKE :keyword
				";
			$this->db->query($query);
			$this->db->bind('keyword', "%$key%");

			return $this->db->resultSet();
		}

		public function encDB(){
			$this->db->query('SELECT * FROM anggota');

			$data = $this->db->resultSet();

			foreach ($data as $key) {
				$nik = $this->crypt->enc($key['nik']);
				$notlp = $this->crypt->enc($key['notlp']);
				$email = $this->crypt->enc($key['email']);

				$query = "UPDATE anggota SET
							nik = :nik,
							notlp = :notlp,
							email = :email
							WHERE id = :id";
				$this->db->query($query);

				$this->db->bind('nik', $nik);
				$this->db->bind('notlp', $notlp);
				$this->db->bind('email', $email);
				$this->db->bind('id', $key['id']);

				$this->db->execute();
			}

			return $this->db->rowCount();
		}

		public function decDB(){
			$this->db->query('SELECT * FROM anggota');

			$data = $this->db->resultSet();

			foreach ($data as $key) {
				$nik = $this->crypt->dec($key['nik']);
				$notlp = $this->crypt->dec($key['notlp']);
				$email = $this->crypt->dec($key['email']);

				$query = "UPDATE anggota SET
							nik = :nik,
							notlp = :notlp,
							email = :email
							WHERE id = :id";
				$this->db->query($query);

				$this->db->bind('nik', $nik);
				$this->db->bind('notlp', $notlp);
				$this->db->bind('email', $email);
				$this->db->bind('id', $key['id']);

				$this->db->execute();
			}

			return $this->db->rowCount();
		}
		
	}

