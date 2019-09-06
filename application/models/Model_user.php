<?php
/**
* 
*/
class Model_user extends CI_Model
{
	public $table = "tbl_user";
	
	function __construct()
	{
		parent:: __construct();
	}

	function check_user($username, $password) {
		$username 	= $this->db->where('username',$username);
		$password 	= $this->db->where('password',md5($password));
		$user 		= $this->db->get('tbl_user')->row_array();
		return ($user);
	}

	function add($foto)
	{
		$data = array (
			'nama_lengkap'		=> $this->input->post('nama',TRUE),
			'id_level_user'		=> $this->input->post('level',TRUE),
			'username'			=> $this->input->post('username',TRUE),
			'password'			=> md5($this->input->post('password',TRUE)),
			'foto'				=> $foto
			);
		$this->db->insert($this->table,$data);
	}

	function edit($foto)
	{
		if (empty($foto)) {
		$data = array (
			'nama_lengkap'	=> $this->input->post('nama',TRUE),
			'id_level_user'	=> $this->input->post('level',TRUE),
			'username'		=> $this->input->post('username',TRUE),
			'password'		=> md5($this->input->post('password',TRUE))
			);
		} else {

		$data = array (
			'nama_lengkap'	=> $this->input->post('nama',TRUE),
			'id_level_user'	=> $this->input->post('level',TRUE),
			'username'		=> $this->input->post('username',TRUE),
			'password'		=> md5($this->input->post('password',TRUE)),
			'foto'			=> $foto
			);
		}
		$id = $this->input->post('username');
		$this->db->where('username',$id);
		$this->db->update($this->table,$data);	
			
	}
	
}