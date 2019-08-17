<?php 


class Model_tahunakademik extends CI_Model
{
	public $table = "tbl_tahun_akademik";

	function add()
	{
		$data = array (
			'is_aktif'		=> $this->input->post('status',TRUE),
			'tahun_akademik'	=> $this->input->post('nama',TRUE),
			);
		$this->db->insert($this->table,$data);
	}

	function edit()
	{
		$data = array (
			'is_aktif'		=> $this->input->post('status',TRUE),
			'tahun_akademik'	=> $this->input->post('nama',TRUE),
			);
		$id = $this->input->post('id_tahun_akademik');
		$this->db->where('id_tahun_akademik',$id);
		$this->db->update($this->table,$data);
	}
}