<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function index()
	{
		$this->template->load('template','sekolah/dashboard');
	}
}