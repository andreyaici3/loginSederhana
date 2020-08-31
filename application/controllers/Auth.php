<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('M_auth', 'auth');
		if ($this->session->userdata('login')) {
			redirect('home');
		}
	}
	public function index()
	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		if ($this->form_validation->run() != true) {
			$this->load->view('login');
		} else {
			$this->auth->login();
		}	
		
	}

	public function logout(){
		$this->session->unset_userdata('login');
		echo "Logout Sukses";
		var_dump($this->session->userdata());
	}
}