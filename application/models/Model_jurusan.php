<?php 


class Model_jurusan extends CI_Model
{
	public $table = "tbl_jurusan";

	function add()
	{
		$data = array (
			'kd_jurusan'		=> $this->input->post('id',TRUE),
			'nama_jurusan'	=> $this->input->post('nama',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'kd_jurusan'		=> $this->input->post('id',TRUE),
			'nama_jurusan'	=> $this->input->post('nama',TRUE),
			);
		$id = $this->input->post('kd_jurusan');
		$this->db->where('kd_jurusan',$id);
		$this->db->update($this->table,$data);
	}
}