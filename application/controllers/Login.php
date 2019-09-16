<?php

/**
* 
*/
class Login extends CI_Controller
{
	function __construct(){
		parent:: __construct();
		$this->load->model('Model_user');
	}

	function index(){
		$this->load->view('front/login');
	}

	function check_login(){
		if (isset($_POST['submit'])) {

			$username 	= $this->input->post('username');
			$password	= $this->input->post('password');
			$result		= $this->Model_user->check_user($username,$password);
			if (!empty($result)) {
				$this->session->set_userdata($result);
				redirect('dashboard');
			} else {
				redirect('login');	
			}
		} else {
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}

}