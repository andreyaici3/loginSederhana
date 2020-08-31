<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			echo "<script>alert('Login Terlebih Dahulu');</script>";
			redirect('auth');
		}
	}
	public function index(){
		echo "Welcome " . $this->session->userdata('login')['nama_lengkap'];
	}
}