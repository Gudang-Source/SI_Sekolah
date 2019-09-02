<?php 


class Model_kelompok extends CI_Model
{
	public $table = "tbl_kelompok";

	function add()
	{
		$data = array (
			'id_kelompok'	=> $this->input->post('id',TRUE),
			'nama_kelompok'	=> $this->input->post('nama',TRUE),
			'kelas'	=> $this->input->post('kelas',TRUE),
			'kd_jurusan'	=> $this->input->post('jurusan',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'id_kelompok'	=> $this->input->post('id',TRUE),
			'nama_kelompok'	=> $this->input->post('nama',TRUE),
			'kelas'	=> $this->input->post('kelas',TRUE),
			'kd_jurusan'	=> $this->input->post('jurusan',TRUE),
			);
		$nim = $this->input->post('id_kelompok');
		$this->db->where('id_kelompok',$nim);
		$this->db->update($this->table,$data);
	}
}