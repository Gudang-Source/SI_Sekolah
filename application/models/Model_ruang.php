<?php 


class Model_ruang extends CI_Model
{
	public $table = "tbl_ruangan";

	function add()
	{
		$data = array (
			'kd_ruang'		=> $this->input->post('id',TRUE),
			'nama_ruang'	=> $this->input->post('nama',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'kd_ruang'		=> $this->input->post('id',TRUE),
			'nama_ruang'	=> $this->input->post('nama',TRUE),
			);
		$id = $this->input->post('kd_ruang');
		$this->db->where('kd_ruang',$id);
		$this->db->update($this->table,$data);
	}
}