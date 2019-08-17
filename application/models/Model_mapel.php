<?php 


class Model_mapel extends CI_Model
{
	public $table = "tbl_mapel";

	function add()
	{
		$data = array (
			'kd_mapel'		=> $this->input->post('id',TRUE),
			'nama_mapel'	=> $this->input->post('nama',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'kd_mapel'		=> $this->input->post('id',TRUE),
			'nama_mapel'	=> $this->input->post('nama',TRUE),
			);
		$nim = $this->input->post('kd_mapel');
		$this->db->where('kd_mapel',$nim);
		$this->db->update($this->table,$data);
	}
}