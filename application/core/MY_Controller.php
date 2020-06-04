<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$session = $this->session->userdata();
		$this->db->reconnect();
		if (!isset($session['id_user'])) 
		{
			redirect(base_url('login'));
		}
	}
}