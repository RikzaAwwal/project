<?php 
	class Logout{
		public function index(){
			session_destroy();
			header("Location: ".BASEURL."/login");
			exit;
		}
	}